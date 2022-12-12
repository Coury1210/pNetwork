<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsVaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings_vaults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 12);
            $table->unsignedBigInteger('savings_product_id');
            $table->enum('status', ['withdrawn', 'active'])->default('active');
            $table->timestamps();
            $table->foreign('user_id', 'fk_vault_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('savings_product_id', 'fk_vault_product_id')->references('id')->on('savings_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savings_vaults');
    }
}
