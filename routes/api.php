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
Route::get('listings', 'Api\ListingsController@getListings');
Route::post('listing/create', 'Api\ListingsController@createListing')->middleware('auth:api');
Route::post('listing/{id}', 'Api\ListingsController@updateListingById');

Route::post('listing/upload/{id}', 'Api\ListingsController@uploadImageById');
Route::get('listing/remove-image/{id}', 'Api\ListingsController@removeImageById');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

