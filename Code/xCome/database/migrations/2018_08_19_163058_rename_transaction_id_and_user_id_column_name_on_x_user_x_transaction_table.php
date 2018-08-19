<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTransactionIdAndUserIdColumnNameOnXUserXTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("x_user_x_transaction", function (Blueprint $table) {
            $table->renameColumn('user_id', 'x_user_id');
            $table->renameColumn('transaction_id', 'x_transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("x_user_x_transaction", function (Blueprint $table) {
            $table->renameColumn('x_user_id', 'user_id');
            $table->renameColumn('x_transaction_id', 'transaction_id');
        });
    }
}
