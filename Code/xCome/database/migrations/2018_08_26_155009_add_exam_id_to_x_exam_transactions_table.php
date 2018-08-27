<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExamIdToXExamTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_exam_transactions', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');
            $table->foreign('exam_id')->references('exam_id')->on('x_exams')->onDelete('cascade');
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
            $table->dropColumn('exam_id');
        });
    }
}
