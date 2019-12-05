<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Driver;
use App\Http\Requests\BookingStoreRequest;
use App\Invoice;
use App\Services\BookingService;
use App\Vehicle;
use App\Booking;

use App\Mail\BookingAcceptedMail;
use App\Mail\BookingEditedMail;
use App\Mail\BookingDeleteMail;
use App\Mail\ClientConfirmed;
use App\Mail\ClientChauffeurArrived;
use App\Mail\ClientBookingConfirmed;
use App\Mail\ClientBookingCancelled;

use Session;

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

        $booking->save();

        // After booking submitted, send email to customer
        Mail::to($booking->customer->email)->send(new ClientConfirmed($booking));

        Session::flash('success', 'Booking successfully created!');

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
        $driver = Driver::all();
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
    public function update(Request $request, $id)
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

        if ($request->get('status') == 'Finished') {
            Mail::to($booking->customer->email)->send(new ClientConfirmed($booking));
        } else {
            Mail::to($booking->customer->email)->send(new ClientBookingEdited($booking));
        }

        $origin = urlencode($booking->pickup_address);
        $destination = urlencode($booking->drop_address);
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyColJ2SXghtrn8OccREfBBwdDPePid5aus&units=metric");
        $distance = json_decode($api);

        $meters = number_format(((int)$distance->rows[0]->elements[0]->distance->value / 1000), 0);

        $price_meter = number_format(((int)$distance->rows[0]->elements[0]->distance->value / 1000), 2);

        $elements_hours = $distance->rows[0]->elements;

        $duration = $elements_hours[0]->duration->text;

        if($meters < 10) {
            $booking->price = $booking->vehicle->price;
        } else {
            $google = $meters - 10;
            $booking->price = $google + $booking->vehicle->price;
        }

        $booking->save();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking edited successfully.');
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

        return ['message' => 'Booking Deleted!'];
    }
}
