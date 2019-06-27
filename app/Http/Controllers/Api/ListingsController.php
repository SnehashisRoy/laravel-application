<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\GeocodingInterface;
use App\Models\House;
use App\Models\Image;

class ListingsController extends Controller
{
    public function getListings(){
        //$listings = House::with('images')->where('user_id', \Auth::id())->get();
        $listings = House::with('images')->take(5)->get();

        return  response()->json($listings);
    }

    public function createListing(Request $r, GeocodingInterface $geo){

        $house = new House;

        try {
             $info = $geo->getInfoFromAddress($r->address);
        } catch (\Exception $e) {
            return response()->json(['success'=> false, 'data' => $e->getMessage()]);
        }


        $house->title = $r->title;
        $house->user_id = \Auth::id();
        $house->slug = implode('-', explode(' ', $r->title));
        $house->address = $r->address;
        $house->city = $r->city;
        $house->postal = $r->postal;
        $house->country = 'Canada';
        $house->longitude = $info->lng;
        $house->lattitude = $info->lat;
        $house->status = 2;
        $house->approved = 0;


        $house->save();

        $listing = House::with('images')->find($house->id);

        return  response()->json(['success' => true, 'data' => $listing]);
 

    }

    public function updateListingById($id, Request $r){

        \Log::info($id);


    	$house = House::findOrFail($id);

        if($r->has('title')){
            $house->title = $r->title;
        }
        
        if($r->has('address')){
            $house->address = $r->address;
        }
        
        if($r->has('description')){
            $house->description = $r->description;
        }

        if($r->has('city')){
            $house->city = $r->city;
        }

        if($r->has('postal')){
            $house->postal = $r->postal;
        }

        if($r->has('country')){
            $house->country = $r->country;
        }

        if($r->has('type')){
            $house->type = $r->type;
        }

        if($r->has('bedrooms')){
            $house->bedrooms = $r->bedrooms;
        }

        if($r->has('bathrooms')){
            $house->bathrooms = $r->bathrooms;
        }

        if($r->has('furnished')){
            $house->furnished = $r->furnished;
        }
        if($r->has('pet_friendly')){
            $house->pet_friendly = $r->pet_friendly;
        }
        if($r->has('parking')){
            $house->parking = $r->parking;
        }

        if($r->has('size')){
            $house->size = $r->size;
        }
        if($r->has('price')){
            $house->price = $r->price;
        }


    	

    	$house->save();

        $listing = House::with('images')->find($house->id);

    	return  response()->json($listing);



    }

    public function uploadImageById(Request $r, $id){

                    foreach($r['images'] as $image){

                        $url = time().'-'.mt_rand(1,500).'.jpg';
                        $base64_string = preg_replace( '/data:image\/.*;base64,/', '', $image);
                        $decoded_string= base64_decode($base64_string);

                        file_put_contents(public_path().'/uploads/'. $url, $decoded_string);

                        $image = new Image;

                        $image->house_id = $id;
                        $image->image_url = '/uploads/'.$url;

                        $image->save();

                    }

                        $listing = House::with('images')->find($id);

                        return  response()->json(['success' => true, 'data' => $listing]);



    }

    public function removeImageById($id){

        $image = Image::find($id);

        $image->delete();

        $listing = House::with('images')->find($image->house_id);

        return  response()->json(['success' => true, 'data' => $listing]);

    }
}