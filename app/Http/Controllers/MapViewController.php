<?php

namespace App\Http\Controllers;

use App\Models\House;

use Illuminate\Http\Request;

class MapViewController extends Controller
{
    public function mapView(){

    	$houses = House::with('images')->get();

    	$geo = [];

    	foreach($houses as $house){
    		$geo[]= [

    			'type'       => 'Feature',
    			'properties' =>  [
    				'type' => $house->type,
    				'address' =>  $house->address,
    				'popupContent' =>    'this is description' //$house->description

    			], 
    			'geometry'   => [
    				'type' => 'Point',
    				'coordinates' => [

    					$house->longitude,
    					$house->lattitude
    				]

    			]


    		];
    	}

    	



    	return view('map-view.map-view', [

    		'geo' => $geo

    	]);
    }

    public function filter(Request $r){


        $houses = House::with('images');

        if($r->has('filters.minPrice')){

            $houses = $houses->where('price' ,'>' , $r->input('filters.minPrice'));
        }

        
        if($r->has('filters.maxPrice')){

            $houses = $houses->where('price' ,'>' , $r->input('filters.maxPrice'));
        }

        if($r->has('filters.bed')){

            $houses = $houses->where('bedrooms' ,'=' , $r->input('filters.bed'));
        }

        if($r->has('filters.bath')){

            $houses = $houses->where('bathrooms' ,'=' , $r->input('filters.bath'));
        }



        $geo = [];

        foreach($houses->get() as $house){
            $geo[]= [

                'type'       => 'Feature',
                'properties' =>  [
                    'type' => $house->type,
                    'address' =>  $house->address,
                    'popupContent' =>    'this is description' //$house->description

                ], 
                'geometry'   => [
                    'type' => 'Point',
                    'coordinates' => [

                        $house->longitude,
                        $house->lattitude
                    ]

                ]


            ];
        }

        return response()->json([

            'status' => 'ok',
            'geoJson' => $geo

        ]);

              

    }


}