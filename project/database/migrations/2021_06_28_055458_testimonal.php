<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Testimonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonal', function (Blueprint $table) {
            $table->id();
            $table->text('testimonal')->default(null);
            $table->enum('overAllRatting',[1,2,3,4,5]);
            $table->enum('ShopAndExperience',[1,2,3,4,5]);
            $table->enum('WebFunc',[1,2,3,4,5]);
            $table->enum('CustomerServices',[1,2,3,4,5]);
            $table->enum('DeliveryServices',[1,2,3,4,5]);
            $table->string('userid')->nullable();
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
        Schema::dropIfExists('testimonal');

    }
}
