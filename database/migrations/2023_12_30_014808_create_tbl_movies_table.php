<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->unsignedBigInteger('home_cat_id')->nullable();
            $table->unsignedBigInteger('director_id')->nullable();
            $table->string('movie_title');
            $table->string('movie_subtitle');
            $table->string('movie_type')->nullable();
            $table->integer('movie_price')->default(0);
            $table->string('release_date');
            $table->string('vedio_type')->nullable();
            $table->string('movie_url')->nullable();
            $table->string('poster_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('movie_description')->nullable();
            $table->integer('total_views')->default(0);
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('language_id')->references('id')->on('tbl_language')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('tbl_genres')->onDelete('cascade');
            $table->foreign('home_cat_id')->references('id')->on('tbl_home')->onDelete('cascade');
            $table->foreign('director_id')->references('id')->on('tbl_directors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_movies');
    }
}