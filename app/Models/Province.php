<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'devvn_tinhthanhpho';
    protected $primaryKey = 'matp';
    protected $fillable = ['name', 'type'];

    public $timestamps = false;
}
