<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXExchangeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_exchange_transactions', function (Blueprint $table) {
            $table->foreign('transaction_id')->references('x_transactions')->on('transaction_id');
            $table->primary(['transaction_id']);
            $table->enum('from_type', ['dollar', 'euro', 'rial']);
            $table->enum('to_type', ['dollar', 'euro', 'rial']);
            $table->string('fee', 25);
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
        Schema::dropIfExists('x_exchange_transactions');
    }
}
