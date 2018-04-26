<?php

namespace App\Http\Controllers;

use App;
use Config;
use App\Tshirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class TshirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        App::setLocale($request->input('lang'));

        $tshirts = Tshirt::filter($request)->paginate(1);
        $tshirts = $tshirts->toArray();
        $tshirtList = $tshirts['data'];
        unset($tshirts['data']);
        $paginate = $tshirts;

        return array_merge([
                'tshirtList' => $tshirtList,
                'paginate' => $paginate,
                'lang' => array_merge(
                    Lang::get('gender'),
                    Lang::get('model'),
                    Lang::get('fabric')
                ),
            ],
            Config::get('settings.tshirt')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function show(Tshirt $tshirt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function edit(Tshirt $tshirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tshirt $tshirt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tshirt $tshirt)
    {
        //
    }
}
