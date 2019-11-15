<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Exports\JobsExport;
use App\Job;
use Session;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.jobs.index');
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new JobsExport(), 'jobs.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jobs.create');
    }

    public function store(Request $request)
    {
        $jobs = New Job();

        request()->validate([
            'last_date'    => 'required',
            'title'        => 'required',
            'description'  => 'required',
        ]);

        $jobs->title       = $request->get('title');
        $jobs->description = $request->get('description');
        $jobs->vacancy     = $request->get('vacancy');
        $jobs->last_date   = $request->get('last_date');
        $jobs->status      = $request->get('status');
        $jobs->save();

        Session::flash('success', 'Jon successfully created!');

        return redirect()
            ->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('pages.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);

        return view('pages.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $jobs = Job::findOrFail($id);

        request()->validate([
            'last_date'    => 'required',
            'title'        => 'required',
            'description'  => 'required',
        ]);

        $jobs->title       = $request->get('title');
        $jobs->description = $request->get('description');
        $jobs->vacancy     = $request->get('vacancy');
        $jobs->last_date   = $request->get('last_date');
        $jobs->status      = $request->get('status');
        $jobs->save();
        $jobs->save();

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Contact edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Job::find($id);

        $jobs->delete();

        Session::flash('success', 'Job successfully deleted!');

        return redirect()
            ->route('jobs.index');
    }
}
