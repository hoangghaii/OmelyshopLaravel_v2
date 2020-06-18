<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_name',
        'customer_password',
        'customer_phone',
        'customer_email',
        'customer_province',
        'customer_district',
        'customer_ward',
        'customer_address'
    ];

    public $timestamps = false;
}
