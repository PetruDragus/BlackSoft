<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use DataViewer;

    protected $fillable = [
        'booking_id', 'driver_id', 'review',
        'rating', 'customer_name'
    ];

    public static $columns = [
        'ID', 'Booking', 'Driver',
        'Review', 'Rating', 'Customer', 'Created'
    ];

    protected $allowedFilters = [
        'id' ,'booking_id', 'driver_id', 'review', 'rating', 'customer_id',
        'created_at',
    ];
    protected $orderable = [
        'id' ,'booking_id', 'driver_id', 'review', 'rating', 'customer_id',
        'created_at',
    ];

    /**
     * Get the bookings record associated with the user.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get the drivers record associated with the user.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
