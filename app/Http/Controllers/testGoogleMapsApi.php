<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testGoogleMapsApi extends Controller
{
	public function FunctionName()
	{
		$response = \GoogleMaps::load('placeadd')
                ->setParam([
                   'location' => [
                        'lat'  => -33.8669710,
                        'lng'  => 151.1958750
                      ],
                   'accuracy'           => 0,
                   "name"               =>  "Google Shoes!",
                   "address"            => "48 Pirrama Road, Pyrmont, NSW 2009, Australia",
                   "types"              => ["shoe_store"],
                   "website"            => "http://www.google.com.au/",
                   "language"           => "en-AU",
                   "phone_number"       =>  "(02) 9374 4000"                       
                          ])
                  ->get();	
        return $response;
	}
    
}
