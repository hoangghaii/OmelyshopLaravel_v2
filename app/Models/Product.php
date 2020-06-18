<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_quantity_instock',
        'product_sold',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',
        'product_weight',
        'product_unit',
        'product_origin',
        'product_netweight',
        'category_id',
        'sub_category_id'
    ];

    protected $attributes = array(
        'product_sold'  => 0
    );

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id');
    }
}
