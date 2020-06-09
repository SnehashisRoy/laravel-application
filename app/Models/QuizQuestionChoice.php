<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionChoice extends Model
{
    use SoftDeletes;

    protected $appends = ['is_correct'];

    protected $table = 'quiz_question_choices';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function question(){

    		return $this->belongsTo('App\Models\QuizQuestion', 'question_id');

    }

    public function getIsCorrectAttribute(){

    	return $this->question->answer == $this->id ;

    }

    	

    


}