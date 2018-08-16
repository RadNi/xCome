<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_message', function (Blueprint $table) {
            $table->string('message_id', '25');
            $table->string('name', 25);
            $table->string('family_name', 20);
            $table->string('username', 25);
            $table->string('email', 25);
            $table->string('phoneNumber', 15);
            $table->text('message', 250);
            $table->primary(['message_id']);
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
