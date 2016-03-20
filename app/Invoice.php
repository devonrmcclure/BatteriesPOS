<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
