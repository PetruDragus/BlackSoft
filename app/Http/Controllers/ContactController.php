<?php

namespace App\Http\Controllers;

use App\Contact;
use Session;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contacts.index');
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new ContactsExport, 'contacts.csv');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contacts.create');
    }

    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Contact created successfully!',
            'alert-type' => 'success'
        );

        $contact = New Contact();
        $contact->name      = $request->get('name');
        $contact->email     = $request->get('email');
        $contact->phone     = $request->get('phone');
        $contact->notes     = $request->get('notes');
        $contact->address   = $request->get('address');
        $contact->save();

        notify()->success('Contact successfully created!');

        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('pages.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->name      = $request->get('name');
        $contact->email     = $request->get('email');
        $contact->phone     = $request->get('phone');
        $contact->notes     = $request->get('notes');
        $contact->address   = $request->get('address');
        $contact->save();

        notify()->success('Contact successfully updated!');

        return redirect()
            ->route('contacts.index')
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
        $contact = Contact::find($id);

        $contact->delete();

        notify()->success('Contact successfully deleted!');

        return redirect()
            ->route('contacts.index');
    }
}