<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPayTypeColumnToXExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_exams', function (Blueprint $table) {
            $table->enum('pay_type', ['euro', 'dollar', 'rial']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('x_exams', function (Blueprint $table) {
            $table->dropColumn('pay_type');
        });

    }
}
