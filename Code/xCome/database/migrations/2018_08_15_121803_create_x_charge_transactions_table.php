<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXChargeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_charge_transactions', function (Blueprint $table) {
            $table->unsignedInteger('transaction_id');
            $table->foreign('transaction_id')->references('transaction_id')->on('x_transactions');
            $table->primary(['transaction_id']);
            $table->string('from', 25);
            $table->string('to', 25);
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
        Schema::dropIfExists('x_charge_transactions');
    }
}
