<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Exports\ReviewExport;
use App\Review;
use App\Booking;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.reviews.index');
    }

    public function getData() {

        $model = Review::with('booking', 'driver')->searchPaginateAndOrder();
        $columns = Review::$columns;

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
        return Excel::download(new ReviewExport, 'reviews.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new ReviewExport, 'reviews.csv');
    }

    public function create() {
        $driver = Driver::all();

        $booking = Booking::all();

        return view('pages.reviews.create', compact('driver', 'booking'));
    }

    public function store(Request $request) {

        $review = New Review();
        $review->driver_id      = $request->get('driver_id');
        $review->booking_id     = $request->get('booking_id');
        $review->review         = $request->get('review');
        $review->rating         = $request->get('rating');
        $review->customer_name  = $request->get('customer_name');
        $review->save();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);

        $review->delete();

        return redirect()
            ->back()
            ->with('success', 'Contact has been deleted Successfully');
    }
}
