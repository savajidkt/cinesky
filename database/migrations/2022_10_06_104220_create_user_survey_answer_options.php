<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSurveyAnswerOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_survey_answer_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_survey_answer_id');
            $table->unsignedBigInteger('question_option_id')->nullable();
            $table->timestamps();

            $table->foreign('user_survey_answer_id')->references('id')->on('user_survey_answers')->onDelete('cascade');
            $table->foreign('question_option_id')->references('id')->on('question_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_survey_answer_options');
    }
}
