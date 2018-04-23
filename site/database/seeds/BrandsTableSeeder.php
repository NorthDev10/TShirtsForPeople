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
            ],
            [
                'name' => 'Marvel',
            ],
            [
                'name' => 'Voijeans',
            ],
            [
                'name' => 'ColorClothes',
            ],
            [
                'name' => 'Maison Kitsune',
            ]
        ]);
    }
}