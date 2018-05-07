<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Colection;

class CounterEventsController extends Controller
{
    public function countEvent()
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
        ->where('event_status','=', 1)
        ->count();
        return  json_encode($events);
    }
    public function Counter($name)
    {

    }
}
