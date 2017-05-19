<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOrderProducts extends Model
{
    public $timestamps = false;
    
    public function history()
    {
        return $this->belongsTo('App\StockOrderHistory', 'order_id');
    }
}
