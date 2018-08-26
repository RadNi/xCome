<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelatedTransactionColumnToXFeeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_fee_transactions', function (Blueprint $table){
            $table->unsignedInteger('related_transaction');
            $table->foreign('related_transaction')->references('transaction_id')->on('x_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('x_fee_transactions', function (Blueprint $table){
//            $table->dropColumn('related_transaction');
//        });
    }
}
