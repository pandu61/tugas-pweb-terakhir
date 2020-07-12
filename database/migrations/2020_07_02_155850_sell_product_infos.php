<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellProductInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_product_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id');
            $table->string('product_name');
            $table->integer('stock');
            $table->integer('price');
            $table->string('location');
            $table->string('condition');
            $table->string('category');
            $table->integer('weight');
            $table->longText('description');
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
      Schema::dropIfExists('sell_product_infos');
    }
}
