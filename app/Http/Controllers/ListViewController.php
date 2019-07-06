<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

class ListViewController extends Controller
{
    public function listView(){
    	
    	$houses = House::orderBy('created_at', 'desc')->paginate(10);

    	return view('list-view.list-view', [

    		'houses' => $houses

    	]);
    }

    public function postListView(Request $r){

        $this->validate($r,[

            'postal' => 'required'
        
        ]);

        $postal = trim(substr($r->postal, 0, 3));

        $houses = House::where('postal', 'like', $postal.'%')
                        ->orderBy('created_at', 'desc')->paginate(10);

        return view('list-view.list-view', [

            'houses' => $houses

        ]);

    }

    public function getListing($id){

    	$house = House::find($id);

        if(!$house){

            return redirect('list-view');
        }

        $house->views +=1;

        $house->save();

    	return view('list-view.listing', [

    		'house' => $house

    	]);



    }
}
