<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\BookingStoreRequest;
use App\Mail\Driver\BookingDriverEdited;
use App\Mail\Guest\BookingEdited;
use App\Services\BookingService;
use App\Vehicle;
use App\Booking;
use App\Customer;

use App\Mail\ClientBookingCancelled;

use App\Mail\Guest\ChauffeurArrived;
use App\Mail\Guest\ChauffeurOnWay;

use App\Mail\Driver\BookingDriver60min;
use App\Mail\Driver\BookingDriverArrived;

use Illuminate\Http\Request;
use Session;
use Keygen\Keygen;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.bookings.index');
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new BookingsExport, 'bookings.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new BookingsExport, 'bookings.csv');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function min60form(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        return view('pages.bookings.updateStatus.form', compact('booking'));
    }

    public function arrivedForm(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        return view('pages.bookings.updateStatus.arrived', compact('booking'));
    }

    public function finishForm(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        return view('pages.bookings.updateStatus.finish', compact('booking'));
    }

    public function min60Status(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status  = '60 min';
        $booking->save();

        Mail::to($booking->customer->email)->send(new ChauffeurOnWay($booking));

        return redirect()
                        ->route('status.confirm');
    }

    public function arrivedStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status  = 'Arrived';
        $booking->save();

        Mail::to($booking->customer->email)->send(new ChauffeurArrived($booking));
    }

    public function finishStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status  = 'Finished';
        $booking->save();
    }

    public function statusConfirm()
    {
        return view('emails.buttonConfirm');
    }

    protected function generateCode()
    {
        return Keygen::bytes()->generate(
            function($key) {
                // Generate a random numeric key
                $random = Keygen::numeric()->generate();

                // Manipulate the random bytes width the numeric key
                return substr(md5($key . $random . strrev($key)), mt_rand(0,5), 5);
            },
            function($key) {
                // Add a (-) after every fourth character in the key (not used)
                return join('-', str_split($key, 4));
            },
            'strtoupper'
        );
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return ['message', 'Status Successfully updated'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = Driver::all();
        $vehicle = Vehicle::all();

        return view('pages.bookings.create', compact('driver', 'vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request, BookingService $bookingService)
    {

        $booking = New Booking();
        $booking->pickup_address  = $request->get('pickup_address');
        $booking->drop_address    = $request->get('drop_address');
        $booking->bags            = $request->get('bags');
        $booking->date            = $request->get('date');
        $booking->seats           = $request->get('seats');
        $booking->passagers       = $request->get('passagers');
        $booking->vehicle_id      = $request->get('vehicle_id');
        $booking->driver_id       = $request->get('driver_id');
        $booking->payment_method  = $request->get('payment_method');
        $booking->status          = $request->get('status');
        $booking->pickup_sign     = $request->get('pickup_sign');
        $booking->pickup_hour     = $request->get('pickup_hour');
        $booking->pickup_min      = $request->get('pickup_min');
        $booking->special_request = $request->get('special_request');
        $booking->additional_info = $request->get('additional_info');
        $booking->flight_number   = $request->get('flight_number');
        $booking->name            = $request->get('name');
        $booking->phone           = $request->get('phone');
        // Using custom service for price calculator
        $booking->price           = $bookingService->calculateBookingPrice($booking);

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

        // After booking submitted, send email to customer
        Mail::to($booking->customer->email)->send(new BookingDriver60min($booking));

        notify()->success('Trip successfully created!');

        return redirect()
            ->route('bookings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::with(['driver', 'vehicle'])->findOrFail($id);

        return view('pages.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::with('customer', 'driver')->findOrFail($id);
        $driver  = Driver::all();
        $vehicle = Vehicle::all();

        return view('pages.bookings.edit', compact('booking', 'driver', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(BookingStoreRequest $request, BookingService $bookingService, $id)
    {
        $booking = Booking::find($id);
        $booking->pickup_address  = $request->get('pickup_address');
        $booking->drop_address    = $request->get('drop_address');
        $booking->bags            = $request->get('bags');
        $booking->date            = $request->get('date');
        $booking->seats           = $request->get('seats');
        $booking->passagers       = $request->get('passagers');
        $booking->vehicle_id      = $request->get('vehicle_id');
        $booking->driver_id       = $request->get('driver_id');
        $booking->status          = $request->get('status');
        $booking->pickup_sign     = $request->get('pickup_sign');
        $booking->special_request = $request->get('special_request');
        $booking->additional_info = $request->get('additional_info');
        $booking->flight_number   = $request->get('flight_number');
        $booking->pickup_hour     = $request->get('pickup_hour');
        $booking->pickup_min      = $request->get('pickup_min');
        $booking->name            = $request->get('name');
        $booking->phone           = $request->get('phone');
        // Using custom service for price calculator
        $booking->price           = $bookingService->calculateBookingPrice($booking);
        $booking->save();

        Mail::to($booking->driver->email)->send(new BookingDriverEdited($booking));
        Mail::to($booking->customer->email)->send(new BookingEdited($booking));

        notify()->success('Trip successfully edited!');

        return redirect()
            ->route('bookings.index');
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

        // Delete the article
        $booking->delete();

        Mail::to($booking->customer->email)->send(new ClientBookingCancelled($booking));

        notify()->success('Trip successfully deleted!');
    }
}
