<?php

namespace App\Http\Controllers;

use App\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        return view('pages.jobApplication.index');
    }

}
