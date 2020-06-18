<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'tbl_order_detail';
    protected $primaryKey = 'order_detail_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_quantity'
    ];

    public $timestamps = true;

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
