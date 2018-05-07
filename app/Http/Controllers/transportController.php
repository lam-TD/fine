<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class transportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transport = DB::table('vnt_transport')
        ->select('vnt_transport.service_id AS id','transport_name','vnt_images.id AS image_id','vnt_images.image_details_1')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_transport.service_id')
        ->where('transport_status', '=', 1)
        ->paginate(10);
        $encode=json_encode($transport);
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
        
        $phuong_tien = DB::table('vnt_transport')
        ->select('vnt_transport.service_id AS id','transport_name', 'vnt_tourist_places.pl_address','vnt_tourist_places.pl_phone_number',
        'vnt_services.sv_lowest_price', 'vnt_services.sv_highest_price', 'vnt_services.sv_close','vnt_services.sv_open',
        'vnt_services.sv_description', 'vnt_transport.service_id')
        ->join('vnt_services', 'vnt_services.id', '=', 'vnt_transport.service_id')
        ->join('vnt_tourist_places', 'vnt_services.tourist_places_id', '=', 'vnt_tourist_places.id')
        

        ->where('vnt_transport.service_id', $id)
        ->get();
        $encode=json_encode($phuong_tien);
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
        //
    }
}
