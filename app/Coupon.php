<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use DataViewer;

    protected $fillable = [
        'code', 'expire_date',
        'amount', 'distance_metric',
        'count', 'used_count',
        'status'
    ];

    public static $columns = [
        'ID', 'Coupon Code', 'Created At',
        'Expired Date', 'Amount', 'Count', 'Used Count', 'Status'
    ];
}
