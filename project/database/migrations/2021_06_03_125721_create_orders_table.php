<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('items');
            $table->integer('couponId');
            $table->decimal('discount', 8, 2)->nullable()->default(0.00);
            $table->decimal('subtotal', 8, 2)->nullable()->default(0.00);
            $table->decimal('grandTotal', 8, 2)->nullable()->default(0.00);
            $table->string('shippingAddress', 100);
            $table->enum('billingAddr', [1,0]);
            $table->string('billingAddress', 200)->nullable();
            $table->integer('orderStatusId');
            $table->integer('paymentStatusId');
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
        Schema::dropIfExists('orders');
    }
}
