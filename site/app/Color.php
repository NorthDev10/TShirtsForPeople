<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = false;

    public function quantityTshirts() {
        // записи, которые используют данный цвет
        return $this->hasMany('App\QuantityTshirt');
    }
}
