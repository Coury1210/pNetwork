<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSavingsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('min_savings_amount', 12);
            $table->decimal('max_savings_amount', 12);
            $table->decimal('annual_rate', 4);
            $table->integer('duration');
            $table->enum('interval', ['days', 'months', 'years']);
            $table->enum('status', ['active', 'inactive']);
        });
        DB::statement("ALTER TABLE savings_products ADD CONSTRAINT chk_min_max CHECK (max_savings_amount > min_savings_amount);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savings_products');
    }
}
