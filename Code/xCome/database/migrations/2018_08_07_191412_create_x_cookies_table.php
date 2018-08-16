<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXCookiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_cookies', function (Blueprint $table) {
            $table->string('token', '25');
            $table->ipAddress('ip');
            $table->dateTime('exp_date');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('x_users');
            $table->primary(['token', 'ip', 'exp_date']);
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
        Schema::dropIfExists('x_cookies');
    }
}
