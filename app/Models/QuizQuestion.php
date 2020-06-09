<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\QuizQuestionChoice;
use App\Models\QuizQuestionAnswer;

class QuizQuestion extends Model
{
    use SoftDeletes;

    protected $table = 'quiz_questions';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function choices(){
        return $this->hasMany('App\Models\QuizQuestionChoice', 'question_id');
    }



}