<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Tshirts_previewTableSeeder::class);
        $this->call(TshirtsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(Quantity_tshirtsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
