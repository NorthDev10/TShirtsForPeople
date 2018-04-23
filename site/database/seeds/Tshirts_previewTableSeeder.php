<?php

use Illuminate\Database\Seeder;

class Tshirts_previewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tshirts_preview')->insert([
            [
                'images' => json_encode([
                    'light-green-t-shirt-with-long-sleeves-1.jpg',
                    'light-green-t-shirt-with-long-sleeves-2.jpg',
                    'light-green-t-shirt-with-long-sleeves-3.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    'marvel-series-light-olive-round-neck-t-shirt.jpg',
                    'marvel-series-light-olive-round-neck-t-shirt1.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    'voi-men-blue-round-neck-t-shirts-.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    'image1.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    'image2.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    'image3.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    'Maison_Kitsune1.jpg',
                    'Maison_Kitsune2.jpg',
                    'Maison_Kitsune3.jpg',
                ]),
            ],
            [
                'images' => json_encode([
                    '1.jpg',
                    '2.jpg',
                ]),
            ]
        ]);
    }
}
