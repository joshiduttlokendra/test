<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('cartId');
            $table->integer('productId');
            $table->enum('type',[1,0])->comment('1=>product,0=>service');
            $table->string('size');
            $table->string('timing')->nullable();
            $table->string('quantity');
            $table->enum('gift',[1,0])->comment('1=>yes,0=>no');
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
        Schema::dropIfExists('cart_items');
    }
}
