<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceMasuk_id')->unsigned();
            $table->string('item_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            $table->foreign('invoiceMasuk_id')->references('id')->on('invoice_masuks');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_masuks');
    }
}
