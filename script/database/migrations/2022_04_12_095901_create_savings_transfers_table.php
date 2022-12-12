<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSavingsTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('receiver_id');
            $table->decimal('amount', 12);
            $table->string('tx_id');
            $table->enum('status', ['rolled_back', 'pending', 'transfered']);
            $table->string('reason')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER table savings_transfers ADD CONSTRAINT check_user_receiver CHECK (`user_id` != `receiver_id`)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savings_transfers');
    }
}
