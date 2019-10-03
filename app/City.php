<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use DataViewer;

    protected $fillable = [
        'name', 'country', 'currency', 'distance_metric'
    ];

    public static $columns = [
        'ID', 'Name', 'Country',
        'Currency', 'Distance Metric', 'Created', 'Updated'
    ];
}
