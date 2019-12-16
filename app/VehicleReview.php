<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class VehicleReview extends Model
{
    use DataViewer;

    protected $fillable = [
        'booking_id', 'vehicle_id', 'review',
        'rating', 'customer_name'
    ];

    public static $columns = [
        'ID', 'Booking', 'Vehicle',
        'Review', 'Rating', 'Customer', 'Created'
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
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
