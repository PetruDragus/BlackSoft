<?php

namespace App\Mail;

use App\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingEditedMail extends Mailable
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
        return $this->subject('Ride #' . $this->booking['number'] . ' ' . 'edited' . ' ' . $this->booking['date'] . ' - ' . $this->booking['pickup_hour'] . ':' . $this->booking['pickup_min'])
            ->from('booking@blackhansa.de')
            ->view('emails.edited')->with(['booking', $this->booking]);
    }
}