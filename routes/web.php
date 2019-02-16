
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/kijiji/main-url','Admin\ScraperController@getScraperUrl');

// Route::post('/kijiji/main-url', 'Admin\ScraperController@insertListings');


Route::get('/scraper/main-url', 'Admin\ScraperController@getScraperUrl');
Route::get('/scraper/detail', 'Admin\ScraperController@getHouseDetail');
Route::post('/scraper/main-url', 'Admin\ScraperController@postScraperUrl');
Route::post('/scraper/create-house', 'Admin\ScraperController@postHouseDetail');

Route::get('map-view', 'MapViewController@mapView');
Route::get('list-view', 'ListViewController@listView');
Route::get('listing/{id}', 'ListViewController@getListing');
Route::post('filter', 'MapViewController@filter');


Route::get('/scraper', function(){
	$client= new Goutte\Client;

    $guzzleClient = new GuzzleClient(array(
        'timeout' => 60,
    ));
    
    $client->setClient($guzzleClient);

	$crawler = $client->request('GET', 'https://www.kijiji.ca/b-real-estate/city-of-toronto/basement/k0c34l1700273');

	
	 $crawler->filter('.title > a ')->each(function ($node) use($client) {

     $link =$node->attr('href');

     //dd($link);

     //var_dump($link);

     $crawler = $client->request('GET', $link);

     $crawler->filter('h1[class^="title-"]')->each(function($node){

     	// title of the property
         $title = $node->text();

         //var_dump($title);

         //slug
         $slug = implode('-',explode(' ', $title ));

         



     });

     $crawler->filter('span[class^="address-"]')->each(function($node){

        // address of the property
         $address = $node->text();

         var_dump($address);

         $geo = new \App\Helpers\GeoHelper;

         $address = $geo->getInfoFromAddress($address);

         // latitude 
         $address->lat;

         $address->lng;
         $address->city;
         $address->country;
         $address->postal;

     });

     $crawler->filter('div[class^="descriptionContainer-"] > div > p')->each(function($node){

        // description of the property
         $node->text();

     });

     $nodes = $crawler->filter('dl[class^="itemAttribute-"]')->children();
     
     $node = $nodes->eq(0);


     if($node->text() == "Bedrooms (#)"){
       // var_dump($nodes->eq(1)->text());

     }elseif($node->text() == "Bathrooms (#)"){
       // var_dump($nodes->eq(1)->text());

     }elseif($node->text() == "Furnished"){
        //var_dump($nodes->eq(1)->text());

     }elseif($node->text() == "Pet Friendly"){
       // var_dump($nodes->eq(1)->text());

     }elseif($node->text() == "Size (sqft)"){
        //var_dump($nodes->eq(1)->text());

     }
     ;

     $nodes = $crawler->filter('div[class^="heroImageBackground-"]')->each(function($node){

        // description of the property
         var_dump(explode( '"', $node->attr('style'))[1]);

     });
    dd();
     
});


     
});


Route::get('/geocode', function(){


    $geo = new \App\Helpers\GeoHelper;

    dd($geo->getInfoFromAddress('108 Goodwood Park Court'));

    // $json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=108+GoodwoodPark+Court&key='.env('GOOGLE_MAP'));

    // $array = json_decode($json);

    // $coordinate = $array->results[0]->geometry->location;

    // return $array->results;


});

Route::get('kijiji', function(){

    $res = file_get_contents('https://www.kijiji.ca/rss-srp-real-estate/city-of-toronto/basement-for-rent/k0c34l1700273');

    $arr = Parser::xml($res);

    dd($arr);

    // $xml = new SimpleXMLElement($res);

    // foreach($xml->channel->item as $item){

    // };

    // foreach($xml->channel as $value){

    //     dd($value);
        
    // };

    // $client = new GuzzleHttp\Client(['base_uri' => 'https://www.kijiji.ca/']);        
    
    // $res = $client->request('GET', 'rss-srp-real-estate/city-of-toronto/basement-for-rent/k0c34l1700273');

    // dd($res->getBody());




});

