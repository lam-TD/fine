<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\servicesModel;
use App\touristPlacesModel;
use App\imagesModel;
use App\eatingModel;
use App\sightseeingModel;
use App\transportModel;
use App\hotelsModel;
use Carbon\Carbon;

class ServicesDetailsController extends Controller
{
    public function showDetails($services_id, $user_id)
    {
        $service = DB::table('vnt_services')
        ->select('vnt_services.id', 'hotel_name', 'sightseeing_name', 'entertainments_name', 'transport_name', 'eat_name', 
            'sv_website', 'sv_description', 'sv_open', 'sv_close', 'sv_lowest_price', 'sv_highest_price', 'pl_phone_number', 
            'pl_address', DB::raw('AVG(vnt_visitor_ratings.vr_rating) as rating'), 'pl_latitude', 'pl_longitude','pl_name')
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.tourist_places_id')
        ->leftjoin('vnt_visitor_ratings', 'vnt_visitor_ratings.service_id','=', 'vnt_services.id')
        
        ->where('vnt_services.id', $services_id)
        ->groupBy('vnt_services.id','hotel_name','entertainments_name','transport_name', 'sightseeing_name', 
                 'eat_name', 'sv_website', 'sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'vnt_tourist_places.pl_phone_number',
                 'vnt_tourist_places.pl_address', 'vnt_tourist_places.pl_latitude', 'vnt_tourist_places.pl_longitude','pl_name')
        
        ->get();

        $date = Carbon::now();
        $year_now = $date->year;
        $month_now = $date->month;
        $today = $date->day;
        
        
        $type_events = DB::table('vnt_types')
        ->select('type_name')
        ->join('vnt_events','vnt_events.type_id','=','vnt_types.id')
        ->join('vnt_services', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->whereYear('event_end', '>=', $year_now)
        ->whereDay('event_end', '>=',$today)
        ->whereMonth('event_end', '>=', $month_now)
        ->where('vnt_services.id',$services_id)
        ->orderBy('vnt_events.created_at', 'desc')->first();
         


        $like_id = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id')
        ->where('service_id','=', $services_id)
        ->where('vnt_likes.user_id','=', $user_id)
        ->first();

        
        $like_by_user = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        ->where('service_id','=', $services_id)
        ->where('user_id','=', $user_id)
        ->count();
        if($like_by_user != 0)
        {
            $like_tmp = 1;
        }
        else{
            $like_tmp = 0;
        }

        

        $countLike = DB::table('vnt_likes')
        ->select('vnt_likes.id as like_id','vnt_likes.user_id')
        ->where('service_id','=', $services_id)
        ->count();

        $rating_id = DB::table('vnt_visitor_ratings')
        ->select('vnt_visitor_ratings.id as rating_id')
        ->where('service_id', '=', $services_id)
        ->where('vnt_visitor_ratings.user_id','=', $user_id)
        ->first();

        $rating_count = DB::table('vnt_visitor_ratings')
        ->select('vnt_visitor_ratings.id as rating_id','vnt_visitor_ratings.user_id')
        ->orderBy('vnt_visitor_ratings.id', 'DESC')
        ->where('service_id', '=', $services_id)
        ->where('vnt_visitor_ratings.user_id','=', $user_id)
        
        ->count();
        if($rating_count != 0)
        {
            $rating_tmp = 1;
        }
        else{
            $rating_tmp = 0;
        }


        $merge[] = ["isLike"=>$like_tmp, "isRating"=>$rating_tmp,"idLike"=>$like_id, 
        "idRating"=>$rating_id, "type_event"=>$type_events,"service"=>$service, "count_like"=>$countLike];  
        
        
        $json_merge = json_encode($merge);
       

        
        return $json_merge;
    }
}
