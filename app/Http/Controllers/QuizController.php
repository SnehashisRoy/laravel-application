<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizController extends Controller
{

	public function getQuiz($id){

		$quiz = Quiz::with('questions.choices')->find($id);

		return view('quiz.quiz', [
			'id' => $id,
			'quiz' => $quiz
		]);
	}

}