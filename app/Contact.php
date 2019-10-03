<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use DataViewer;

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
