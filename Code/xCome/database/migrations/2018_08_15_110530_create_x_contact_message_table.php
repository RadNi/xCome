<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXContactMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_message', function (Blueprint $table) {
            $table->increments('message_id');
            $table->string('name', 25)->nullable();
            $table->string('family_name', 20)->nullable();
            $table->string('username', 25)->nullable();
            $table->string('email', 25)->nullable();
            $table->string('phoneNumber', 15)->nullable();
            $table->text('message', 250);
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
        Schema::dropIfExists('contact_message');
    }
}
