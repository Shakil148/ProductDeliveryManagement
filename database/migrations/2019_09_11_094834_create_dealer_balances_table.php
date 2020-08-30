<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dealerId')->unsigned()->index()->nullable();
            $table->foreign('dealerId')->references('id')->on('dealers')->onDelete('cascade');
            $table->integer('amount')->default('0')->nullable();
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
        Schema::dropIfExists('dealer_balances');
    }
}
