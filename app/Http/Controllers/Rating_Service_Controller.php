<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\visitorRatingsModel;
use Illuminate\Http\Request;

class Rating_Service_Controller extends Controller
{
    public function rating($id)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_user.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_user', 'vnt_visitor_ratings.user_id', '=', 'vnt_user.user_id')
        ->where('vnt_visitor_ratings.service_id', $id)
        ->paginate(10);
        $encode=json_encode($rating);
        return $encode;
    }

    public function view_rating($id_danhgia)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_user.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_user', 'vnt_visitor_ratings.user_id', '=', 'vnt_user.user_id')
        ->where('vnt_visitor_ratings.id', $id_danhgia)
        ->get();
        $encode=json_encode($rating);
        return $encode;
    }


    public function view_rating_by_user($id_user)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vnt_user.username','vr_rating','vr_ratings_details', 'vr_title', 
            DB::raw('DATE_FORMAT(vnt_visitor_ratings.created_at,"%d-%m-%Y") as date_rating'))
        ->join('vnt_user', 'vnt_visitor_ratings.user_id', '=', 'vnt_user.user_id')
        ->orderBy('date_rating', 'DESC')
        ->where('vnt_visitor_ratings.user_id', $id_user)
        ->paginate(10);
        $encode=json_encode($rating);
        return $encode;
    }

    public function postRating(Request $request)
    {
        $rating                 = new visitorRatingsModel();
        $rating->service_id    = $request->input('service_id');
        $rating->user_id = $request->input('user_id');
        $rating->vr_rating        = $request->input('vr_rating');
        $rating->vr_title      = $request->input('vr_title');
        $rating->vr_ratings_details     = $request->input('details');
        if($rating->save()){
            $encode=json_encode("status: 200");
            return $encode;
        }
        else{
            $encode=json_encode("status: 500");
            return $encode;
        }
    }

    
}
