<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'Slingshot',
                'translit' => 'slingshot',
            ],
            [
                'name' => 'Marvel',
                'translit' => 'Marvel',
            ],
            [
                'name' => 'Voijeans',
                'translit' => 'voijeans',
            ],
            [
                'name' => 'ColorClothes',
                'translit' => 'color_clothes',
            ],
            [
                'name' => 'Maison Kitsune',
                'translit' => 'maison_kitsune',
            ]
        ]);
    }
}