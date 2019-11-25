<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendFeedback()
    {

        Mail::to('codixital@gmail.com')->send(new TestMail());

        return 'A message has been sent to Mailtrap!';
    }

    public function Events()
    {
        $calendardata = array
        (
            "0" => array
            (
                "title" => "Event One",
                "start" => "2019-01-09",
            ),
            "1" => array
            (
                "title" => "Event Two",
                "start" => "2019-01-06",
            )
        );
        return response()->json(["calendardata" => $calendardata]);
    }
}
