<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnConditionToXTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('x_transactions', function (Blueprint $table) {
            $table->enum('condition', ['accept', 'reject', 'pending'])->default('pending');
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
            $table->dropColumn('condition');
        });
    }
}
