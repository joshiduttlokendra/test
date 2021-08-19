<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->enum('type',[1,0])->comment('1=>parent,0=>variant');
            $table->integer('parentId')->nullable();
            $table->string('name');
            $table->integer('marketId');
            $table->string('imageUrl');
            $table->string('adminCommission');
            $table->string('size');
            $table->string('color');
            $table->double('price');
            $table->enum('status',[1,0])->comment('1=>Active,2=>Inactive');
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
        Schema::dropIfExists('products');
    }
}
