<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AltersForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_forum_categories')->references('id')->on('forum_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->dropForeign('fk_forum_categories');
        });
    }
}
