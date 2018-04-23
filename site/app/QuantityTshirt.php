<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityTshirt extends Model
{
    protected $table = 'quantity_tshirts';
    public $timestamps = false;

    public function tshirt() {
        return $this->belongsTo('App\Tshirt');
    }

    public function color() {
        return $this->hasMany('App\Color');
    }

    public function preview() {
        return $this->hasMany('App\TshirtsPreview');
    }
}
