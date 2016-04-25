<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qoh extends Model
{	

	protected $table = 'qoh';
	protected $hidden = ['id', 'created_at'];

    public function inventory()
    {
    	return $this->belongsTo('App\Inventory');
    }

    public function location()
    {
    	return $this->belongsTo('App\User');
    }
}
