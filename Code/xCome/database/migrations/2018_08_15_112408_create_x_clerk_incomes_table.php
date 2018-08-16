<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXClerkIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_clerk_incomes', function (Blueprint $table) {
            $table->integer('clerk_id');
            $table->string('value', 20);
            $table->foreign('clerk_id')->references('id')->on('users');
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
    }
}
