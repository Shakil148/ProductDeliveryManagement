<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepoInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depo_invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depoInvoiceId')->unsigned()->index()->nullable();
            $table->foreign('depoInvoiceId')->references('id')->on('depo_invoices')->onDelete('cascade');
            $table->integer('productId')->unsigned()->index()->nullable();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->text('product')->nullable();
            $table->integer('invoiceUnit')->nullable();
            $table->integer('totalUnit')->nullable();
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
        Schema::dropIfExists('depo_invoice_details');
    }
}
