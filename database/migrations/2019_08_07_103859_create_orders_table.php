<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('orderNo')->nullable();
            $table->date('orderDate')->nullable();
            $table->string('amount')->default('0')->nullable();
            $table->string('freeAmount')->default('0')->nullable();
            $table->string('totalBill')->default('0')->nullable();
            $table->string('advancePayment')->default('0');
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->integer('warehouseId')->unsigned()->index()->nullable();
            $table->foreign('warehouseId')->references('id')->on('warehouses')->onDelete('cascade');
            $table->integer('dealerId')->unsigned()->index()->nullable();
            $table->foreign('dealerId')->references('id')->on('dealers')->onDelete('cascade');
            $table->integer('distributorId')->unsigned()->index()->nullable();
            $table->foreign('distributorId')->references('id')->on('distributors')->onDelete('cascade');
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
