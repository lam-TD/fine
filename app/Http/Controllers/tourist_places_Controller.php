<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristPlacesModel;
use App\servicesModel;
use App\imagesModel;
use App\eatingModel;
use App\sightseeingModel;
use App\transportModel;
use App\hotelsModel;
use Illuminate\Support\Facades\DB;

class tourist_places_controller extends Controller
{


	//function get id last insert places - ĐÃ TEST
	function GetIDLastPlace()
	{
		$lastPlaces = DB::table('vnt_tourist_places')->orderBy('id', 'desc')->first();
        $convert = (array)$lastPlaces;
        $id_place = $convert['id'];
        return $id_place;		
	}

    public function AddPlace(Request $request)
	{

        $name_place = $request->input('pl_name');
        $pl_details = $request->input('pl_details');
        $pl_address = $request->input('pl_address');
        $pl_phone_number = $request->input('pl_phone_number');
        $pl_latitude = $request->input('pl_latitude');
        $pl_longitude   = $request->input('pl_longitude');
        $pl_ward = $request->input('id_ward');
        $part_user = $request->input('partner_user');
        $tour_guide = $request->input('tourguide_user');
        $user_id = 0;
        if($part_user!=null || $tour_guide != null){
            if($part_user==null){
                $user_id = $tour_guide;
                $place                  = new touristPlacesModel;
                $place->pl_name         = $name_place;
                $place->pl_details      = $pl_details;
                $place->pl_address      = $pl_address;
                $place->pl_phone_number = $pl_phone_number;
                $place->pl_latitude     = $pl_latitude;
                $place->pl_longitude    = $pl_longitude;
                $place->id_ward    = $pl_ward;
                $place->pl_status       = 0;
                $place->user_tour_guide_id   =$user_id;
                $place->save();
                $id_place = $this::GetIDLastPlace();
                return json_encode("id_place:".$id_place);
            }
            else
            {
                $user_id = $part_user;
                $place                  = new touristPlacesModel;
                $place->pl_name         = $name_place;
                $place->pl_details      = $pl_details;
                $place->pl_address      = $pl_address;
                $place->pl_phone_number = $pl_phone_number;
                $place->pl_latitude     = $pl_latitude;
                $place->pl_longitude    = $pl_longitude;
                $place->id_ward    = $pl_ward;
                $place->pl_status       = 0;
                $place->user_partner_id = $user_id;
                $place->save();
                $id_place = $this::GetIDLastPlace();
                return json_encode("id_place:".$id_place);
            }
        }
        return json_encode("status: 500");
	}
    public function AddServices(Request $request, $id_place)
    {
        $part_user = $request->input('partner_user');
        $tour_guide = $request->input('tourguide_user');
        $user_id = 0;
        $eat_name = $request->input('eat_name');
        $hotel_name = $request->input('hotel_name');
        $transport_name =    $request->input('transport_name');
        $sightseeing_name = $request->input('sightseeing_name');
        $entertainments_name =  $request->input('entertainments_name');

        if($part_user!=null || $tour_guide != null){
            if($part_user==null){
                $user_id = $tour_guide;
                $vnt_services                 = new servicesModel;
                $vnt_services->sv_description   = $request->input('sv_description');
                $vnt_services->sv_open    = $request->input('sv_open');
                $vnt_services->sv_close  = $request->input('sv_close');
                $vnt_services->sv_highest_price  = $request->input('sv_highest_price');
                $vnt_services->sv_lowest_price = $request->input('sv_lowest_price');
                $vnt_services->sv_phone_number   = $request->input('sv_phone_number');
                $vnt_services->sv_status   = 0;
                $vnt_services->sv_types   = $request->input('sv_types');
                $vnt_services->tourist_places_id   =$id_place;
                $vnt_services->sv_counter_view=0;
                $vnt_services->sv_counter_point=0;
                $vnt_services->user_tour_guide_id=$user_id;
                $vnt_services->sv_website=$request->input('sv_website');
                $vnt_services->save();
                $lastServices = DB::table('vnt_services')->orderBy('id', 'desc')->first();
                $convert = (array)$lastServices;
                $id_service =  $convert['id'];
                $id_type =  $convert['sv_types'];
                if($id_type == 1)
                {
                    $vnt_eating = new eatingModel;
                    $vnt_eating->eat_name =  $eat_name;
                    $vnt_eating->eat_status =  1;
                    $vnt_eating->service_id =  $id_service;
                    if($vnt_eating->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }

                }
                else if($id_type == 2)
                {
                    $vnt_hotels = new hotelsModel;
                    $vnt_hotels->hotel_name =  $hotel_name;
                    $vnt_hotels->hotel_website =  $request->input('hotel_website');
                    $vnt_hotels->hotel_number_star =  $request->input('hotel_number_star');
                    $vnt_hotels->hotel_status =  1;
                    $vnt_hotels->service_id =  $id_service;
                    if($vnt_hotels->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
                else if($id_type == 3)
                {
                    $vnt_transport = new transportModel;
                    $vnt_transport->transport_name =  $transport_name;
                    $vnt_transport->transport_status =  1;
                    $vnt_transport->service_id =  $id_service;
                    if($vnt_transport->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
                else if($id_type == 4)
                {
                    $vnt_sightseeing = new sightseeingModel;
                    $vnt_sightseeing->sightseeing_name =  $sightseeing_name;
                    $vnt_sightseeing->sightseeing_status     =  1;
                    $vnt_sightseeing->service_id =  $id_service;
                    if($vnt_sightseeing->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
                else if($id_type == 5)
                {
                    $vnt_entertainments = new sightseeingModel;
                    $vnt_entertainments-> $entertainments_name;
                    $vnt_entertainments->entertainments_status       = 1;
                    $vnt_entertainments->service_id =  $id_service;
                    if($vnt_entertainments->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
            }

            else{
                $user_id = $part_user;
                $vnt_services                 = new servicesModel;
                $vnt_services->sv_description   = $request->input('sv_description');
                $vnt_services->sv_open    = $request->input('sv_open');
                $vnt_services->sv_close  = $request->input('sv_close');
                $vnt_services->sv_highest_price  = $request->input('sv_highest_price');
                $vnt_services->sv_lowest_price = $request->input('sv_lowest_price');
                $vnt_services->sv_phone_number   = $request->input('sv_phone_number');
                $vnt_services->sv_status   = 0;
                $vnt_services->sv_types   = $request->input('sv_types');
                $vnt_services->tourist_places_id   =$id_place;
                $vnt_services->sv_counter_view=0;
                $vnt_services->sv_counter_point=0;
                $vnt_services->user_tour_guide_id=$user_id;
                $vnt_services->sv_website=$request->input('sv_website');
                $vnt_services->save();
                $lastServices = DB::table('vnt_services')->orderBy('id', 'desc')->first();
                $convert = (array)$lastServices;
                $id_service =  $convert['id'];
                $id_type =  $convert['sv_types'];

                if($id_type == 1)
                {
                    $vnt_eating = new eatingModel;
                    $vnt_eating->eat_name =  $eat_name;
                    $vnt_eating->eat_status =  1;
                    $vnt_eating->service_id =  $id_service;
                    if($vnt_eating->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }

                }
                else if($id_type == 2)
                {
                    $vnt_hotels = new hotelsModel;
                    $vnt_hotels->hotel_name =  $hotel_name;
                    $vnt_hotels->hotel_website =  $request->input('hotel_website');
                    $vnt_hotels->hotel_number_star =  $request->input('hotel_number_star');
                    $vnt_hotels->hotel_status =  1;
                    $vnt_hotels->service_id =  $id_service;
                    if($vnt_hotels->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
                else if($id_type == 3)
                {
                    $vnt_transport = new transportModel;
                    $vnt_transport->transport_name =  $transport_name;
                    $vnt_transport->transport_status =  1;
                    $vnt_transport->service_id =  $id_service;
                    if($vnt_transport->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
                else if($id_type == 4)
                {
                    $vnt_sightseeing = new sightseeingModel;
                    $vnt_sightseeing->sightseeing_name =  $sightseeing_name;
                    $vnt_sightseeing->sightseeing_status     =  1;
                    $vnt_sightseeing->service_id =  $id_service;
                    if($vnt_sightseeing->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
                else if($id_type == 5)
                {
                    $vnt_entertainments = new sightseeingModel;
                    $vnt_entertainments-> $entertainments_name;
                    $vnt_entertainments->entertainments_status       = 1;
                    $vnt_entertainments->service_id =  $id_service;
                    if($vnt_entertainments->save()){
                        return json_encode("id_service:".$id_service);
                    }
                    else
                    {
                        return json_encode("status:500");
                    }
                }
            }
        }

        
    }

    public function GetNamePlace($id)
    {
        $service = DB::table('vnt_services')
        ->select('vnt_services.id','hotel_name','sightseeing_name','entertainments_name', 'transport_name',                  'eat_name')         
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')  
        ->where('vnt_services.id', $id)
        ->groupBy('vnt_services.id','hotel_name','entertainments_name','transport_name', 'sightseeing_name', 'hotel_website','eat_name')
        ->get();
        return json_encode($service);
    }

    public function GetWardList()
    {
        $ward_id =  DB::table('vnt_ward')
        ->select('vnt_ward.id','ward_name')
        ->paginate(10);
        return json_encode($ward_id);
    }

    public function GetWardListByID($id)
    {
        $ward_id =  DB::table('vnt_ward')
        ->select('vnt_ward.id','ward_name')
        ->where('vnt_ward.district_id', '=', $id)
        ->get();
        return json_encode($ward_id);
    }
    public function GetDisTrictListByID($id)
    {
        $DisTrict =  DB::table('vnt_district')
        ->select('vnt_district.id','district_name')
        ->where('vnt_district.province_city_id', '=', $id)
        ->get();
        return json_encode($DisTrict);
    }
    public function GetProvinceCity()
    {
        $DisTrict =  DB::table('vnt_province_city')
        ->select('vnt_province_city.id','province_city_name')
        ->get();
        return json_encode($DisTrict);
    }
}
