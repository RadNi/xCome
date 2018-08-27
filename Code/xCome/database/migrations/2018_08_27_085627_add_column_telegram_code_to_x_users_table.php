<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTelegramCodeToXUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_users', function (Blueprint $table){
            $table->string('telegram_code')->nullable();
            $table->string('telegram_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('x_users', function (Blueprint $table) {
            $table->dropColumn('telegram_code');
            $table->dropColumn('telegram_id');
        });
    }
}
