<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOrderHistory extends Model
{
    protected $primaryKey = 'order_number';
    protected $table = 'stock_order_history';
    public $incrementing = false;

    public function products() 
    {
        return $this->hasMany('App\StockOrderProducts', 'order_id');
    }
}
