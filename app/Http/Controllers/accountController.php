<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\contact_infoModel;
class accountController extends Controller
{
    public function get_info_account()
    {
    	$info = $this::get_info_user();
        // dd($info);
    	if (!$this::check_login()) {
    		return view('VietNamTour.login');
    	}
    	else{
    		return view('VietNamTour.content.user.info', compact('info'));
    	}
    	
    }

    public function check_login()
    {
    	if (Session::has('login') && Session::get('login')) 
        {
            return true;
        }
        else{ return false; }
    }

    public function get_info_user()
    {
    	if (Session::has('login') && Session::get('login')) 
        {
            $result[] = Session::get('user_info');
            // dd($result);
            foreach ($result as $value) {
            	$user_id = $value->user_id;
            }
            
            $result = contact_infoModel::where('user_id',$user_id)->first();
            
            // dd($info);
        }
        else{ $result = []; }
        return $result;
    }
}
