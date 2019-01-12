<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function signUp(Request $r, User $user){

        \Log::info($r);

    	// for sign up, as we are not using auth:api middleware, we will have to manually ensure it's an ajax call with request with XMLHttpRequest 
    	// otherwise, error response will not be json .
    	$r->headers->set('X-Requested-With', 'XMLHttpRequest');


    	$this->validate($r, [
    		'name' => 'required',
    		'email' => 'required|unique:users|email', // check unique name in user database;
    		'password1' => 'required',
    	]);

    	$user->name = $r->name;
    	$user->email = $r->email;
    	$user->password = Hash::make($r->password1);

    	$user->save();


    	return  response()->json(['success' => true, 'user' => $user]);


    }
}
