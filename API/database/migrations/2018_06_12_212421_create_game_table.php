<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('player_one')->unsigned();
            $table->foreign('player_one')->references('id')->on('sessions')->onDelete('cascade');
            $table->integer('player_two')->unsigned();
            $table->foreign('player_two')->references('id')->on('sessions')->onDelete('cascade');
            $table->text('game_key')->collation('utf8_unicode_ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game');
    }
}
