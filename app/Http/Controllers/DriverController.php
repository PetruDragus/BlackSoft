<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use Session;
use Illuminate\Http\Request;

class DriverController extends Controller
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

        $driver = new Driver();
        $driver->partener_id    = $request->partener_id;
        $driver->name           = $request->name;
        $driver->phone          = $request->phone;
        $driver->vehicle_id     = $request->vehicle_id;
        $driver->city           = $request->city;
        $driver->birthday       = $request->birthday;
        $driver->genter         = $request->genter;
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
        $driver->partener_id    = $request->partener_id;
        $driver->name           = $request->name;
        $driver->phone          = $request->phone;
        $driver->vehicle_id     = $request->vehicle_id;
        $driver->city           = $request->city;
        $driver->birthday       = $request->birthday;
        $driver->genter         = $request->genter;
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
