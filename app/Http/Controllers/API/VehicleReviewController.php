<?php

namespace App\Http\Controllers\API;

use App\VehicleReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = VehicleReview::with('booking', 'vehicle')->searchPaginateAndOrder();
        $columns = VehicleReview::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    public function getVehicleReviews($driver)
    {
        $model = VehicleReview::where('vehicle_id', $driver)
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
        //
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
        //
    }
}
