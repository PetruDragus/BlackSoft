<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use Session;

use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        return view('pages.jobApplication.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();

        return view('pages.jobApplication.create', compact('jobs'));
    }

    public function store(Request $request)
    {
        $application = New JobApplication();
        $application->job_id    = $request->get('job_id');
        $application->firstname = $request->get('firstname');
        $application->lastname  = $request->get('lastname');
        $application->phone     = $request->get('phone');
        $application->email     = $request->get('email');
        $application->status    = $request->get('status');
        $application->save();

        Session::flash('success', 'Application successfully created!');

        return redirect()
            ->route('applications.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $jobs = Job::all();

        $application = JobApplication::findOrFail($id);

        return view('pages.jobApplication.edit', compact('application', 'jobs'));
    }

    public function update(Request $request, $id)
    {
        $application = JobApplication::findOrFail($id);
        $application->job_id    = $request->get('job_id');
        $application->firstname = $request->get('firstname');
        $application->lastname  = $request->get('lastname');
        $application->phone     = $request->get('phone');
        $application->email     = $request->get('email');
        $application->status    = $request->get('status');
        $application->save();

        return redirect()
            ->route('applications.index')
            ->with('success', 'Application edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = JobApplication::find($id);

        $application->delete();

        Session::flash('success', 'Application successfully deleted!');

        return redirect()
            ->route('applications.index');
    }

}
