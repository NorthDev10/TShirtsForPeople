<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function quantity() {
        return $this->hasMany('App\QuantityTshirt');
    }
}
