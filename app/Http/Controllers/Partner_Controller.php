<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Partner_Controller extends Controller
{
    public function getServices($month, $user_id)
    {

    	if($month == 0)
    	{
    		$dt = Carbon::now();
	        $month_select = $dt->month;
    	}
    	else
    	{
    		$month_select = $month;
    	}
        $services = DB::table('vnt_services')
        ->select('vnt_services.id','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price',  'tourist_places_id', 'sv_types','sv_status', 
        DB::raw('DATE_FORMAT(vnt_services.created_at, "%d-%m-%Y") as created_at'))
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_services.id')
        ->whereMonth('vnt_services.created_at', '=', $month_select)
        ->where('vnt_services.user_partner_id', '=', $user_id)
        ->where('sv_status','=', 1)
        ->orderBy('vnt_services.id', 'DESC')
        ->paginate(10);
        $encode=json_encode($services);
        return $encode;
    }
    public function getTouristPlaces($month, $user_id)
    {
    	if($month == 0)
    	{
    		$dt = Carbon::now();
	        $month_select = $dt->month;
    	}
    	else
    	{
    		$month_select = $month;
    	}
        $places = DB::table('vnt_tourist_places')
        ->select('vnt_tourist_places.id','pl_name', 'pl_details','pl_address','pl_phone_number','pl_latitude',  'pl_longitude', 'id_ward','district_name','province_city_name', 'province_city_name',
        DB::raw('DATE_FORMAT(vnt_tourist_places.created_at, "%d-%m-%Y") as created_at'))
        ->join('vnt_ward', 'vnt_ward.id_ward', '=', 'vnt_ward.id')
        ->join('vnt_district', 'vnt_district.province_city_id', '=', 'vnt_province_city.id')
        ->whereMonth('vnt_tourist_places.created_at', '=', $month_select)
        ->where('pl_status','=', 1)
        ->where('vnt_tourist_places.user_id', '=', $user_id)
        ->orderBy('vnt_tourist_places.id', 'DESC')
        ->paginate(10);
        $encode=json_encode($places);
        return $encode;
    }
    public function getTaskList($id)
    {
        //Link : /public/get-task-list/id_user
        $task_list = DB::table('vnt_task')
        ->select( DB::raw('DATE_FORMAT(date_start, "%d-%m-%Y") as date_start'),
            'task_title', 'vnt_task.id', 'user.username as assigner')
        ->join('vnt_user as user', 'user.user_id', '=', 'vnt_task.user_id')
        ->join('vnt_tour_guide as tourguide','user.user_id', '=', 'tourguide.user_id')
        ->where('status', '=', 1)
        ->orderBy('vnt_task.id', 'desc')
        ->limit(10)
        ->get();
        return json_encode($task_list);
        
    }
}
