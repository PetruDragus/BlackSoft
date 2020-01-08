<?php

namespace App\Mail;

use App\Booking;
use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingAcceptedMail extends Mailable
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
        $myPublicFolder = storage_path("app/public/PDF/");

        return $this->subject('Ride #' . $this->booking['number'] . ' ' . 'confirmed' . ' ' . $this->booking['date'] . ' - ' . $this->booking['pickup_hour'] . ':' . $this->booking['pickup_min'])
            ->from('booking@blackhansa.de')
            ->attach($myPublicFolder.'/'.$this->booking['pickup_sign'].'.pdf', [
                'mime' => 'application/pdf',
            ])
            ->view('emails.accepted')->with(['booking', $this->booking]);
    }
}
