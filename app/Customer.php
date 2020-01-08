<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use DataViewer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone'
    ];

    public static $columns = [
        'ID', 'Name', 'Phone',
        'Email', 'Created', 'Updated'
    ];

    protected $allowedFilters = [
        'id' ,'name', 'email', 'phone',
        'created_at',
    ];
    protected $orderable = [
        'id' ,'name', 'email', 'phone',
        'created_at',
    ];


    /**
     * Get the projects record associated with the user.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
