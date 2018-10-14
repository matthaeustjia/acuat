<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_keluars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceKeluar_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('quantity');
            $table->integer('price');
            $table->foreign('invoiceKeluar_id')->references('id')->on('invoice_keluars');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('item_keluars');
    }
}
