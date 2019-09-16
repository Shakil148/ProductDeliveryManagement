<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dealerInvoiceId')->unsigned()->index()->nullable();
            $table->foreign('dealerInvoiceId')->references('id')->on('dealer_invoices')->onDelete('cascade');
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->text('product')->nullable();
            $table->integer('price')->nullable();
            $table->integer('invoiceUnit')->nullable();
            $table->integer('freeUnit')->nullable();
            $table->integer('totalUnit')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('dealer_invoice_details');
    }
}
