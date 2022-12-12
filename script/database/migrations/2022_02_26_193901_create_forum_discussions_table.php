<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_discussions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forum_id');
            $table->string('topic');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('forum_id', 'fk_forum_discussion')->references('id')->on('forums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_discussions');
    }
}
