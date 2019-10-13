<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use DataViewer, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'notes'
    ];

    public static $columns = [
        'ID', 'Name', 'Address',
        'Email', 'Phone', 'Notes', 'Created', 'Updated'
    ];
}
