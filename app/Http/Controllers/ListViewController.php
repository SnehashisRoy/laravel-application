<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use \Torann\GeoIP\Facades\GeoIP;

class ListViewController extends Controller
{
    public function listView(){


        $location =geoip($_SERVER['REMOTE_ADDR']);

    	$houses = House::where('city', 'like', $location->city)
                       ->orderBy('created_at', 'desc')->paginate(10);
       
        if(!count($houses)){
            return redirect('/map-view');
        }


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
