<?php

namespace App\Http\Controllers;

use App\Exports\PaymentsExport;
use App\Payment;
use App\Contact;
use App\Invoice;
use Session;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.payments.index');
    }

    public function getData()
    {
        $model = Payment::with('contact', 'invoice')->searchPaginateAndOrder();
        $columns = Payment::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new PaymentsExport, 'payments.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new PaymentsExport, 'payments.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoices = Invoice::all();

        $contacts = Contact::all();

        return view('pages.payments.create', compact('invoices', 'contacts'));
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
            'date'         => 'required',
            'invoice_id'   => 'required',
            'contact_id'   => 'required',
            'amount'       => 'required',
            'status'       => 'required',
        ]);

        $payment = New Payment();
        $payment->date          = $request->get('date');
        $payment->invoice_id    = $request->get('invoice_id');
        $payment->contact_id    = $request->get('contact_id');
        $payment->amount        = $request->get('amount');
        $payment->status        = $request->get('status');
        $payment->save();

        Session::flash('success', 'Payment successfully created!');

        return redirect()
            ->route('payments.index');
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
        $payment = Payment::findOrFail($id);

        $contact = Contact::all();

        $invoice = Invoice::all();

        return view('pages.payments.edit', compact('payment', 'invoice', 'contact'));
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
        $payment = Payment::findOrFail($id);
        $payment->date          = $request->get('date');
        $payment->invoice_id    = $request->get('invoice_id');
        $payment->contact_id    = $request->get('contact_id');
        $payment->amount        = $request->get('amount');
        $payment->status        = $request->get('status');
        $payment->save();

        return redirect()
            ->route('payments.index')
            ->with('success', 'PAyment edited successfully.');
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
