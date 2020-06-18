<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'tbl_sub_category';
    protected $primaryKey = 'sub_category_id';
    protected $fillable = ['sub_category_name', 'sub_category_desc', 'sub_category_status', 'category_id'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
