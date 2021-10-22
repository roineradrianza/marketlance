<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->tinyText('comment');
            $table->tinyInteger('rating');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');

            $table->foreign('seller_id')->references('id')->on('users')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users')->nullable();
            $table->foreignId('gig_id')->constrained();
            
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
        Schema::dropIfExists('ratings');
    }
}
