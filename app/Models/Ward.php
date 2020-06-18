<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'devvn_xaphuongthitran';
    protected $primaryKey = 'xaid';
    protected $fillable = ['name', 'type', 'maqh'];

    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'maqh');
    }
}
