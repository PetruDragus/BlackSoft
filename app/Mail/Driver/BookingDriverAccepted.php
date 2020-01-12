<?php

namespace App\Mail\Driver;

use App\Booking;
use App\Mail\Guest\BookingCancelled;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingDriverAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $path = storage_path("app/public/");

        return $this->subject('Ride #' . $this->booking['number'] . ' ' . 'accepted' . ' ' . $this->booking['date'] . ' - ' . $this->booking['pickup_hour'] . ':' . $this->booking['pickup_min'])
            ->from('booking@blackhansa.de')
            ->attach($path . 'ics/BH-' .$this->booking['number'].'.ics', [
                'mime' => 'text/calendar',
            ])
//            ->attach($path . 'PDF/' .$this->booking['pickup_sign'].'.pdf', [
//                'mime' =>'application/pdf'
//            ])
            ->view('emails.driver.BookingDriverAccepted')->with(['booking', $this->booking]);
    }
}
