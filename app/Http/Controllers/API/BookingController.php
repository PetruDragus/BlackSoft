<?php

namespace App\Http\Controllers\API;

use App\Booking;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use App\Http\Controllers\Controller;

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

    public function test()
    {
        $booking = Booking::orderBy('customer_id', 'ASC')
            ->with('invoice')
            ->get();
        return response()->json($booking);
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

        // Delete the article
        $booking->delete();
        return ['message' => 'Contact Deleted!'];
    }
}
