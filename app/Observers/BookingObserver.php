<?php

namespace App\Observers;

use App\Mail\Driver\BookingDriverEdited;
use App\Mail\Guest\BookingEdited;
use Illuminate\Support\Facades\Mail;

use PDF;
use App\Customer;
use Keygen\Keygen;
use App\Booking;
use App\Http\Requests\BookingStoreRequest;
use App\Services\BookingService;
use Illuminate\Support\Facades\Storage;

class BookingObserver
{
    /**
     * Handle the booking "created" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function saving(Booking $booking)
    {
//        // Generate booking number with vehicle prefix
//        if (request()->get('vehicle_id') == 1 ) {
//            $booking->number = '550' . Keygen::numeric(3)->generate();
//        } elseif (request()->get('vehicle_id') == 2) {
//            $booking->number = '330' . Keygen::numeric(3)->generate();
//        } elseif (request()->get('vehicle_id') == 3) {
//            $booking->number = '220' . Keygen::numeric(3)->generate();
//        } elseif (request()->get('vehicle_id') == 4) {
//            $booking->number = '110' . Keygen::numeric(3)->generate();
//        } elseif (request()->get('vehicle_id') == 5) {
//            $booking->number = '440' . Keygen::numeric(3)->generate();
//        }
//
//        // Create new custom if not exist
//        if (Customer::where('email', request()->get('email'))->exists()) {
//            $customer_id = Customer::select('id')->where('email', request()->get('email'))->first();
//            $booking->customer_id = $customer_id->id;
//        } else {
//            $customer = new Customer();
//            $customer->name  = request()->get('name');
//            $customer->email = request()->get('email');
//            $customer->phone = request()->get('phone');
//            $customer->save();
//
//            $customer_id = Customer::select('id')->where('email', request()->get('email'))->first();
//            $booking->customer_id = $customer_id->id;
//        }


    }

    /**
     * Handle the booking "updated" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {

    }

    /**
     * Handle the booking "deleted" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        //
    }

    /**
     * Handle the booking "restored" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function restored(Booking $booking)
    {
        //
    }

    /**
     * Handle the booking "force deleted" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function forceDeleted(Booking $booking)
    {
        //
    }
}
