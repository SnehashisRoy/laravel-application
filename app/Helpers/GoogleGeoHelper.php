<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use App\Helpers\Contracts\GeocodingInterface;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\clientException;



class GoogleGeoHelper implements GeocodingInterface
{

	public $lat;

	public $lng;

	public $city;

	public $country;

	public $postal;

	

	public function getInfoFromAddress($address){

		$address = implode('+',explode(' ', $address));

		$client = new Client([
		       'timeout'  => 5,
		]);

		try {
		    $response= $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.env('GOOGLE_MAP'));

		    $json = $response->getBody()->getContents();

			$array = json_decode($json);

		} catch (ClientException $e) {
		    //echo Psr7\str($e->getRequest());
		    //echo Psr7\str($e->getResponse());
		}

		
				 
		

		//dd($array);
		
        $this->lat       = @$array->results[0]->geometry->location->lat;
        $this->lng       = @$array->results[0]->geometry->location->lng;
        $this->city      = @$array->results[0]->address_components[3]->long_name;
        $this->country   = @$array->results[0]->address_components[6]->long_name;
        $this->postal    = @$array->results[0]->address_components[7]->long_name;



        return $this;
	}

	
}