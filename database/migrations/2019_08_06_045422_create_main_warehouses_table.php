<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->text('address')->nullable();
            $table->Integer('amount')->default('0')->nullable();
            $table->string('discount')->default('0')->nullable();
            $table->text('userName')->nullable();
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('main_warehouses');
    }
}
