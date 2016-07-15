<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartOrder extends Model
{

    public function getDates()
    {
        return [
            'to_head_office',
            'from_head_office',
            'customer_pick_up',
            'created_at',
            'updated_at'
        ];
    }

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
