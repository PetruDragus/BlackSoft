<?php

namespace App;

use App\Categorie;
use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    use DataViewer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_id', 'make', 'model', 'bussiness_type', 'categorie_id', 'plate', 'color', 'price', 'vin', 'current_meter', 'year'
    ];

    public static $columns = [
        'Name', 'Business Type', 'Vehicle Price', 'Driver/Operator', 'Current Meter'
    ];

    protected $allowedFilters = [
        'id' , 'make', 'model',
        'created_at',
    ];
    protected $orderable = [
        'id' , 'make', 'model',
        'created_at'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Get the projects record associated with the user.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the projects record associated with the user.
     */
    public function reviews()
    {
        return $this->hasMany(VehicleReview::class);
    }
}