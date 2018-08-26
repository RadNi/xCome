<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_exams', function (Blueprint $table) {
            $table->increments('exam_id');
            $table->dateTime('exam_date');
            $table->enum('pay_type', ['euro', 'dollar', 'rial']);
            $table->string('fee', 20);
            $table->string('price', 20);
            $table->string('name', 20);
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
        Schema::dropIfExists('x_exams');
    }
}
