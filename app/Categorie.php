<?php

namespace App;

use App\Vehicle;
use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categorie extends Model
{
    use DataViewer, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];

    public static $columns = [
        'ID', 'Name',
        'Cars No.', 'Created'
    ];

    /**
     * Get the invoice record associated with the user.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
