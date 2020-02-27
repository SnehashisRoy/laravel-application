<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionChoice extends Model
{
    use SoftDeletes;

    protected $table = 'quiz_question_choices';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    


}