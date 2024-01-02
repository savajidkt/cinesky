<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTvEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tv_episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tvshow_id')->nullable();
            $table->string('episode_title');
            $table->string('episode_type')->nullable();
            $table->string('episode_url')->nullable();
            $table->string('poster_image')->nullable();
            $table->string('episode_description')->nullable();
            $table->integer('total_views')->default(0);
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tvshow_id')->references('id')->on('tbl_tvshows')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tv_episodes');
    }
}
