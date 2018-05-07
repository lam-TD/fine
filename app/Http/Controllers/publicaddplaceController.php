<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;





class publicaddplaceController extends Controller
{
    public function getaddplace()
    {
    	$city = $this::loadTinh();
    	return view('VietNamTour.content.addplace', compact('city'));
    }

    //load tinh
    public function loadTinh()
    {
    	$result = DB::select('SELECT * FROM vnt_province_city');
    	return $result;
    }

    //load district theo id tinh thanh pho
    public function loadDistrict($idCity)
    {
    	$result = DB::select("SELECT * FROM vnt_district WHERE province_city_id = '$idCity'");
    	return $result;
    }

    //load ward
    public function loadWard($idDistrict)
    {
    	$result = DB::select("SELECT * FROM vnt_ward WHERE district_id = '$idDistrict' AND enable=1");
    	return $result;
    }
}
