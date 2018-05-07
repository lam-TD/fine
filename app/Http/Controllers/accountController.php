<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\contact_infoModel;
use GuzzleHttp\Client;
class accountController extends Controller
{
    public function get_info_account()
    {
    	$info = $this::get_info_user();
        // dd($info);
    	if (!$this::check_login()) {
            Session()->flush();
    		return view('VietNamTour.login');
    	}
    	else{
    		return view('VietNamTour.content.user.info', compact('info'));
    	}
    	
    }

    // public function check_login()
    // {
    // 	if (Session::has('login') && Session::get('login')) 
    //     {
    //         return true;
    //     }
    //     else{ return false; }
    // }

    // public function get_info_user()
    // {
    // 	if (Session::has('login') && Session::get('login')) 
    //     {
    //         $result[] = Session::get('user_info');
    //         // dd($result);
    //         foreach ($result as $value) {
    //         	$user_id = $value->id;
    //         }
            
    //         $result = contact_infoModel::where('user_id',$user_id)->first();
            
    //         // dd($info);
    //     }
    //     else{ $result = []; }
    //     return $result;
    // }


    // api 
    public function check_login()
    {
        if (Session::has('login') && Session::get('login')) 
        {
            return 1;
        }
        else{ return -1; }
    }

    public function get_info_user()
    {
        
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://chinhlytailieu/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_info_user/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }
}
