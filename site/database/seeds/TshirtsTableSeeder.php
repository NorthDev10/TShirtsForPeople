<?php

use Illuminate\Database\Seeder;

class TshirtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tshirts')->insert([
            [
                'name_uk' => 'Світло-зелена футболка з довгим рукавом',
                'name_en' => 'Light green T-shirt with long sleeves',
                'user_id' => 1,
                'brand_id' => 1,
                'gender' => 'male',
                'fabric' => 'cotton',
                'model' => 'half_sleeves',
                'price' => 14,
            ],
            [
                'name_uk' => 'T-shirt Marvel series of olive color with short sleeves',
                'name_en' => 'Marvel Series olive-colored with short sleeves',
                'user_id' => 1,
                'brand_id' => 2,
                'gender' => 'male',
                'fabric' => 'cotton',
                'model' => 'half_sleeves',
                'price' => 18,
            ],
            [
                'name_uk' => 'Різнобарвна футболка від VIO',
                'name_en' => 'Multi-colored t-shirt from VOI',
                'user_id' => 1,
                'brand_id' => 3,
                'gender' => 'male',
                'fabric' => 'cotton',
                'model' => 'half_sleeves',
                'price' => 21,
            ],
            [
                'name_uk' => 'Кольорові футболки від ColorClothes',
                'name_en' => 'Colored t-shirts by ColorClothes',
                'user_id' => 1,
                'brand_id' => 4,
                'gender' => 'female',
                'fabric' => 'polyester',
                'model' => 'half_sleeves',
                'price' => 11,
            ],
            [
                'name_uk' => 'Смугастий лонгслів від Maison Kitsune',
                'name_en' => 'Striped Longsliv from Maison Kitsune',
                'user_id' => 1,
                'brand_id' => 5,
                'gender' => 'female',
                'fabric' => 'cotton',
                'model' => 'long_sleeves',
                'price' => 17,
            ],
            [
                'name_uk' => 'Поло Maison Kitsune',
                'name_en' => 'Polo Maison Kitsune',
                'user_id' => 1,
                'brand_id' => 5,
                'gender' => 'male',
                'fabric' => 'cotton',
                'model' => 'polo',
                'price' => 8,
            ]
        ]);
    }
}
