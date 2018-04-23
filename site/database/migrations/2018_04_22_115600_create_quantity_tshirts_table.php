<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityTshirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_tshirts', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('tshirt_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->enum('size', [
                'XS', 'S', 'M', 'L',
                'XL', 'XXL', 'XXXL'
            ]);
            $table->integer('tshirts_preview_id')->unsigned();
            $table->integer('quantity')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_tshirts');
    }
}
