<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellBoughtItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sell_bought_item', function (Blueprint $table) {
            $table->integer('seller_id');
            $table->integer('item_id');
            $table->integer('buyer_id');
            $table->date('date_bought');
            $table->string('continue_further');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
