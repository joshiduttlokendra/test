<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('products',[1,0])->comment('1=>Limited,0=>Unlimited');
            $table->integer('productLimit')->nullable()->comment('No Of Products');
            $table->date('productAllowedDate')->nullable()->comment('Products Allowed Till');
            $table->enum('freeAdvertisements',[1,0])->comment('Free Advertisements');
            $table->enum('shippingManagements',[1,0])->comment('Shipping Management');
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
        Schema::dropIfExists('membership_vendors');
    }
}
