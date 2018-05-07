<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\likesModel;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $like = DB::table('vnt_likes')
        ->select('vnt_likes.id', 'vnt_likes.user_id', 'vnt_images.id AS image_id','vnt_images.image_details_1')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_likes.service_id')
        ->join('vnt_services', 'vnt_services.id', '=', 'vnt_likes.service_id')
        ->paginate (10);
        $encode=json_encode($like);
        return $encode;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $likes                    = new likesModel;
        $likes->service_id       = $request->input('service_id');
        $likes->user_id    = $request->input('user_id');
        $likes->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $like = DB::table('vnt_likes')
        ->select('vnt_likes.service_id as id', 'hotel_name','entertainments_name', 'transport_name', 'sightseeing_name', 'eat_name', 'vnt_images.id AS image_id', 'vnt_images.image_details_1')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_likes.service_id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_likes.service_id')
        ->join('vnt_services', 'vnt_services.id', '=', 'vnt_likes.service_id')
        ->where('vnt_likes.user_id',$id)
        ->paginate (10);
        $encode=json_encode($like);
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
        $likes = DB::table('vnt_likes')
        ->select('id','vnt_services', 'vnt_likes')
        ->where('id',$id)
        ->get();
        $encode=json_encode($likes);
        return $encode;
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
        $likes                      = likesModel::findOrFail($id);
        $likes->service_id        = $request->input('service_id');
        $likes->user_id      = $request->input('user_id');
        if($likes->save())
        {
            $encode=json_encode("status: 200");
            return $encode;
        }
        else{
            $encode=json_encode("status: 500");
            return $encode;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $likes = likesModel::findOrFail($id);
        $likes->delete();
    }
}
