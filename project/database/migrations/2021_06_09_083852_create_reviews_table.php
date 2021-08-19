<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [1,0])->comment('1=>product,0=>service');
            $table->integer('dataId');
            $table->string('imageUrl')->comment('profilePic');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->integer('rating');
            $table->integer('sizeRating');
            $table->integer('serviceRating');
            $table->integer('qualityRating');
            $table->string('review');
            $table->string('pros');
            $table->string('cons');
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
        Schema::dropIfExists('reviews');
    }
}
