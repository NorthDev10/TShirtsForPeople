<?php

use Illuminate\Database\Seeder;

class Quantity_tshirtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quantity_tshirts')->insert([
            [
                'tshirt_id' => 1,
                'color_id' => 20,
                'size' => 'XS',
                'tshirts_preview_id' => 1,
                'quantity' => 15,
            ],
            [
                'tshirt_id' => 1,
                'color_id' => 20,
                'size' => 'S',
                'tshirts_preview_id' => 1,
                'quantity' => 20,
            ],
            [
                'tshirt_id' => 1,
                'color_id' => 20,
                'size' => 'M',
                'tshirts_preview_id' => 1,
                'quantity' => 10,
            ],
            [
                'tshirt_id' => 1,
                'color_id' => 20,
                'size' => 'L',
                'tshirts_preview_id' => 1,
                'quantity' => 8,
            ],
            [
                'tshirt_id' => 2,
                'color_id' => 15,
                'size' => 'XS',
                'tshirts_preview_id' => 2,
                'quantity' => 5,
            ],
            [
                'tshirt_id' => 2,
                'color_id' => 15,
                'size' => 'S',
                'tshirts_preview_id' => 2,
                'quantity' => 7,
            ],
            [
                'tshirt_id' => 2,
                'color_id' => 15,
                'size' => 'M',
                'tshirts_preview_id' => 2,
                'quantity' => 21,
            ],
            [
                'tshirt_id' => 2,
                'color_id' => 15,
                'size' => 'L',
                'tshirts_preview_id' => 2,
                'quantity' => 24,
            ],
            [
                'tshirt_id' => 3,
                'color_id' => 5,
                'size' => 'XS',
                'tshirts_preview_id' => 3,
                'quantity' => 12,
            ],
            [
                'tshirt_id' => 3,
                'color_id' => 5,
                'size' => 'S',
                'tshirts_preview_id' => 3,
                'quantity' => 3,
            ],
            [
                'tshirt_id' => 3,
                'color_id' => 5,
                'size' => 'M',
                'tshirts_preview_id' => 3,
                'quantity' => 16,
            ],
            [
                'tshirt_id' => 3,
                'color_id' => 5,
                'size' => 'L',
                'tshirts_preview_id' => 3,
                'quantity' => 27,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 21,
                'size' => 'S',
                'tshirts_preview_id' => 4,
                'quantity' => 3,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 21,
                'size' => 'M',
                'tshirts_preview_id' => 4,
                'quantity' => 5,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 19,
                'size' => 'XS',
                'tshirts_preview_id' => 5,
                'quantity' => 6,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 19,
                'size' => 'S',
                'tshirts_preview_id' => 5,
                'quantity' => 1,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 19,
                'size' => 'M',
                'tshirts_preview_id' => 5,
                'quantity' => 2,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 19,
                'size' => 'L',
                'tshirts_preview_id' => 5,
                'quantity' => 7,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 25,
                'size' => 'M',
                'tshirts_preview_id' => 6,
                'quantity' => 3,
            ],
            [
                'tshirt_id' => 4,
                'color_id' => 25,
                'size' => 'L',
                'tshirts_preview_id' => 6,
                'quantity' => 10,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 1,
                'size' => 'XS',
                'tshirts_preview_id' => 7,
                'quantity' => 2,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 1,
                'size' => 'S',
                'tshirts_preview_id' => 7,
                'quantity' => 11,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 1,
                'size' => 'M',
                'tshirts_preview_id' => 7,
                'quantity' => 9,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 1,
                'size' => 'L',
                'tshirts_preview_id' => 7,
                'quantity' => 5,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 1,
                'size' => 'XL',
                'tshirts_preview_id' => 7,
                'quantity' => 2,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 2,
                'size' => 'S',
                'tshirts_preview_id' => 8,
                'quantity' => 3,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 2,
                'size' => 'M',
                'tshirts_preview_id' => 8,
                'quantity' => 8,
            ],
            [
                'tshirt_id' => 5,
                'color_id' => 2,
                'size' => 'L',
                'tshirts_preview_id' => 8,
                'quantity' => 12,
            ],
        ]);
    }
}
