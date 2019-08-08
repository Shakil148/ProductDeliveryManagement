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
        Schema::create('warehouse_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inviceNo');
            $table->date('orderDate');
            $table->string('amount');
            $table->boolean('status');
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products');
            $table->integer('mainWarehouseId')->unsigned()->index()->nullable();
            $table->foreign('mainWarehouseId')->references('id')->on('mainWareouses');
            $table->integer('warehouseId')->unsigned()->index()->nullable();
            $table->foreign('warehouseId')->references('id')->on('warehouses');
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
        Schema::dropIfExists('warehouse_invoices');
    }
}
