<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('type')->nullable();
            $table->string('accountNo')->nullable();
            $table->string('bankName')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->integer('dealerId')->unsigned()->index()->nullable();
            $table->foreign('dealerId')->references('id')->on('dealers');
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
        Schema::dropIfExists('payments');
    }
}
