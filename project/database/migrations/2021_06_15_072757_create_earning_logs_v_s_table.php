<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningLogsVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earning_logs_v_s', function (Blueprint $table) {
            $table->id();
            $table->integer('orderId');
            $table->integer('productId');
            $table->integer('vendorId');
            $table->decimal('earning', 8, 2);
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
        Schema::dropIfExists('earning_logs_v_s');
    }
}
