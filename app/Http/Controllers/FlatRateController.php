<?php

namespace App\Http\Controllers;

use App\FlatRate;
use Illuminate\Http\Request;

class FlatRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.flatrate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.flatrate.create');
    }

    public function store(Request $request)
    {
        $flatRate = New FlatRate();
        $flatRate->pickup_address   = $request->get('pickup_address');
        $flatRate->drop_address     = $request->get('drop_address');
        $flatRate->active           = $request->get('active');
        $flatRate->save();

        notify()->success('Flat Rate successfully created!');

        return redirect()
            ->route('flat-rates.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flatRate = FlatRate::findOrFail($id);

        return view('pages.flatrate.edit', compact('flatRate'));
    }

    public function update(Request $request, $id)
    {
        $flatRate = FlatRate::findOrFail($id);
        $flatRate->pickup_address   = $request->get('pickup_address');
        $flatRate->drop_address     = $request->get('drop_address');
        $flatRate->active           = $request->get('active');
        $flatRate->save();

        notify()->success('Flat Rate successfully updated!');

        return redirect()
            ->route('flat-rates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flatRate = FlatRate::find($id);

        $flatRate->delete();

        notify()->success('Flat Rate successfully deleted!');

        return redirect()
            ->back();
    }
}
