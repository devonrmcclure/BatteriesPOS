<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

    public function location()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeDefaultCustomer($query)
    {
        $query->where('email', \Auth::User()->email)->where('location_id', \Auth::User()->id);
    }
}
