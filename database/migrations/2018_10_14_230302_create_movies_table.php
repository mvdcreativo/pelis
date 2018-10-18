<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_origin')->nullable();
            $table->mediumText('description');
            $table->integer('ano');
            $table->string('duration')->nullable();
            $table->string('image');
            $table->string('rating')->nullable();
            $table->string('url_origin')->nullable();
            $table->string('url_dwl')->nullable();
            $table->integer('state');

            $table->integer('director_id')->unsigned();

            $table->timestamps();

            //RELACIONES

            $table->foreign('director_id')->references('id')->on('directors')
                ->inDelete('cascade')
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
        Schema::dropIfExists('movies');
    }
}