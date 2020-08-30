<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepoInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depo_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depoId')->unsigned()->index()->nullable();
            $table->foreign('depoId')->references('id')->on('depos')->onDelete('cascade');
            $table->text('invoiceNo')->nullable();
            $table->text('date')->nullable();
            $table->float('grandTotalUnit')->default('0')->nullable();
            $table->text('truckNo')->nullable();
            $table->text('driverName')->nullable();
            $table->text('driverMobile')->nullable();
            $table->text('comment')->nullable();
            $table->text('userName')->nullable();
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
        Schema::dropIfExists('depo_invoices');
    }
}
