<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use DataViewer;

    protected $fillable = [
        'title', 'description', 'vacancy', 'last_date', 'status'
    ];

    public static $columns = [
        'ID', 'Title', 'Description',
        'Vacancy', 'Last Date', 'Status','Created', 'Updated'
    ];
}