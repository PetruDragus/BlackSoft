<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;
use App\Helper\HasManyRelation;

class Invoice extends Model
{
    use HasManyRelation, DataViewer;

    protected $fillable = [
        'customer_id', 'date', 'due_date', 'discount',
        'terms_and_conditions'
    ];

    protected $guarded = [
        'number', 'sub_total', 'total'
    ];

    public static $columns = [
        'id', 'Issue Date', 'Due Date', 'Customer', 'Grand Total', 'Status'
    ];

    protected $dates = ['date', 'due_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function setSubTotalAttribute($value)
    {
        $this->attributes['sub_total'] = $value;
        $discount = $this->attributes['discount'];
        $this->attributes['total'] = $value - $discount;
    }
}
