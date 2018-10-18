<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_movie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actor_id')->unsigned();
            $table->integer('movie_id')->unsigned();

            $table->timestamps();

            ///Relaciones

            $table->foreign('actor_id')->references('id')->on('actors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_movie');
    }
}
