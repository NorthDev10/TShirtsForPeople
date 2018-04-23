<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    public function tshirts() {
        return $this->hasMany('App\Tshirt');
    }
}
