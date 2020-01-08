<?php

namespace App\Http\Controllers\API;

use App\FlatRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlatRateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = FlatRate::advancedFilter();

        return response()
            ->json([
                'collection' => $model,
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFlatRates()
    {
        return FlatRate::orderBy('id', 'ASC')->paginate(60);
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
        $flatRate = FlatRate::findOrFail($id);

        // Delete the article
        $flatRate->delete();

        notify()->success('Flat Rate successfully deleted!');
    }
}
