<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tx_ref');
            $table->string('flw_ref');
            $table->decimal('amount', 12);
            $table->string('currency');
            $table->decimal('charged_amount', 12);
            $table->decimal('app_fee');
            $table->decimal('merchant_fee', 12);
            $table->string('narration');
            $table->string('status');
            $table->string('payment_type');
            $table->string('ip');
            $table->integer('account_id');
            $table->decimal('amount_settled');
            $table->string('created_at');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'fk_trans_cutomer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
