<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dealerId')->unsigned()->index()->nullable();
            $table->foreign('dealerId')->references('id')->on('dealers')->onDelete('cascade');
            $table->text('date')->nullable();
            $table->text('invoiceNo')->nullable();
            $table->text('paymentNo')->nullable();
            $table->text('paidAmount')->nullable();
            $table->text('doAmount')->nullable();
            $table->text('balance')->nullable();
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
        Schema::dropIfExists('account_summaries');
    }
}
