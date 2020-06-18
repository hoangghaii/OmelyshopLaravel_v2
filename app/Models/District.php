<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'devvn_quanhuyen';
    protected $primaryKey = 'maqh';
    protected $fillable = ['name', 'type', 'matp'];

    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'matp');
    }
}
