<?php

namespace App\Http\Controllers;

use App\Models\House;

use Carbon\Carbon;

use Illuminate\Http\Request;

class MapViewController extends Controller
{
    public function mapView(){


        $current = Carbon::now();

    	$houses = House::with('images')->where('created_at', '>', $current->subDays(7))->get();

    	$geo = [];

    	foreach($houses as $house){
    		$geo[]= [

    			'type'       => 'Feature',
    			'properties' =>  [
    				'type' => $house->type,
    				'address' =>  $house->address,
    				'popupContent' => $house->address,
                    'title' => $house->title,
                    'description' => $house->description,
                    'listing_url' => $house->listing_url,
                    'kijiji_publish_date' => $house->kijiji_publish_date,
                    'bedrooms' => $house->bedrooms,
                    'bathrooms' => $house->bathrooms,
                    'furnished' => $house->furnished,
                    'pet_friendly' => $house->pet_friendly,
                    'parking' => $house->parking,
                    'size' => $house->size,
                    'price' => $house->price,
                    'image_url' => $house->image_url ? $house->image_url : 'http://banglatoronto.ca/images/rent_house.jpg',



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

        $location = geoip($_SERVER['REMOTE_ADDR']);

    	return view('map-view.map-view', [

    		'geo' => $geo,
            'userLocation' => ['lat' => $location->lat, 'lon' => $location->lon]

    	]);
    }

    public function filter(Request $r){


        $houses = House::with('images');

        if($r->has('filters.minPrice')){

            $houses = $houses->where('price' ,'>' , (int)$r->input('filters.minPrice'));
        }

        
        if($r->has('filters.maxPrice')){

            $houses = $houses->where('price' ,'<' , (int)$r->input('filters.maxPrice'));
        }

        if($r->has('filters.bed')){

            $houses = $houses->where('bedrooms' ,'like' , $r->input('filters.bed'));
        }

        if($r->has('filters.bath')){

            $houses = $houses->where('bathrooms' ,'like' , $r->input('filters.bath'));
        }



        $geo = [];

        foreach($houses->get() as $house){
            $geo[]= [

                'type'       => 'Feature',
                'properties' =>  [
                    'type' => $house->type,
                    'address' =>  $house->address,
                    'popupContent' => $house->address,
                    'title' => $house->title,
                    'description' => $house->description,
                    'kijiji_link' => $house->kijiji_link,
                    'kijiji_publish_date' => $house->kijiji_publish_date,
                    'bedrooms' => $house->bedrooms,
                    'bathrooms' => $house->bathrooms,
                    'furnished' => $house->furnished,
                    'pet_friendly' => $house->pet_friendly,
                    'parking' => $house->parking,
                    'size' => $house->size,
                    'price' => $house->price,
                    'image_url' => $house->image_url,
                    

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
