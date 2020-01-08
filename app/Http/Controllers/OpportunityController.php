<?php

namespace App\Http\Controllers;

use App\Opportunity;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $row = Opportunity::orderBy('id', 'DESC')->paginate(12);

        return view('pages.opportunities.index', compact('row'));
    }

    public function create()
    {
        return view('pages.opportunities.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $opportunity = Opportunity::find($id);

        if(!empty($request->has('logo'))) {
            $cover = $request->file('logo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }

        $opportunity->name      = $request->get('name');
        $opportunity->email     = $request->get('email');
        $opportunity->phone     = $request->get('phone');
        $opportunity->location  = $request->get('location');
        $opportunity->category  = $request->get('category');

        if(!empty($request->has('logo'))) {
            $opportunity->mime = $cover->getClientMimeType();
            $opportunity->original_filename = $cover->getClientOriginalName();
            $opportunity->filename = $cover->getFilename().'.'.$extension;
        }

        $opportunity->save();

        notify()->success('Opportunities successfully updated!');

        return redirect()
            ->route('opportunities.index');
    }

    public function store(Request $request)
    {
        $opportunity = New Opportunity();

        if(!empty($request->has('logo'))) {
            $cover = $request->file('logo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }
        $opportunity->name      = $request->get('name');
        $opportunity->email     = $request->get('email');
        $opportunity->phone     = $request->get('phone');
        $opportunity->location  = $request->get('location');
        $opportunity->category  = $request->get('category');

        if(!empty($request->has('logo'))) {
            $opportunity->mime = $cover->getClientMimeType();
            $opportunity->original_filename = $cover->getClientOriginalName();
            $opportunity->filename = $cover->getFilename().'.'.$extension;
        }

        $opportunity->save();

        notify()->success('Opportunities successfully created!');

        return redirect()
            ->route('opportunities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opportunity = Opportunity::findOrFail($id);

        return view('pages.opportunities.edit', compact('opportunity'));
    }

    public function destroy($id)
    {
        $opportunity = Opportunity::find($id);

        $opportunity->delete();

        notify()->success('Opportunities successfully deleted!');

        return redirect()
            ->back();
    }
}