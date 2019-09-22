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
            $table->integer('dealerId')->unsigned()->index()->nullable();
            $table->foreign('dealerId')->references('id')->on('dealers')->onDelete('cascade');
            $table->integer('orderId')->unsigned()->index()->nullable();
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->text('invoiceNo')->nullable();
            $table->float('totalPrice')->nullable();
            $table->integer('remainUnit')->nullable();
            $table->integer('remainBalance')->nullable();
            $table->text('comment')->nullable();
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
