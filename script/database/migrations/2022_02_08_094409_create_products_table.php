<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("seller_id");
            $table->string("name");
            $table->decimal("price", 10, 2);
            $table->text("description");
            $table->boolean("available")->default(1);
            $table->integer("quantity");
            $table->string("color")->nullable();
            $table->decimal("weight", 5, 2)->nullable();
            $table->string("units")->nullable(); //Kgs/Gms/Ounce/Tonnes
            $table->string("image")->default('uploads/default.png');
            $table->timestamps();
            $table->foreign('seller_id', 'fk_product_seller_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
