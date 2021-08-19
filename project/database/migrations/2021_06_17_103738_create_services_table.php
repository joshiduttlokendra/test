<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->null();
            $table->string('description')->null();
            $table->string('category_id')->null();
            $table->string('marketId')->null();
            $table->string('imageUrl')->null();
            $table->string('adminCommission')->null();
            $table->string('location')->null();
            $table->string('city')->null();
            $table->string('country')->null();
            $table->string('price')->null();
            $table->string('status')->null();
            $table->string('adminApproval')->null();
            $table->string('availability_date')->null();
            $table->enum('mobility', [1, 0])->comment('1=>yes,0=>no');

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
        Schema::dropIfExists('services');
    }
}
