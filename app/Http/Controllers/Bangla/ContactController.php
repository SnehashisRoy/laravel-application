<?php

namespace App\Http\Controllers\Bangla;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class ContactController extends Controller
{
    public function show(){

        $message = null;

        if(isset($_GET['id'])){
        $message = 'Please remove the add with the id of '. $_GET['id'];

             }


    	return view('bangla.contact-us', ['text' =>  $message ]);
    }

    public function postContact(Request $r){

    	$this->validate($r , [
    		'name' => 'required',
    		'email' => 'required',
    		'phone' => 'required',
    		'info' => 'required',
    	]);

    	$client = new Client();


    	$response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
    	    'form_params' => [
    	        'secret' => '6Lc0950UAAAAALEa2PoXf10P0c3xRPw7Wl0LfXbG',
    	        'response' => $r->input('g-recaptcha-response')
    	    ]
    	]);

    	$response = json_decode($response->getBody());

    	if(!$response->success){

    		return redirect()->back()->with('status', 'hello! spammer.');

    	}

    	\Mail::raw('Message:'.$r->info.'<br> Name:'. $r->name. '<br> email:'. $r->email. '<br> phone:'. $r->phone , function ($message) {
   				  $message->to('snehashis.roy.bd@gmail.com')
  				    ->subject('Message From BanglaToronto');
  				});

  		return redirect()->back()->with('status', 'Your message has been sent.');

    	



    }
}
