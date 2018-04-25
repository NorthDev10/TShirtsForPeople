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
        return $this->belongsTo('App\Color');
    }

    public function preview() {
        return $this->belongsTo('App\TshirtsPreview', 'tshirts_preview_id');
    }
}
