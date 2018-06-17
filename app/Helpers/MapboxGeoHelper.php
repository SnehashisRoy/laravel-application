<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use App\Helpers\Contracts\GeocodingInterface;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\clientException;



class MapboxGeoHelper implements GeocodingInterface
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
		    $response= $client->request('GET', 'https://api.mapbox.com/geocoding/v5/mapbox.places/'.$address.'.json?access_token='. env('MAP_BOX'));

		    $json = $response->getBody()->getContents();

			$array = json_decode($json);

		} catch (ClientException $e) {
		    //echo Psr7\str($e->getRequest());
		    //echo Psr7\str($e->getResponse());
		}

		if($array->features[0]->context){

			foreach($array->features[0]->context as $context){
					if(explode('.',$context->id)[0] == 'postcode'){
						$this->postal = $context->text;
					}elseif (explode('.',$context->id)[0] == 'place') {
						$this->city = $context->text;
					}elseif (explode('.',$context->id)[0] == 'country') {
						$this->country = $context->text;
					};
				};
			

		}
				 
		
        $this->lat       = $array->features[0]->geometry->coordinates[1];
        $this->lng       = $array->features[0]->geometry->coordinates[0];
        



        return $this;
	}

	
}