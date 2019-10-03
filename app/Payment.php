<?php

namespace App;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use DataViewer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'invoice_id', 'contact_id', 'amount', 'status'
    ];

    public static $columns = [
        'Number', 'Invoice', 'Contact',
        'Amount', 'Status'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
