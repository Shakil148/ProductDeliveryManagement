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
            $table->string('invoiceNo');
            $table->date('orderDate');
            $table->date('deliveryDate');
            $table->string('amount');
            $table->string('freeAmount');
            $table->string('totalBill');
            $table->string('advancePayment');
            $table->boolean('status');
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products');
            $table->integer('warehouseId')->unsigned()->index()->nullable();
            $table->foreign('warehouseId')->references('id')->on('warehouses');
            $table->integer('dealerId')->unsigned()->index()->nullable();
            $table->foreign('dealerId')->references('id')->on('dealers');
            $table->integer('distributorId')->unsigned()->index()->nullable();
            $table->foreign('distributorId')->references('id')->on('distributors');
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
