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

    public static function filter(Request $request)
    {
        $Tshirt = DB::table('tshirts')
            ->select('tshirts.*', 'colors.name_en AS colors_name_en',
                'colors.name_uk AS colors_name_uk', 'colors.code AS colors_code', 
                'colors.id AS color_id', 'tp.images', 
                'brands.name AS brands_name', 'qt.size')
            ->join('brands', 'brands.id', '=', 'tshirts.brand_id')
            ->join('quantity_tshirts AS qt', function ($join) {
                $join->on('qt.tshirt_id', '=', 'tshirts.id')
                     ->where('qt.quantity', '>', 0);
            })
            ->join('tshirts_preview AS tp', 'tp.id', '=', 'qt.tshirts_preview_id')
            ->join('colors', 'colors.id', '=', 'qt.color_id');

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

        return $Tshirt->groupBy('tshirt_id');
    }
}