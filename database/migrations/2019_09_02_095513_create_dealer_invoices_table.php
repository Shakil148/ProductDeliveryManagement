<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceNo')->nullable();
            $table->integer('orderId')->unsigned()->index()->nullable();
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->integer('invoiceUnit')->nullable();
            $table->integer('freeUnit')->nullable();
            $table->integer('totalUnit')->nullable();
            $table->integer('totalPrice')->nullable();
            $table->integer('remainUnit')->nullable();
            $table->integer('remainBalance')->nullable();
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
        Schema::dropIfExists('dealer_invoices');
    }
}
