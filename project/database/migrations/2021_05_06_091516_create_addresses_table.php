<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('aptNumber');
            $table->string('city');
            $table->string('country');
            $table->string('zipCode');
            $table->string('postalCode');
            $table->enum('shippingAddress',[1,0])->comment('1=>yes,2=>no');
            $table->enum('billingAddress',[1,0])->comment('1=>yes,2=>no');
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
        Schema::dropIfExists('addresses');
    }
}
