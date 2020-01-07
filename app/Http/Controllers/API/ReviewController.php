<?php

namespace App\Http\Controllers\API;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Review::with('booking', 'driver')->advancedFilter();
        $columns = Review::$columns;

        return response()
            ->json([
                'collection' => $model,
                'columns' => $columns
            ]);
    }

    public function getDriverReviews($driver)
    {
        $model = Review::where('driver_id', $driver)
            ->orderBy('id', 'DESC')
            ->paginate(500);

        $count = $model->count();
        $average = $model->avg('rating');

        return response()
            ->json([
                'model' => $model,
                'count' => $count,
                'average' => number_format($average, 1, '.', ',')
            ]);
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
            'booking_id'         => 'required',
            'driver_id'          => 'required',
            'review'             => 'required',
            'rating'             => 'required',
            'customer_name'      => 'required',
        ]);

        return Review::create([
            'booking_id'         => $request['booking_id'],
            'driver_id'          => $request['driver_id'],
            'review'             => $request['review'],
            'rating'             => $request['rating'],
            'customer_name'      => $request['customer_name'],
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Delete the article
        $review->delete();
        return ['message' => 'Contact Deleted!'];
    }
}
