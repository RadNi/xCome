<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXExamTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_exam_transactions', function (Blueprint $table) {
            $table->unsignedInteger('transaction_id');
            $table->foreign('transaction_id')->references('transaction_id')->on('x_transactions');
            $table->primary(['transaction_id']);
            $table->string('fee', '20')->default('0');
            $table->string('type', '20');
            $table->string('from', '25');
            $table->string('to', '25');
            $table->boolean('done')->default(false);
            $table->unsignedInteger('clerk_id')->nullable();
            $table->foreign('clerk_id')->references('id')->on('x_users');
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
        Schema::dropIfExists('x_exam_transactions');
    }
}
