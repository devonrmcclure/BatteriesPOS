<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer() {
        return $this->hasMany('App\Customer', 'location_id');
    }

    public function qoh() {
        return $this->hasMany('App\Qoh', 'location_id');
    }

    public function sales() {
        return $this->hasMany('App\Sale', 'location_id');
    }

    public function repair_order() {
        return $this->hasMany('App\RepairOrder', 'location_id');
    }

    public function part_order() {
        return $this->hasMany('App\PartOrder', 'location_id');
    }

    public function to_do() {
        return $this->hasMany('App\ToDo', 'location_id');
    }
}
