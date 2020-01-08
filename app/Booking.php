<?php

namespace App;

use Carbon\Carbon;
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
        'pickup_address', 'drop_address', 'bags', 'passagers',
        'email', 'flight_number', 'vehicle_id', 'payment_method',
        'status', 'pickup_sign', 'special_request', 'price',
        'pickup_hour', 'pickup_min', 'date',
        'additional_info', 'phone', 'driver_id',
        'name', 'number'
    ];

    public static $search = [
        'id', 'number', 'pickup_address', 'drop_address'
    ];

    public static $columns = [
        'id', 'Trip No.', 'Pickup Address', 'Drop Address', 'Driver | Car', 'Pickup Date / Time', 'Distance', 'Price', 'Status', 'Created', 'Actions'
    ];

//    public function setDateAttribute( $value ) {
//        $this->attributes['date'] = (new Carbon($value))->format('d/m/y');
//    }

    protected $allowedFilters = [
        'id' ,'pickup_address', 'drop_address', 'date', 'passengers', 'bags', 'payment_method', 'flight_number',
        'created_at', 'number', 'status',
        // nested
        'invoices.count', 'invoices.id', 'invoices.issue_date','invoices.due_date',
        'invoices.total', 'invoices.created_at'
    ];
    protected $orderable = [
        'id' ,'pickup_address', 'drop_address', 'date', 'passengers', 'bags', 'payment_method', 'flight_number',
        'created_at', 'number', 'status',
    ];

    public static function boot()
    {
        parent::boot();
        Booking::observe(new \App\Observers\BookingObserver());
    }

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
