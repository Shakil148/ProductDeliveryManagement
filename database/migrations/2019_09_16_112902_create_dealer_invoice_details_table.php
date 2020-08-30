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
            $table->float('price')->default('0')->nullable();
            $table->integer('invoiceUnit')->default('0')->nullable();
            $table->integer('freeUnit')->default('0')->nullable();
            $table->integer('totalUnit')->default('0')->nullable();
            $table->float('total')->default('0')->nullable();
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
