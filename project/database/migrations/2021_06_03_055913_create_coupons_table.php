<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('type',[1,0])->comment('1=>fixed,2=>percentage');
            $table->decimal('amount',8,2);
            $table->decimal('minOrder',8,2);
            $table->enum('multiUses',[1,0])->comment('1=>Yes,2=>No');
            $table->enum('status',[1,0])->comment('1=>active,2=>InActive');
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
        Schema::dropIfExists('coupons');
    }
}
