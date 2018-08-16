<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXSalaryTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_salary_transactions', function (Blueprint $table) {
            $table->foreign('transaction_id')->references('x_transactions')->on('transaction_id');
            $table->primary(['transaction_id']);
            $table->string('from', 25);
            $table->string('too', 25);
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
        Schema::dropIfExists('x_salary_transactions');
    }
}
