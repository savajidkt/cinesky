<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEpisodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_episode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->unsignedBigInteger('season_id')->nullable();
            $table->string('episode_title');
            $table->string('episode_type')->nullable();
            $table->string('episode_url')->nullable();
            $table->string('poster_image')->nullable();
            $table->string('episode_description')->nullable();
            $table->integer('total_views')->default(0);
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('series_id')->references('id')->on('tbl_series')->onDelete('cascade');
            $table->foreign('season_id')->references('id')->on('tbl_season')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_episode');
    }
}
