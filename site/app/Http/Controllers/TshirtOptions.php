<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Brand;
use App;
use Config;
use Lang;

class TshirtOptions extends Controller
{
    public function getOptions(Request $request) {

        App::setLocale($request->input('lang'));

        return [
            'size' => [
                'XS',
                'S',
                'M',
                'L',
                'XL',
                'XXL',
                'XXXL',
            ],
            'gender' => Lang::get('gender'),
            'model' => Lang::get('model'),
            'fabric' => Lang::get('fabric'),
            'colors' => Color::select('*')->get(),
            'brands' => Brand::select('*')->get(),
        ];
    }
}
