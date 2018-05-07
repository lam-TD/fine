<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckTaskRequest;
use App\Http\Requests\CheckAddTouristPlacesRequest;
use App\Http\Requests\CheckAddServicesRequest;
use App\taskModel;
use DB;
use App\touristPlacesModel;
use App\servicesModel;
class CMS_AddDataController extends Controller
{
    public function _POST_TASK(CheckTaskRequest $request)
    {
        $task = new taskModel();
        $task->task_title=$request->input('task_name');
        $task->task_description=$request->input('task_description');
        $task->content=$request->input('content');
        $task->date_start=$request->input('task_start_date');
        $task->date_end=$request->input('task_end_date');
        $task->status=1;
        $task->user_id =1;
        $task->assigner_user_id =$request->input('assigner_user_id');
        if($task->save())
        {
            return redirect('/lvtn-dashboard')->with('message', "Hoàn tất, Nhiệm vụ đã được gửi đi!");
        }
        else
        {
            return view('CMS.components.error');
        }
    }

    public function _POST_SERVICES_PLACES(CheckAddServicesRequest $request)
    {
        // $services = new servicesModel();
        // $services->services_name
        // $services->sv_open
        // $services->sv_close
        // $services->sv_lowest_price
        // $services->sv_highest_price
        // $services->sv_phone_number
        // $services->website
        // $services->description
        // $services->content


        
        // banner
        // details1
        // details2

    }

    public function _POST_TOURIST_PLACES(CheckAddTouristPlacesRequest $request)
    {
        $place = new touristPlacesModel();
        $place->pl_name=$request->input('place_name');
        $place->pl_content=$request->input('content');
        $place->pl_details=$request->input('description');
        $place->pl_address=$request->input('address');
        $place->pl_phone_number=$request->input('phonenumber');
        $place->pl_latitude=$request->input('vido');
        $place->pl_longitude=$request->input('kinhdo');
        $place->id_ward=$request->input('ward');
        $place->pl_status=0; 
        $place->user_partner_id =1;
        if ($request->get('action') == 'save_close') {
            $place->save();
            return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một địa điểm!");
        } 
        else if ($request->get('action') == 'save_and_add_service') {
            $place->save();
            $get_last_place = DB::table('vnt_tourist_places')
            ->select('id', 'pl_name')
            ->orderBy('created_at', 'desc')->first();
            if (view()->exists('view.CMS.components.com_services.add_services'))
            {
                return view('CMS.components.error');
            }
            else    {
                
                return view('CMS.components.com_services.add_services', ['data_place'=>$get_last_place]);
            }
        }
        else
        {
            return view('CMS.components.error');
        }
    }
}
