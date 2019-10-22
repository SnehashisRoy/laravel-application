<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Parser;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\Models\House;
use App\Helpers\Contracts\GeocodingInterface;


class listingsFromKijiji extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:listings {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $client;


    public function __construct()
    {
        parent::__construct();

        $client= new Client;

        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
        ));
        
        $this->client = $client->setClient($guzzleClient);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle( GeocodingInterface $geo)
    {
        // $valid_urls = [];

        // $url = $this->argument('url');
        
        // $valid_urls[] = $url; 

        
        // for($i=2; $i<3; $i++){

        //     $next_url = str_replace('basement-for-rent/', 'basement-for-rent/page-'.$i.'/', $url);
        //     $valid_urls[] = $next_url;
        
        // }

        // dd($valid_urls);

        // foreach ($valid_urls as $url) {
            
        //      $res = file_get_contents($url);

        //     $arr = Parser::xml($res);

        //     foreach($arr['channel']['item'] as $item){

        //         $details = $this->getDetailFromScraping($item);

        //         $this->insertListing($details, $geo);

        //         unset($details);

        //     };


        // }


        $url = $this->argument('url');

        $res = file_get_contents($url);

        $arr = Parser::xml($res);

        foreach($arr['channel']['item'] as $item){

            $details = $this->getDetailFromScraping($item);

            $this->insertListing($details, $geo);
        }
        

        
    }

    protected function getDetailFromScraping($item){

        $crawler = $this->client->request('GET', $item['link']);

        $details = [];

        $details['link'] = @$item['link'];
        $details['price'] = @$item['g-core:price'];
        $details['date'] = @$item['dc:date'];
        $details['main_image'] = @$item['enclosure']['@url'];
        $details['lat'] = @$item['geo:lat'];
        $details['long'] = @$item['geo:long'];


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


        return $details;

    }

    protected function insertListing($details, $geo){

        $links = House::all()->pluck('kijiji_link')->all();

        if(in_array(@$details['link'], $links)){
            $this->info('already in database');
                return;
        }

        $info = $geo->getInfoFromAddress(@$details['address'], $api=false);

        

        $house = new House;
        $house->title = @$details['title'];
        $house->slug =  @$details['slug'];
        $house->kijiji_link =  @$details['link'];
        $house->address = @$details['address'];
        $house->description = @$details['description'];
        $house->type = 'basement';
        $house->bedrooms = @explode(' ', @$details['Bedrooms (#)'])[0];
        $house->bathrooms = @explode(' ', @$details['Bathrooms (#)'])[0];
        $house->furnished = @$details['Furnished'];
        $house->pet_friendly = @$details['Pet Friendly'];
        $house->parking = null ;
        $house->price = @$details['price'];
        $house->size = @$details['Size (sqft)'];
        $house->image_url = @$details['main_image']; 
        $house->approved = 1;

        $house->city = @$info->city;
        $house->postal = @$info->postal;
        $house->country = @$info->country;
        $house->lattitude = @$details['lat'];
        $house->longitude= @$details['long'];

        $house->save();

        foreach(@$details['image'] as $image){
            $img = new \App\Models\Image;

            $img->house_id = $house->id;
            $img->image_url = $image;

            $img->save();


        }

        $this->info('one listing inserted');
    }
}
