<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\QuizQuestion;

class Quiz extends Model
{
    use SoftDeletes;

    protected $table = 'quizes';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function questions(){
        return $this->hasMany('App\Models\QuizQuestion', 'quiz_id');
    }


}