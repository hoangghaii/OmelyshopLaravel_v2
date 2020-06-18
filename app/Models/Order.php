<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_id',
        'order_total',
        'order_status'
    ];

    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
