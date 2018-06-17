<?php
namespace App\Helpers\Contracts;

interface GeocodingInterface
{
	public function getInfoFromAddress($address);
	
}