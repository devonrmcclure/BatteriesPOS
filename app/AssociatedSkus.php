<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssociatedSkus extends Model
{
    protected $table = 'associated_skus';

    public $timestamps = false;

    public function sku() 
    {
        return $this->belongsTo('App\Inventory', 'sku');
    }

    public function associated_sku()
    {
        return $this->belongsTo('App\Inventory', 'associated_sku');
    }
}
