<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGigChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_chats', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->boolean('seen')->default(0);
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('buyer_id');

            $table->foreignId('gig_id')->constrained();

            $table->foreign('sender_id')->references('id')->on('users')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gig_chats');
    }
}
