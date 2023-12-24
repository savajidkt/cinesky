<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldsToUserSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_surveys', function (Blueprint $table) {
            //
            // $table->dropColumn('questions_attempted');
            // $table->dropColumn('correct_answers');
            // $table->dropColumn('incorrect_answers');
            // $table->dropColumn('progress');
            // $table->dropColumn('survey_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_surveys', function (Blueprint $table) {
            //
        });
    }
}
