<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestiongAnswer extends Model
{
    use SoftDeletes;

    protected $table = 'quiz_question_answers';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


}