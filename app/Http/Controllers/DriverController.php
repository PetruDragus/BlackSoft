<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.drivers.index');
    }

    public function getData()
    {
        $model = Driver::with('vehicle')->searchPaginateAndOrder();
        $columns = Driver::$columns;

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
        $vehicle = Vehicle::all();

        return view('pages.drivers.create', compact('vehicle'));
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
            'name'    => 'required',
            'phone'   => 'required',
        ]);

        if(!empty($request->has('photo'))) {
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }

        $driver = new Driver();
        $driver->partener_id    = $request->partener_id;
        $driver->name           = $request->name;
        $driver->phone          = $request->phone;
        $driver->vehicle_id     = $request->vehicle_id;
        $driver->city           = $request->city;
        $driver->birthday       = $request->birthday;
        $driver->genter         = $request->genter;

        if(!empty($request->has('photo'))) {
            $driver->mime = $cover->getClientMimeType();
            $driver->original_filename = $cover->getClientOriginalName();
            $driver->filename = $cover->getFilename().'.'.$extension;
        }

        $driver->save();

        Session::flash('success', 'Driver successfully created!');

        return redirect()
            ->route('drivers.index');
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
        $driver = Driver::findOrFail($id);

        $vehicle = Vehicle::all();

        return view('pages.drivers.edit', compact('driver', 'vehicle'));
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
        request()->validate([
            'name'        => 'required',
            'phone'       => 'required',
        ]);

        $driver = Driver::find($id);

        if(!empty($request->has('photo'))) {
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }

        $driver->partener_id    = $request->partener_id;
        $driver->name           = $request->name;
        $driver->phone          = $request->phone;
        $driver->vehicle_id     = $request->vehicle_id;
        $driver->city           = $request->city;
        $driver->birthday       = $request->birthday;
        $driver->genter         = $request->genter;

        if(!empty($request->has('photo'))) {
            $driver->mime = $cover->getClientMimeType();
            $driver->original_filename = $cover->getClientOriginalName();
            $driver->filename = $cover->getFilename().'.'.$extension;
        }

        $driver->save();

        return redirect()
            ->route('drivers.index')
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
        $driver = Driver::find($id);

        $driver->delete();

        return redirect()
            ->back()
            ->with('success', 'Driver has been deleted Successfully');
    }
}
