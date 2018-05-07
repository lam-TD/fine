<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\visitorRatingsModel;
class VisitorRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating_list = DB::table('vnt_visitor_ratings')
        ->select('vnt_users.username','vr_rating','vr_ratings_details', 'vr_title')
        ->join('vnt_users', 'vnt_visitor_ratings.user_id', '=', 'vnt_users.id')
        ->paginate(10);
        $encode=json_encode($rating_list);
        return $encode;    
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rating = DB::table('vnt_visitor_ratings')
        ->select('vr_title', 'vr_ratings_details', 'vr_rating')
        ->where('id', $id)
        ->get();
        $encode=json_encode($rating);
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
        $rating = DB::table('vnt_visitor_ratings')
        ->select('id','service_id', 'user_id','vr_rating', 'vr_ratings_details', 'vr_title')
        ->where('id', $id)
        ->get();
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
        //
    }
}
