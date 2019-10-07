<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceNo')->nullable();
            $table->string('date')->nullable();
            $table->string('driverName')->nullable();
            $table->string('helperName')->nullable();
            $table->string('contact')->nullable();
            $table->string('carNo')->nullable();
            $table->string('locationStart')->nullable();
            $table->string('locationEnd')->nullable();
            $table->string('kplCost')->nullable();
            $table->string('policeCost')->nullable();
            $table->string('foodAllowanceCost')->nullable();
            $table->string('maintainingCost')->nullable();
            $table->string('tollCost')->nullable();
            $table->string('othersCost')->nullable();
            $table->string('totalCost')->nullable();
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
        Schema::dropIfExists('distributors');
    }
}
