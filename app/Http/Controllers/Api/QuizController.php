<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionChoice;

class QuizController extends Controller
{
    public function createQuiz(Request $r){

        $url = time().'-'.mt_rand(1,500).'.jpg';
        $base64_string = preg_replace( '/data:image\/.*;base64,/', '', $r->image);
        $decoded_string= base64_decode($base64_string);

        file_put_contents(public_path().'/uploads/'. $url, $decoded_string);
        $quiz = new Quiz;

        $quiz->title = $r->title;
        $quiz->description = $r->description;
        $quiz->image= 'uploads/'.$url;

        $quiz->save();

        $response = Quiz::with('questions.choices')->find($quiz->id);

        return response()->json(['data' => $response]);



    }

    public function getQuizes(){

        $quizes = Quiz::with('questions.choices')->get();

        return response()->json(['data' => $quizes]);



    }

    public function addQuizQuestion(Request $r){

        $question = new QuizQuestion;

        $question->quiz_id = $r->quiz_id;
        $question->question = $r->question;
        $question->answer = '';
        $question->explanation = $r->explanation;

        $question->save();

        
        foreach ($r->choices as $v) {

            $choice = new QuizQuestionChoice;
            $choice->question_id = $question->id;
            $choice->choice = $v;
            $choice->save();
        }

        $question = QuizQuestion::with('choices')->find($question->id);

        return response()->json(['data' => $question]);

    }

    public function updateAnswer(Request $r){

        $question = QuizQuestion::find($r->question);

        $question->answer = $r->choice;

        $question->save();

        return response()->json(['data' => $question]);


    }

    public function deleteQuestion(Request $r){

         $question = QuizQuestion::find($r->id);

         $question->delete();

         return response()->json(['data' => $question]);



    }
}