<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Driver;
use App\Invoice;
use App\Vehicle;
use App\Booking;
use Session;

use App\Mail\BookingAcceptedMail;
use App\Mail\BookingEditedMail;
use App\Mail\BookingDeleteMail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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
     * Display a listing of the cancelled resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelled()
    {
        return view('pages.bookings.cancelled');
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

    public function generatePrice(Request $request, $id)
    {
        $booking = Booking::find($id);

        $origin = urlencode($booking->pickup_address);
        $destination = urlencode($booking->drop_address);
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyColJ2SXghtrn8OccREfBBwdDPePid5aus&units=metric");
        $distance = json_decode($api);

        $meters = number_format(((int)$distance->rows[0]->elements[0]->distance->value / 1000), 0);

        $price_meter = number_format(((int)$distance->rows[0]->elements[0]->distance->value / 1000), 2);

        $elements_hours = $distance->rows[0]->elements;

        $duration = $elements_hours[0]->duration->text;

        $google = $meters - 10;
        $booking->price = $google + $booking->vehicle->price;

        $booking->update(['price' => $booking->price]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'pickup_address'   => 'required',
            'drop_address'     => 'required',
            'vehicle_id'       => 'required',
            'driver_id'        => 'required',
            'pickup_sign'      => 'required',
            'pickup_time'      => 'required',
            'flight_number'    => 'required',
            'date'             => 'required',
        ]);

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
        $booking->pickup_time     = $request->get('pickup_time');
        $booking->special_request = $request->get('special_request');
        $booking->additional_info = $request->get('additional_info');
        $booking->flight_number   = $request->get('flight_number');

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

        // Create new custom if not exist
        if (Customer::where('email', $request->get('email'))->exists()) {
            $customer_id = Customer::select('id')->where('email', $request->get('email'))->first();
            $booking->customer_id = $customer_id->id;
        } else {
            $customer = new Customer();
            $customer->name  = $request->get('name');
            $customer->email = $request->get('email');
            $customer->phone = $request->get('phone');
            $customer->save();

            $customer_id = Customer::select('id')->where('email', $request->get('email'))->first();
            $booking->customer_id = $customer_id->id;
        }

        $booking->save();

        // Create new invoice if not exist
        if (Invoice::where('booking_id', $booking->id)->exists()) {
            //
        } else {
            $invoice = new Invoice();
            $invoice->number        = "INV-" . $booking->id;
            $invoice->customer_id   = $booking->customer->id;
            $invoice->booking_id    = $booking->id;
            $invoice->date          = $request->get('date');
            $invoice->due_date      = date('Y-m-d', strtotime($request->get('date') . ' + 15 days')); // add + 15 to date
            $invoice->subtotal      = $booking->price;
            $invoice->reference     = "Booking #" . $booking->id;
            $invoice->total         = $booking->price;
            $invoice->save();
        }

        Mail::to($booking->customer->email)->send(new BookingAcceptedMail($booking));

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
        $booking->pickup_time     = $request->get('pickup_time');
        $booking->special_request = $request->get('special_request');
        $booking->additional_info = $request->get('additional_info');
        $booking->flight_number   = $request->get('flight_number');

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

        Mail::to($booking->customer->email)->send(new BookingEditedMail($booking));

        $booking->save();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking edited successfully.');
    }

    public function changeDriver(Request $request, $id) {

        request()->validate([
            'driver_id'   => 'required',
        ]);

        $booking = Booking::find($id);
        $booking->driver_id  = $request->get('driver_id');
        $booking->save();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Driver edited successfully.');
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

        Mail::to('codixital@gmail.com')->send(new BookingDeleteMail($booking));

        return ['message' => 'Booking Deleted!'];
    }
}
