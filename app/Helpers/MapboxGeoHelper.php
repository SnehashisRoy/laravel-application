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

	

	public function getInfoFromAddress($address, $api = true ){

		$address = implode('+',explode(' ', $address));

		$client = new Client([
		       'timeout'  => 1,
		]);


		try {
		    $response= $client->request('GET', 'https://api.mapbox.com/geocoding/v5/mapbox.places/'.$address.'.json?access_token='. env('MAP_BOX'));

		    $json = $response->getBody()->getContents();

			$array = json_decode($json);

			if($api){

				if(!$array->features){
				throw new \Exception("Invalid address! Please check the address and try it again");
				
				}

			}
            
			

		} catch (ClientException $e) {

			if($api){
				throw new \Exception('your request could not be processed. Try again later');

			}


			//return response()->json($e->getMessage());
		    //echo Psr7\str($e->getRequest());
		    //echo Psr7\str($e->getResponse());
		}

		
		if(@$array->features[0]->context){

			foreach(@$array->features[0]->context as $context){
					if(explode('.',$context->id)[0] == 'postcode'){
						$this->postal = $context->text;
					}elseif (explode('.',$context->id)[0] == 'place') {
						$this->city = $context->text;
					}elseif (explode('.',$context->id)[0] == 'country') {
						$this->country = $context->text;
					};
				};
			

		}
				 
		
        $this->lat       = @$array->features[0]->geometry->coordinates[1];
        $this->lng       = @$array->features[0]->geometry->coordinates[0];
        



        return $this;
	}

	
}