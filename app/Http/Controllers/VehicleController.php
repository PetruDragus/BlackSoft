<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Exports\VehiclesExport;
use App\Vehicle;
use App\Driver;
use Maatwebsite\Excel\Facades\Excel;
use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.vehicles.index');
    }

    public function getData()
    {
        $model = Vehicle::with('driver')->searchPaginateAndOrder();
        $columns = Vehicle::$columns;

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
        $driver = Driver::all();

        return view('pages.vehicles.create', compact('driver'));
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new VehiclesExport, 'vehicles.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new VehiclesExport, 'vehicles.csv');
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
            'make'           => 'required',
            'model'          => 'required',
            'bussiness_type' => 'required',
            'driver_id'      => 'required',
            'plate'          => 'required',
        ]);

        if(!empty($request->has('photo'))) {
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }

        $vehicle = new Vehicle;
        $vehicle->make            = $request->make;
        $vehicle->model           = $request->model;
        $vehicle->bussiness_type  = $request->bussiness_type;
        $vehicle->plate           = $request->plate;
        $vehicle->color           = $request->color;
        $vehicle->price           = $request->price;
        $vehicle->driver_id       = $request->driver_id;
        $vehicle->vin             = $request->vin;
        $vehicle->year            = $request->year;
        $vehicle->current_meter   = $request->current_meter;

        if(!empty($request->has('photo'))) {
            $vehicle->mime = $cover->getClientMimeType();
            $vehicle->original_filename = $cover->getClientOriginalName();
            $vehicle->filename = $cover->getFilename().'.'.$extension;
        }

        $vehicle->save();

        Session::flash('success', 'Vehicle successfully created!');

        return redirect()
            ->route('vehicles.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $driver = Driver::all();

        return view('pages.vehicles.edit', compact('vehicle', 'driver'));
    }

    public function update(Request $request, $id)
    {
        $vehicles = Vehicle::findOrFail($id);

        request()->validate([
            'make'           => 'required',
            'model'          => 'required',
            'bussiness_type' => 'required',
            'driver_id'      => 'required',
            'plate'          => 'required',
        ]);

        if(!empty($request->has('photo'))) {
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }

        $vehicles->make            = $request->get('make');
        $vehicles->model           = $request->get('model');
        $vehicles->driver_id       = $request->get('driver_id');
        $vehicles->plate           = $request->get('plate');
        $vehicles->bussiness_type  = $request->get('bussiness_type');
        $vehicles->price           = $request->get('price');
        $vehicles->color           = $request->get('color');
        $vehicles->year            = $request->get('year');
        $vehicles->vin             = $request->get('vin');
        $vehicles->current_meter   = $request->get('current_meter');

        if(!empty($request->has('photo'))) {
            $vehicles->mime = $cover->getClientMimeType();
            $vehicles->original_filename = $cover->getClientOriginalName();
            $vehicles->filename = $cover->getFilename().'.'.$extension;
        }

        $vehicles->save();

        Session::flash('success', 'Vehicle successfully edited!');

        return redirect()
            ->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        $vehicle->delete();

        return redirect()
            ->back()
            ->with('success', 'Vehicle has been deleted Successfully');
    }
}
