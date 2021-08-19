<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipShoppersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_shoppers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('discountType',[1,0])->comment('1=>fixed,0=>percent');
            $table->float('discountValue')->comment('how much discount numbers');
            $table->enum('freeShipping',[1,0])->comment('1=>active,0=>Inactive');
            $table->enum('shippingTime',[1,0])->comment('1=>shorter,0=>normal');
            $table->enum('status',[1,0])->comment('1=>active,0=>Inactive');
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
        Schema::dropIfExists('membership_shoppers');
    }
}
