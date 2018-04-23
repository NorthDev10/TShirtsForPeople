<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TshirtsPreview extends Model
{
    protected $table = 'tshirts_preview';
    public $timestamps = false;

    public function quantityTshirts() {
        // записи, в которых используется превью
        return $this->hasMany('App\QuantityTshirt');
    }
}
