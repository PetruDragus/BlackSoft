<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Driver;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'  => '',
            'url'   => '',
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

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Vehicle created successfully.');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $vehicle = Vehicle::find($id);

        $vehicle->delete();

        return redirect()
            ->back()
            ->with('success', 'Vehicle has been deleted Successfully');
    }
}
