<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Tshirt extends Model
{
    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function brand() 
    {
        return $this->belongsTo('App\Brand');
    }

    public function quantity() 
    {
        return $this->hasMany('App\QuantityTshirt');
    }

    public function colors() {
        return $this->belongsToMany('App\Color', 'quantity_tshirts')->groupBy('id');
    }

    public function previews() {
        return $this->belongsToMany('App\TshirtsPreview', 'quantity_tshirts')->groupBy('id');
    }

    public static function filter(Request $request)
    {
        $Tshirt = Tshirt::query();
        $Tshirt->with('brand', 'quantity', 'previews', 'colors');
        $Tshirt->whereHas('quantity', function ($query) {
            $query->where('quantity', '>', 0);
        });

        if($request->has('model')) {
            $Tshirt->where('model', '=', $request->input('model'));
        }

        if($request->has('gender')) {
            $Tshirt->where('gender', '=', $request->input('gender'));
        }

        if($request->has('fabric')) {
            $Tshirt->where('fabric', '=', $request->input('fabric'));
        }

        if($request->has('color_id')) {
            $Tshirt->where('color_id', '=', $request->input('color_id'));
        }

        if($request->has('size')) {
            $Tshirt->where('size', '=', $request->input('size'));
        }

        if($request->has('priceFrom') && $request->has('priceUpTo')) {
            $Tshirt->whereBetween('price', [
                $request->input('priceFrom'), $request->input('priceUpTo')
            ]);
        }

        return $Tshirt;
    }
}