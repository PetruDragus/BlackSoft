<?php

namespace App\Http\Controllers\API;

use App\Booking;

use App\Mail\BookingDeleteMail;
use App\Mail\ClientBookingCancelled;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Booking::with('vehicle', 'customer', 'driver', 'invoice')->searchPaginateAndOrder();
        $columns = Booking::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns,
                'items_count' => $model->count()
            ]);
    }

    /**
     * Display a listing of the cancelled resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelled()
    {
        $model = Booking::with('vehicle', 'customer', 'driver', 'invoice')->where('status', '=', 'Cancelled')->searchPaginateAndOrder();
        $columns = Booking::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns,
                'items_count' => $model->count()
            ]);
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
        $this->validate($request, [
            'pickup_address'    => '',
            'drop_address'      => '',
        ]);

        return Booking::create([
            'pickup_address'        => $request['pickup_address'],
            'drop_address'          => $request['drop_address'],
            'type'                  => $request['type'],
            'date'                  => $request['date'],
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $booking->update();

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
}
