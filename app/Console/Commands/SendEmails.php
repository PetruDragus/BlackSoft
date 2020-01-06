<?php

namespace App\Console\Commands;

use App\Booking;
use Carbon\Carbon;
use App\Mail\Driver\BookingDriver60min;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder e-mails to a driver 60 min before booking start';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        parent::__construct();

        $this->booking = $booking;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Booking $booking)
    {
        // Data de acum
        $now = new Carbon();
        $today = Carbon::today();
        // cevax = $today->addDays(1);

        $berlin = $now->copy()->addMinutes(60); // Berlin timestamp
        $min60  = $now->copy()->addMinutes(120); // Booking 2 hours

        $booking = Booking::whereMonth('date', '=', date('m'))->whereDay('date', '=', date('d'))
            ->where('pickup_hour', $min60->hour)
            ->where('pickup_min', $min60->minute)
            ->get();

        foreach($booking as $booking)
        {
            $email = $booking->driver->email;
            Mail::to($email)->send(new BookingDriver60min($booking));
        }
    }
}
