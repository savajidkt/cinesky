<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('questions_attempted')->nullable();
            $table->string('correct_answers')->nullable();
            $table->string('incorrect_answers')->nullable();
            $table->integer('progress')->nullable();
            $table->integer('survey_time')->default(0);
            $table->tinyInteger('status')->default(3)->comment('1=Completed, 2=Inprograss, 3=Pending');
            $table->integer('auto_stop')->default(0)->comment('0=No, 1=Yes');;
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_surveys');
    }
}
