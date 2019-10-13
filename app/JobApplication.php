<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JobApplication extends Model
{
    use DataViewer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id', 'firstname', 'lastname', 'phone', 'email', 'status'
    ];

    public static $columns = [
        'ID', 'Job', 'Firstname',
        'Lastname', 'Phone', 'Email', 'Status', 'Created', 'Actions'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
