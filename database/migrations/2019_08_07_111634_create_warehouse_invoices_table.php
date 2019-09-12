<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderNo')->nullable();
            $table->date('orderDate')->nullable();
            $table->string('amount')->nullable();
            $table->text('cart')->nullable();
            $table->string('paymentId')->nullable();
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products');
            $table->integer('mainWarehouseId')->unsigned()->index()->nullable();
            $table->foreign('mainWarehouseId')->references('id')->on('main_warehouses')->onDelete('cascade');
            $table->integer('warehouseId')->unsigned()->index()->nullable();
            $table->foreign('warehouseId')->references('id')->on('warehouses')->onDelete('cascade');
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
        Schema::dropIfExists('warehouse_orders');
    }
}
