<?php

namespace App\Http\Controllers;

use App\FlatRate;
use Illuminate\Http\Request;

class FlatRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.flatrate.index');
    }
}
