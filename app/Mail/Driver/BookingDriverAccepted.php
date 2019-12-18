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
        return $this->subject('Ride #' . $this->booking['number'] . ' ' . 'accepted' . ' ' . $this->booking['date'] . ' - ' . $this->booking['pickup_hour'] . ':' . $this->booking['pickup_min'])
            ->from('booking@blackhansa.de')
            ->view('emails.driver.BookingDriverAccepted')->with(['booking', $this->booking]);
    }
}
