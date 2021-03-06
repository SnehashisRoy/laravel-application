<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\BlogCategory;


class ListViewController extends Controller
{
    public function listView(){
    	
    	$houses = House::orderBy('created_at', 'desc')->paginate(10);

    	return view('list-view.list-view', [

    		'houses' => $houses, 
            'city' => 'Toronto',
            'list_by_city' => false

    	]);
    }

    public function listViewByCity($city){

        $houses = House::where('city', 'like', $city)
                         ->orderBy('created_at', 'desc')->paginate(10);

        if($houses->count() < 1){
            redirect('list-view');
        }

        return view('list-view.list-view', [

            'houses' => $houses,
            'city' => $city,
            'list_by_city' => true

        ]);



    }

    public function cities(){
        return view('list-view.cities');
    }

    public function getCities(){
        $cities = House::select('city')->distinct()->whereNotNull('city')->orderBy('city')->get();

        return  response()->json($cities);
    }

    public function postListView(Request $r){

        $this->validate($r,[

            'postal' => 'required'
        
        ]);

        $postal = trim(substr($r->postal, 0, 3));

        $houses = House::where('postal', 'like', $postal.'%')
                        ->orderBy('created_at', 'desc')->paginate(10);

        return view('list-view.list-view', [

            'houses' => $houses,
            'city' => 'Toronto',
            'list_by_city' => false

        ]);

    }

    public function getListing($id){

    	$house = House::find($id);


        if(!$house){

            return redirect('list-view');
        }

        $house->views +=1;

        $house->save();

        // get the house blogs

        $cat = BlogCategory::where('category', '!=', 'uncategorized')->findOrFail(14);

            if($cat){
                $blogs = $cat->blogs;
            }

    	return view('list-view.listing', [

    		'house' => $house,
            'blogs' => $blogs

    	]);



    }
}
