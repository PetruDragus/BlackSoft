<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Booking;
use App\Review;

use Illuminate\Http\Request;

class DashboardController extends Controller
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

        $currentMonth = date('m');

        $customers = Customer::orderBy('id', 'DESC')->get();

        $new_customers = Customer::whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();

        $new_invoices = Invoice::whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();

        $new_bookings = Booking::with('customer', 'invoice')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();

        $reviews = Review::orderBy('id', 'DESC')->paginate(4);

        $bookings = Booking::with(['invoice', 'customer', 'driver', 'driver.vehicle', 'driver.vehicle.categorie'])->orderBy('id', 'DESC')->get();

        return view('pages.dashboard.index', compact('customers','bookings', 'new_customers', 'new_bookings', 'new_invoices', 'reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
