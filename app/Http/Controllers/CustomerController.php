<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Booking;
use Session;
use App\Exports\CustomersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
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
        return view('pages.customers.index');
    }

    public function getCustomerBookings()
    {
        $customer = Customer::orderBy('id', 'DESC')->paginate(15);

        $customer_bookings = Booking::where('customer_id', '=', $customer->id)
            ->paginate(12);

        return view('pages.customers.index', compact('customer_bookings'));
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new CustomersExport, 'customers.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required',
        ]);

        $customer = New Customer();
        $customer->name       = $request->get('name');
        $customer->email      = $request->get('email');
        $customer->phone      = $request->get('phone');
        $customer->save();

        Session::flash('success', 'Customer successfully created!');

        return redirect()
            ->route('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('pages.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name       = $request->get('name');
        $customer->email      = $request->get('email');
        $customer->phone      = $request->get('phone');
        $customer->save();

        Session::flash('success', 'Customer successfully edited!');

        return redirect()
            ->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()
            ->back()
            ->with('success', 'Customer has been deleted Successfully');
    }
}
