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
use App\userSearchModel;
use Carbon\Carbon;
class userSearch extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $userSearch =  new userSearchModel;
            $userSearch->id_service  =  $request->input('id_service');
            $userSearch->id_users  =  $request->input('id_user');
            if($userSearch->save())
            {
                return json_encode("status:200");
            }
            else{
                return json_encode("status:500");
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = DB::table('vnt_services')
        ->select('vnt_services.id','hotel_name','sightseeing_name','entertainments_name', 'transport_name',
                 'eat_name','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'pl_phone_number',
                 'pl_address', DB::raw('AVG(vnt_visitor_ratings.vr_rating) as rating'),
                 'pl_latitude', 'pl_longitude','pl_name'
                 )
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.tourist_places_id')
        ->leftjoin('vnt_visitor_ratings', 'vnt_visitor_ratings.service_id','=', 'vnt_services.id')
        ->leftjoin('vnt_user_search','vnt_user_search.id_service', '=' , 'vnt_services.id')
        ->leftjoin('vnt_user', 'vnt_user.user_id', '=', 'vnt_user_search.user_id')
        ->where('vnt_user.user_id', $id)
        ->groupBy('vnt_services.id','hotel_name','entertainments_name','transport_name', 'sightseeing_name',
                 'eat_name','sv_description', 'sv_open','sv_close','sv_lowest_price','sv_highest_price', 'vnt_tourist_places.pl_phone_number',
                 'vnt_tourist_places.pl_address', 'vnt_tourist_places.pl_latitude', 'vnt_tourist_places.pl_longitude','pl_name')
        ->get();
 
        $encode = json_decode($service);
        return $encode;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userSearch = userSearchModel::find($id);
        if($userSearch->delete())
        {
            return json_encode("status:200");    
        }
        return  json_encode("status:500");    
        
    }
}
