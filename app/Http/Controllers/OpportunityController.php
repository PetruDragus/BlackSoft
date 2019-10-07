<?php

namespace App\Http\Controllers;

use App\Opportunity;
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

        return redirect()
            ->route('opportunities.index')
            ->with('success', 'Opportunity created successfully.');
    }

    public function destroy($id)
    {
        $opportunity = Opportunity::find($id);

        $opportunity->delete();

        return redirect()
            ->back()
            ->with('success', 'Opportunity has been deleted Successfully');
    }
}