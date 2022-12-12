<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_opinions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discussion_id');
            $table->unsignedBigInteger('user_id');
            $table->text('message');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->foreign('discussion_id', 'fk_forum_discussion_opinion')->references('id')->on('forum_discussions')->onDelete('cascade');
            $table->foreign('user_id', 'fk_discussion_opinion_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussion_opinions');
    }
}
