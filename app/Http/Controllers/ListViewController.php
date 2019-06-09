<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use \Torann\GeoIP\Facades\GeoIP;

class ListViewController extends Controller
{
    public function listView(){


     //    $location =geoip($_SERVER['REMOTE_ADDR']);

     //    dd($location);

    	// $houses = House::where('city', $location->city)
     //                   ->orderBy('created_at', 'desc')->paginate(10);

        $houses = House::orderBy('created_at', 'desc')->paginate(10);


    	return view('list-view.list-view', [

    		'houses' => $houses

    	]);
    }

    public function getListing($id){

    	$house = House::findOrFail($id);

    	return view('list-view.listing', [

    		'house' => $house

    	]);



    }
}
