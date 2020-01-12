<?php

namespace App\Http\Controllers\API;

use App\Booking;
use App\Customer;
use App\Driver;
use App\Http\Requests\BookingStoreRequest;
use App\Mail\BookingDeleteMail;
use App\Mail\ClientBookingCancelled;

use App\Mail\Guest\BookingRejected;
use App\Mail\Guest\BookingConfirmed;
use App\Mail\Guest\BookingCancelled;
use App\Mail\Guest\BookingPending;

use App\Mail\Driver\BookingDriverAccepted;
use App\Mail\Driver\BookingDriverCancelled;
use App\Mail\Driver\BookingDriverPending;

use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Keygen\Keygen;
    
use Session;
use PDF;
    
use Ical\Ical;
use Ical\IcalendarException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Booking::with('vehicle', 'customer', 'driver', 'invoice')->advancedFilter();
        $columns = Booking::$columns;
        $search = Booking::$search;

        return response()
            ->json([
                'collection' => $model,
                'columns' => $columns,
                'search' => $search,
                'items_count' => $model->count()
            ]);
    }

    /**
     * Display a listing of the cancelled resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejected()
    {
        $rejected = Booking::with('vehicle', 'customer', 'driver', 'invoice')->where('status', '=', 'Cancelled')->advancedFilter();
        $columns = Booking::$columns;
        $search = Booking::$search;

        return response()
            ->json([
                'collection' => $rejected,
            ]);
    }

    public function acceptTrip(BookingService $bookingService, Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->status     = "Accepted";
        $booking->driver_id  = $request['driver_id'];
        $booking->vehicle_id = $request['vehicle_id'];;
        $booking->update();
        
        try {
             // Get booking date and time
             $pickup_time = $booking->pickup_hour . ':' . $booking->pickup_min . ':' .'00';
             $aDateString = $booking->date . $pickup_time;

             $dateTimeString = $aDateString;
             $dueDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString);

             $due = $dueDateTime->copy()->addMinutes($bookingService->calculateBookingDistanceMinutes($booking));

             $trip_distance = $booking->distance;

             $ical = (new Ical())->setAddress($booking->pickup_address)
                 ->setDateStart(new \DateTime($booking->date . " " .$pickup_time))
                 ->setDateEnd(new \DateTime($due))
                 ->setDescription(
                     "Dear " . $booking->driver->name . '\n' . '\n' . 'Please find the summary of the ride below.' . '\n' . '\n' . 'Booking number: ' . $booking->number . '\n' . 'From: ' . $booking->pickup_address . '\n' . 'To: ' . $booking->drop_address . '\n' . 'Category: ' . 'Transfer' . '' . '\n' . 'Distance: ca. ' . $trip_distance . ' km' . '\n' . 'Flight or Train number: ' . $booking->flight_number . '\n' .'Pickup sign: ' . $booking->pickup_sign . '\n' . 'Additional comments: ' . '\n' . '\n' . 'Be sure to double check the ride information, witch can also be found in the BL Chauffeur app. A pickup sign is attached to the confirmation email as a pdf. It is a pleasure working together.' . '\n' . '\n' . 'Best regards,' . '\n' . 'You Blackhansa Team'
                 )
                 ->setSummary("BH " . $booking->number)
                 ->setFilename("BH-" . $booking->number);
             $ical->addHeader();

             $event = $ical->getICAL();

             Storage::put('public/ics/BH-' . $booking->number . '.ics', $event);

         } catch (IcalendarException $exc) {
             echo $exc->getMessage();
         }
        
        Mail::to($booking->customer->email)->send(new BookingConfirmed($booking));
        Mail::to($booking->driver->email)->send(new BookingDriverAccepted($booking));
        
        notify()->success('Trip successfully accepted!');

        return ['message', 'Success'];
    }

    public function rejectTrip(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status  = "Cancelled";
        $booking->update();

        Mail::to($booking->customer->email)->send(new BookingRejected($booking));

        return ['message', 'Success'];
    }

    public function cancelTrip(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status  = "Cancelled";
        $booking->update();

        Mail::to($booking->customer->email)->send(new BookingCancelled($booking));
        if (!$booking->driver) {
            return ['messages', 'Driver dont found'];
        } else {
            Mail::to($booking->driver->email)->send(new BookingDriverCancelled($booking));
        }


        return ['message', 'Success'];
    }

    public function changeDriver(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return ['message' => 'Driver successfully changed'];
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return ['message', 'Status Successfully updated'];
    }

    public function getFinishedBookings($driver)
    {
        $statuses = ['Finished', 'Cancelled', 'Cancelled Paid'];

        $model = Booking::with('vehicle', 'customer', 'driver')
                        ->whereIn('status', $statuses)
                        ->where('driver_id', $driver)
                        ->orderBy('id', 'DESC')
                        ->paginate(500);

        return response()
               ->json([
                   'model' => $model
               ]);
    }

    public function getPendingBookings()
    {
        $model = Booking::with('vehicle', 'customer', 'driver')
                         ->where('driver_id', NULL)
                         ->where('status', 'Pending')
                         ->orderBy('id', 'DESC')
                         ->paginate(500);

        return response()
            ->json([
                'model' => $model
            ]);
    }

    public function getOnWayBookings($driver)
    {
        $model = Booking::with('vehicle', 'customer', 'driver')
                          ->whereNotNull('driver_id')
                          ->where('status', '!=', 'Cancelled')
                          ->where('status', '!=', 'Cancelled Paid')
                          ->where('status', '!=', 'Finished')
                          ->where('driver_id', $driver)
                          ->orderBy('id', 'DESC')
                          ->paginate(500);

        return response()
            ->json([
                'model' => $model
            ]);
    }

    public function cancelBooking(Request $request, $id)
    {
        $data = Booking::findOrFail($id);
        $data->status = $request->status;
        $data->save();
    }

    public function test()
    {
        return Booking::with('vehicle')->orderBy('id', 'DESC')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Booking::create([
            'pickup_address'        => $request['pickup_address'],
            'drop_address'          => $request['drop_address'],
            'type'                  => $request['type'],
            'date'                  => $request['date'],
            'pickup_min'            => $request['pickup_min'],
            'pickup_hour'           => $request['pickup_hour'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function updateTripDetails(BookingStoreRequest $request, BookingService $bookingService, $id)
    {
        $booking = Booking::find($id);
        $booking->pickup_address    = $booking->pickup_address;
        $booking->drop_address      = $booking->drop_address;

        $booking->vehicle_id        = $request->vehicle_id;
        $booking->pickup_sign       = $request->pickup_sign;
        $booking->flight_number     = $request->flight_number;
        $booking->additional_info   = $request->additional_info;
        $booking->special_request   = $request->special_request;
        $booking->pickup_sign       = $request->pickup_sign;
        $booking->passagers         = $request->passagers;
        $booking->seats             = $request->seats;
        $booking->bags              = $request->bags;
        $booking->name              = $request->name;
        $booking->phone             = $request->phone;
        // Using custom service for price calculator
        $booking->price             = $bookingService->calculateBookingPrice($booking);
        $booking->distance          = $bookingService->calculateBookingDistance($booking);

        // Generate booking number with vehicle prefix
        if (request()->get('vehicle_id') == 1 ) {
            $booking->number = '550' . Keygen::numeric(3)->generate();
        } elseif (request()->get('vehicle_id') == 2) {
            $booking->number = '330' . Keygen::numeric(3)->generate();
        } elseif (request()->get('vehicle_id') == 3) {
            $booking->number = '220' . Keygen::numeric(3)->generate();
        } elseif (request()->get('vehicle_id') == 4) {
            $booking->number = '110' . Keygen::numeric(3)->generate();
        } elseif (request()->get('vehicle_id') == 5) {
            $booking->number = '440' . Keygen::numeric(3)->generate();
        }

        // Create new custom if not exist
        if (Customer::where('email', request()->get('email'))->exists()) {
            $customer_id = Customer::select('id')->where('email', request()->get('email'))->first();
            $booking->customer_id = $customer_id->id;
        } else {
            $customer = new Customer();
            $customer->name  = request()->get('name');
            $customer->email = request()->get('email');
            $customer->phone = request()->get('phone');
            $customer->save();

            $customer_id = Customer::select('id')->where('email', request()->get('email'))->first();
            $booking->customer_id = $customer_id->id;
        }

        $booking->save();

        return ['message' => 'Update client info'];
    }

    public function lastUpdate(BookingStoreRequest $request, BookingService $bookingService, $id)
    {
        $booking = Booking::find($id);
        $booking->payment_method      = $booking->payment_method;
        
        $booking->save();

        // Auto-generate pdf file with 'pickup-sign'
        $pickup_s = $booking->pickup_sign;
        $data = ['title' => $pickup_s];
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pickupsign', $data)->setPaper('a4', 'landscape');

        $content = $pdf->download()->getOriginalContent();

        // Generate pdf file named from input text
        Storage::put('public/PDF/'.$pickup_s.'.pdf', $content);
        
        // Get all drivers
        $driver = Driver::all();
        
        // After booking submitted, send email to customer
        foreach ($driver as $driver) {
            if(!empty($driver->email)) {
                Mail::to($driver->email)->send(new BookingDriverPending($booking));
            } else {
                
            }
        }
        
        Mail::to($booking->customer->email)->send(new BookingPending($booking));

        return ['message' => 'Update client info'];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        Mail::to($booking->customer->email)->send(new ClientBookingCancelled($booking));

        // Delete the article
        $booking->delete();

        notify()->success('Trip successfully deleted!');
    }

    public function testAPI()
    {
        $now = new Carbon();

        $berlin = $now->copy()->addMinutes(60); // Berlin timestamp
        $romania = $now->copy()->addMinutes(120); // Berlin timestamp
        $min60  = $berlin->copy()->addMinutes(60); // Booking 2 goyrs

        $booking = Booking::whereMonth('date', '=', date('m'))->whereDay('date', '=', date('d'))
                            ->where('pickup_hour', $min60->hour)
                            ->where('pickup_min', $min60->minute)
                            ->get();

//        foreach($booking as $booking)
//        {
//            $time = $booking->pickup_hour . ":" . $booking->pickup_min . ':' .'00';
//            $date = $booking->date .  ' ' . $time;
//            $test = Carbon::parse($date)->format('Y-m-d H:i:s');
//            $book_date = new Carbon($test);
//
//            $diff = $book_date->diffInMinutes($now);
//
//            if($diff = 59 && $diff = 60){
//                $da  = $booking->pickup_address;
//            } else {
//                $da = 'something went wrong';
//            }
//        }

        return response()
            ->json([
                'booking' => $booking,
                'min60' => $min60
            ]);
    }
}
