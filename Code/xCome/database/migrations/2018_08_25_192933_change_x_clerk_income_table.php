<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeXClerkIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('x_clerk_incomes');


        Schema::create('x_clerk_incomes', function (Blueprint $table) {
            $table->string('value', 20);
            $table->unsignedInteger('clerk_id');
            $table->foreign('clerk_id')->references('id')->on('x_users');
            $table->primary(['clerk_id']);
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
        Schema::dropIfExists('x_clerk_incomes');


        Schema::create('x_clerk_incomes', function (Blueprint $table) {
            $table->string('value', 20);
            $table->unsignedInteger('clerk_id');
            $table->foreign('clerk_id')->references('id')->on('users');
            $table->primary(['clerk_id']);
            $table->timestamps();
        });
    }
}
