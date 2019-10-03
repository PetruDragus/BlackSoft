<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('pages.jobs.index');
    }

    public function getData()
    {
        $model = Job::searchPaginateAndOrder();
        $columns = Job::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }
}
