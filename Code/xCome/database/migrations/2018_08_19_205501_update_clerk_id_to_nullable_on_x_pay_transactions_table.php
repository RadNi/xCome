<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClerkIdToNullableOnXPayTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_pay_transactions', function (Blueprint $table) {
            $table->unsignedInteger('clerk_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('x_pay_transactions', function (Blueprint $table) {
            $table->unsignedInteger('clerk_id')->nullable();
        });
    }
}
