<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('sign-up', 'Api\AuthController@signUp');


Route::group(['middleware' => ['auth:api']], function () {

	Route::get('listings', 'Api\ListingsController@getListings');
	Route::post('listing/create', 'Api\ListingsController@createListing');
	Route::post('listing/edit/{id}', 'Api\ListingsController@updateListingById');
	Route::get('listing/delete/{id}', 'Api\ListingsController@deleteListingById');

	Route::post('listing/upload/{id}', 'Api\ListingsController@uploadImageById');
	Route::get('listing/remove-image/{id}', 'Api\ListingsController@removeImageById');

	// quiz

	Route::post('create-quiz', 'Api\QuizController@createQuiz');
	Route::get('get-quizes', 'Api\QuizController@getQuizes');
	Route::post('add-quiz-question', 'Api\QuizController@addQuizQuestion');
	Route::post('update-answer', 'Api\QuizController@updateAnswer');
	Route::post('delete-question', 'Api\QuizController@deleteQuestion');

});

