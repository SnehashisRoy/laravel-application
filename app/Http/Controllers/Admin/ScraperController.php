<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\GeocodingInterface;
use App\Models\House;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class ScraperController extends Controller
{
    

    protected $client;

    public function __construct(){

        $client= new Client;

        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
        ));
        
        $this->client = $client->setClient($guzzleClient);

    }


    public function getScraperUrl(){

    	return view('admin.scraper.main-url');
    }

    public function postScraperUrl(Request $r){

    	//dd($r->url);

    	//https://www.kijiji.ca/b-real-estate/city-of-toronto/basement/k0c34l1700273

    

	$crawler = $this->client->request('GET', $r->url);

	$links=[];
	
	 $crawler->filter('.title > a ')->each(function ($node) use(&$links) {

     $link =$node->attr('href');
    // dd($link);

     $links[]= $link; 

       });

	return response()->json(['status' => 'ok', 'data' => $links]);


    }

    public function getHouseDetail(Request $r){

        $crawler = $this->client->request('GET', 'https://www.kijiji.ca'.$r->link);

        $details = [];

        $crawler->filter('h1[class^="title-"]')->each(function($node)use(&$details){

            // title of the property
            $details['title'] = $node->text();

            //slug
            $details['slug'] = implode('-',explode(' ', $details['title']));

            



        });

        $crawler->filter('span[class^="address-"]')->each(function($node)use(&$details){

           // address of the property
            $details['address'] = $node->text();

            
        });

        $crawler->filter('div[class^="descriptionContainer-"] > div > p')->each(function($node)use(&$details){

           // description of the property
            $details['description'] = $node->text();

        });

        $nodes = $crawler->filter('dt[class^="attributeLabel-"]')->each(function($node, $i)use(&$details){

           
            $details[$node->text()] = $node->siblings()->text();

        });
        
        $nodes = $crawler->filter('img[class^="heroImageForPrint-"]')->each(function($node)use(&$details){

           // image links
           return $node->attr('src');

        });

        $details['image'] = $nodes;

        return response()->json(['status'=> 'ok', 'data'=> $details]);
    }


    public function postHouseDetail(Request $r, GeocodingInterface $geo){

        $slugs = House::all()->pluck('slug')->all();

        if(in_array($r->input('house.slug'), $slugs)){
            return response()->json(['status' => 'ok', 'message' => 'you already have this item in database']);
        }

        $info = $geo->getInfoFromAddress($r->input('house.address'));

        $house = new House;
        $house->title = $r->input('house.title');
        $house->slug = $r->input('house.slug');
        $house->address = $r->input('house.address');
        $house->description = $r->input('house.descrption');
        $house->type = $r->input('house.type');
        $house->bedrooms = $r->input('house.Bedrooms (#)') ?? null;
        $house->bathrooms = $r->input('house.Bathrooms (#)') ?? null;
        $house->furnished = $r->input('house.Furnished') ?? null;
        $house->pet_friendly = $r->input('house.Pet Friendly')?? null;
        $house->parking = null ;
        $house->size = $r->input('house.Size (sqft)');
        //$house->price = $r->input('house.title');
        $house->image_url = $r->input('house.image')? $r->input('house.image')[0]: null ;
        $house->approved = 1;

        $house->city = $info->city;
        $house->postal = $info->postal;
        $house->country = $info->country;
        $house->lattitude = $info->lat;
        $house->longitude= $info->lng;

        $house->save();

        foreach($r->input('house.image') as $image){
            $img = new \App\Models\Image;

            $img->house_id = $house->id;
            $img->image_url = $image;

            $img->save();


        }






    }
}
