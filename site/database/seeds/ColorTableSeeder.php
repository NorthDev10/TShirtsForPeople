<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            [
                'name_en' => 'black',
                'name_uk' => 'чорний',
                'code' => '#000',
            ],
            [
                'name_en' => 'gray',
                'name_uk' => 'сірий',
                'code' => '#666666',
            ],
            [
                'name_en' => 'white',
                'name_uk' => 'білий',
                'code' => '#ffffff',
            ],
            [
                'name_en' => 'blue',
                'name_uk' => 'синій',
                'code' => '#3333ff',
            ],
            [
                'name_en' => 'colorful',
                'name_uk' => 'різнокольоровий',
                'code' => 'colorful',
            ],
            [
                'name_en' => 'dark grey',
                'name_uk' => 'темно-сірий',
                'code' => '#666666',
            ],
            [
                'name_en' => 'silver',
                'name_uk' => 'сріблястий',
                'code' => '#f1f1f1',
            ],
            [
                'name_en' => 'red',
                'name_uk' => 'червоний',
                'code' => '#ff0000',
            ],
            [
                'name_en' => 'ginger',
                'name_uk' => 'рудий',
                'code' => '#d14719',
            ],
            [
                'name_en' => 'orange',
                'name_uk' => 'помаранчевий',
                'code' => '#ff6600',
            ],
            [
                'name_en' => 'brown',
                'name_uk' => 'коричневий',
                'code' => '#663300',
            ],
            [
                'name_en' => 'beige',
                'name_uk' => 'бежевий',
                'code' => '#ffeedd',
            ],
            [
                'name_en' => 'golden',
                'name_uk' => 'золотистий',
                'code' => '#ffd700',
            ],
            [
                'name_en' => 'khaki',
                'name_uk' => 'хакі',
                'code' => '#bdb76b',
            ],
            [
                'name_en' => 'olive',
                'name_uk' => 'оливковий',
                'code' => '#808000',
            ],
            [
                'name_en' => 'yellow',
                'name_uk' => 'жовтий',
                'code' => '#ffff00',
            ],
            [
                'name_en' => 'dark green',
                'name_uk' => 'темно-зелений',
                'code' => '#005000',
            ],
            [
                'name_en' => 'green',
                'name_uk' => 'зелений',
                'code' => '#009900',
            ],
            [
                'name_en' => 'lime green',
                'name_uk' => 'салатовий',
                'code' => '#99ff99',
            ],
            [
                'name_en' => 'turquoise',
                'name_uk' => 'бірюзовий',
                'code' => '#30d5c8',
            ],
            [
                'name_en' => 'azure',
                'name_uk' => 'блакитний',
                'code' => '#85d6ff',
            ],
            [
                'name_en' => 'dark blue',
                'name_uk' => 'темно синій',
                'code' => '#103090',
            ],
            [
                'name_en' => 'purple',
                'name_uk' => 'фіолетовий',
                'code' => '#9900cc',
            ],
            [
                'name_en' => 'lilac',
                'name_uk' => 'бузковий',
                'code' => '#c8a2c8',
            ],
            [
                'name_en' => 'pink',
                'name_uk' => 'рожевий',
                'code' => '#ff00bb',
            ],
            [
                'name_en' => 'light pink',
                'name_uk' => 'світло рожевий',
                'code' => '#ffe1ee',
            ],
            [
                'name_en' => 'burgundy',
                'name_uk' => 'бордовий',
                'code' => '#990033',
            ]
        ]);
    }
}
