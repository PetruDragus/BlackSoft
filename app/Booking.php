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
        'pickup_address', 'drop_address', 'bags', 'passagers',
        'email', 'flight_number', 'vehicle_id', 'payment_method',
        'status', 'pickup_sign', 'special_request', 'price',
        'pickup_hour', 'pickup_min', 'date',
        'additional_info', 'phone', 'driver_id',
        'name', 'number'
    ];

    public static $columns = [
        'id', 'Trip No.', 'Pickup Address', 'Drop Address', 'Date', 'Passagers', 'Bags', 'Price', 'Status', 'View Route', 'Created', 'Actions'
    ];

    public function getTotalPrice(Booking $booking, $id)
    {
        // From address
        $origin = urlencode($booking->pickup_address);

        // To address
        $destination = urlencode($booking->drop_address);
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyColJ2SXghtrn8OccREfBBwdDPePid5aus&units=metric");
        $distance = json_decode($api);

        // Trip distance
        $meters = number_format(((int)$distance->rows[0]->elements[0]->distance->value / 1000), 0);
//        $price_meter = number_format(((int)$distance->rows[0]->elements[0]->distance->value / 1000), 2);
//        $elements_hours = $distance->rows[0]->elements;
//        $duration = $elements_hours[0]->duration->text;

        if ($meters < 10) {
            return $this->price = $booking->vehicle->price;
        } else {
            $google = $meters - 10;
            return $this->price = $google + $booking->vehicle->price;
        }
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
