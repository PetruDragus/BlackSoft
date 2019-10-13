<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;

class Booking extends Model
{

    use DataViewer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pickup_address', 'drop_address', 'bags', 'passagers', 'email', 'flight_number',
        'vehicle_id', 'payment_method', 'status', 'pickup_sign', 'special_request', 'price', 'pickup_time', 'date',
        'additional_info', 'phone', 'driver_id'
    ];

    public static $columns = [
        'id', 'pickup_address', 'Drop Address', 'Date', 'Seats', 'Passagers', 'Bags', 'Price', 'Status', 'Created', 'Actions'
    ];

    /**
     * Get the projects record associated with the user.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the invoice record associated with the user.
     */
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the projects record associated with the user.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the projects record associated with the user.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    /**
     * Get the projects record associated with the user.
     */
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
