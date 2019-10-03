<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cities.index');
    }

    public function getData()
    {
        $model = City::searchPaginateAndOrder();
        $columns = City::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cities.create');
    }

    public function store(Request $request)
    {
        $city = New City();
        $city->name            = $request->get('name');
        $city->country         = $request->get('country');
        $city->distance_metric = $request->get('distance_metric');
        $city->currency        = $request->get('currency');
        $city->save();

        return redirect()
            ->route('cities.index')
            ->with('success', 'City created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::find($id);

        $cities->delete();

        return redirect()
            ->back()
            ->with('success', 'Cities has been deleted Successfully');
    }
}
