<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class FlatRate extends Model
{
    use DataViewer;

    protected $fillable = [
        'pickup_address', 'drop_address'
    ];

    public static $columns = [
        'ID', 'Pickup Address', 'Drop Address', 'Active', 'Created', 'Updated'
    ];

    protected $allowedFilters = [
        'id' ,'pickup_address', 'drop_address', 'status',
        'created_at',
    ];
    protected $orderable = [
        'id' ,'pickup_address', 'drop_address', 'status',
        'created_at',
    ];
}
