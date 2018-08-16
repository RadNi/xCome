<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('family_name', 20);
            $table->string('username', 25)->unique();
            $table->string('password', 25);
            $table->string('email', 25);
            $table->string('phoneNumber', 15);
            $table->string('national_id', 12)->unique();
            $table->text('address');
            $table->enum('type', ['user', 'clerk', 'manager']);
            $table->primary(['id']);
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
        Schema::dropIfExists('x_users');
    }
}
