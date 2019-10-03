<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Booking;
use App\Exports\CustomersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'DESC')->paginate(15);

        return view('pages.customers.index', compact('customer'));
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
        $customer = New Customer();
        $customer->name       = $request->get('name');
        $customer->email      = $request->get('email');
        $customer->phone      = $request->get('email');
        $customer->save();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created successfully.');
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
