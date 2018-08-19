<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClerkIdToNullableOnXExamTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_exam_transactions', function (Blueprint $table) {
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
        Schema::table('x_exam_transactions', function (Blueprint $table) {
            $table->unsignedInteger('clerk_id')->nullable();
        });
    }
}