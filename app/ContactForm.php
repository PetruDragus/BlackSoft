<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use DataViewer;

    protected $fillable = [
        'name', 'email', 'subject', 'message'
    ];

    public static $columns = [
        'ID', 'Name', 'Email',
        'Subject', 'Message', 'Created', 'Updated'
    ];
}