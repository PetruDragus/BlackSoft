<?php

namespace App\Http\Controllers;

use App\City;
use App\Exports\CitiesExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new CitiesExport(), 'cities.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new CitiesExport, 'cities.csv');
    }

    public function store(Request $request)
    {
        $city = New City();
        $city->name            = $request->get('name');
        $city->country         = $request->get('country');
        $city->distance_metric = $request->get('distance_metric');
        $city->currency        = $request->get('currency');
        $city->save();

        Session::flash('success', 'City successfully created!');

        return redirect()
            ->route('cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('pages.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->name            = $request->get('name');
        $city->country         = $request->get('country');
        $city->distance_metric = $request->get('distance_metric');
        $city->currency        = $request->get('currency');
        $city->save();

        return redirect()
            ->route('cities.index')
            ->with('success', 'City edited successfully.');
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
