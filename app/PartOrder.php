<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartOrder extends Model
{

    public function location() {
        return $this->belongsTo('App\User');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function staff() {
        return $this->belongsTo('App\Staff');
    }

    public function invoice() {
        return $this->hasMany('App\Invoice');
    }
}
