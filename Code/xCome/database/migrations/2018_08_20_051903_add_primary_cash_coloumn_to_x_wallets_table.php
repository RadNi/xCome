<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrimaryCashColoumnToXWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('x_wallets', function (Blueprint $table) {
           $table->string('primary_cash', '25')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('x_wallets', function (Blueprint $table) {
            $table->dropColumn(['primary_cash']);
        });
    }
}
