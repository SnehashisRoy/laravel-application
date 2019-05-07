<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthenticationController extends Controller
{
    public function getLogin(){
    	return view('admin.login');
    }

    public function postLogin(Request $r){


    	$credentials = $r->only('email', 'password');

    	$rules = ['email' => 'required|email', 'password' => 'required'];
    	
    	$this->validate($r,$rules);

    	        if (Auth::attempt($credentials)) {
    	            // Authentication passed...
    	            return redirect()->intended('admin/dashboard');
    	        }

    }



    
}