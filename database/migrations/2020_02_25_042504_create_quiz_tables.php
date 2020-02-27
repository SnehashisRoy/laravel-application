<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id');
            $table->string('question');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quiz_question_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->string('choice');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quiz_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->string('answers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizes');
        Schema::dropIfExists('quiz_questions');
        Schema::dropIfExists('quiz_question_choices');
        Schema::dropIfExists('quiz_question_answers');
    }
}
