<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\eventModel;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $day = $dt->day;
        $events = DB::table('vnt_events')
        ->select('vnt_events.service_id as id', 'vnt_events.event_name', 'vnt_images.id as image_id','vnt_images.image_details_1', 
        DB::raw('DATE_FORMAT(event_start, "%d-%m-%Y") as event_start'),
        DB::raw('DATE_FORMAT(event_end, "%d-%m-%Y") as event_end'))
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_events.service_id')
        ->whereYear('event_end', '>=', $year)
        ->whereDay('event_end', '>=',$day)
        ->whereMonth('event_end', '>=', $month)
        ->where('event_status','=', 'Active')
        ->paginate(10);
        $encode=json_encode($events);
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
        $events = new eventModel();
        $events->event_name=$request->input("event_name");
        $events->event_start=$request->input("event_start");
        $events->event_end=$request->input("event_end");
        $events->event_status=1;
        $events->type_id=$request->input("type_id");
        $events->service_id=$request->input("service_id");
        
        if($events->save()){
            return json_encode("status:200");            
        }
        else{
            return json_encode("status:500");   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
