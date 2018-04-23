<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTshirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tshirts', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name_uk', 100);
            $table->string('name_en', 100);
            $table->integer('user_id')->unsigned()->nullable();
            $table->tinyInteger('brand_id')->unsigned();
            $table->enum('gender', [
                'female', 'male', 'unisex',
            ]);
            $table->enum('fabric', [
                'acrylic', 'bamboo',
                'viscose', 'modal',
                'polyamide', 'polyester',
                'cotton', 'wool',
            ]);
            $table->enum('model', [
                'singlet', 'polo',
                'long_sleeves', 'half_sleeves',
            ]);
            $table->float('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tshirts');
    }
}
