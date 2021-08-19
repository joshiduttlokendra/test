<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningLogsASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earning_logs_a_s', function (Blueprint $table) {
            $table->id();
            $table->integer('orderId');
            $table->decimal('tax', 8, 2);
            $table->decimal('discount', 8, 2);
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
        Schema::dropIfExists('earning_logs_a_s');
    }
}
