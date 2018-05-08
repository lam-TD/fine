<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\touristPlacesModel;
use App\likesModel;
use App\servicesModel;
use App\ratingsModel;
use GuzzleHttp\Client;
use Session;
use Carbon;
class publicDetail extends Controller
{
    public function get_detail($id,$type)
    {
        $this::addview($id);
    	$sv = $this::get_service_id($id,$type);

        $sv_lancan = $this::dichvu_lancan($sv->city_id,$id,20);
        $rating = $this::getRating($id);
        // dd($rating);
        $checklogin = $this::check_Login();
        if ($checklogin != null) {
            $checkUserRating = $this::checkUserRating($id,$checklogin);
            if (count($checkUserRating) == 0) {
                $checkUserRating = null;
            }
        }
        else{
            $checkUserRating = null;
        }
        // return $checkUserRating;
    	if ($sv == null) {
    		return view('VietNamTour.404');
    	}
    	else{
    		return view('VietNamTour.content.detail', compact('sv','sv_lancan','rating','checklogin','checkUserRating'));
    	}
    }

    // public function get_service_id($id,$type)
    // {
    //     $service = DB::select("CALL find_serviceOfcity(?)",array($id)); //load serice-place-ward-district-city
    //     if ($service == null) {
    //         $result = null;
    //     }
    //     else{
    //         switch ($type) { //load ten theo id service
    //             case 1:
    //                 $dv = DB::table('vnt_eating')->where('service_id',$id)->select('eat_name as sv_name')->first();
    //                 break;
    //             case 2:
    //                 $dv = DB::table('vnt_hotels')->where('service_id',$id)->select('hotel_name as sv_name')->first();
    //                 break;
    //             case 3:
    //                 $dv = DB::table('vnt_transport')->where('service_id',$id)->select('transport_name as sv_name')->first();
    //                 break;
    //             case 4:
    //                 $dv = DB::table('vnt_sightseeing')->where('service_id',$id)->select('sightseeing_name as sv_name')->first();
    //                 break;
    //             case 5:
    //                 $dv = DB::table('vnt_entertainments')->where('service_id',$id)->select('entertaiments_name as sv_name')->first();
    //                 break;
    //             default:
    //                 $dv = null;
    //                 break;
    //         }

    //         $image = DB::table('vnt_images')->where('service_id',$id)->first();// load anh cua service

    //         $likes = DB::table('vnt_likes')->where('service_id', '=',$id)->count();

    //         $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$id)->first();
    //         if (!empty($ratings)) {
    //             if ($ratings->vr_rating > 0) {
    //                 $ponit_rating = CEIL($ratings->vr_rating);
    //             }else{
    //                 $ponit_rating = 1;
    //             }
    //         }else{ $ponit_rating = 1; }

    //         if ($dv == null || !isset($dv)) {
    //             $result = null;
    //         }
    //         else{
    //             foreach ($service as $value) {
    //                 $result['sv_id'] = $value->id_service;
    //                 $result['sv_name'] = $dv->sv_name;
    //                 $result['city_id'] = $value->id_city;
    //                 $result['city_name'] = $value->name_city;
    //                 $result['district_name'] = $value->name_district;
    //                 $result['ward_name'] = $value->name_ward;
    //                 $result['place_name'] = $value->name_place;
    //                 $result['sv_view'] = $value->sv_counter_view;
    //                 $result['sv_point'] = $value->sv_counter_point;
    //                 $result['sv_like'] = $likes;
    //                 $result['sv_rating'] = $ponit_rating;

    //                 $result['id_place'] = $value->id_place;
    //                 $result['pl_latitude'] = $value->pl_latitude;
    //                 $result['pl_longitude'] = $value->pl_longitude;
    //                 $result['sv_close'] = $value->sv_close;
    //                 $result['sv_counter_point'] = $value->sv_counter_point;
    //                 $result['sv_counter_view'] = $value->sv_counter_view;
    //                 $result['sv_description'] = $value->sv_description;
    //                 $result['sv_highest_price'] = $value->sv_highest_price;
    //                 $result['sv_lowest_price'] = $value->sv_lowest_price;
    //                 $result['sv_open'] = $value->sv_open;
    //                 $result['sv_phone_number'] = $value->sv_phone_number;
    //                 $result['sv_types'] = $value->sv_types;
    //                 // $result['sv_website'] = $value->sv_website;
    //                 if ($image == null) {
    //                     $result['image_banner'] = null;
    //                     $result['image_details_1'] = null;
    //                     $result['image_details_2'] = null;
    //                 }
    //                 else{
    //                     $result['image_banner'] = $image->image_banner;
    //                     $result['image_details_1'] = $image->image_details_1;
    //                     $result['image_details_2'] = $image->image_details_2;
    //                 }

    //                 $result['sv_open'] = $value->sv_open;
    //                 $result['sv_open'] = $value->sv_open;
    //                 $result['sv_open'] = $value->sv_open;
    //             }
    //         }
    //     }

    // 	if ($result == null || !isset(($result))) {
    // 		echo "404";
    // 	}
    // 	else{
    // 		return $result;
    // 	}
    // }

    // random image city
    public function image_city($idcity)
    {
        $place = DB::select('CALL load_palce_city_limit1(?)',array($idcity));
        if ($place == null) {
            $image = null;
        }
        else{
            foreach ($place as $value) {
                $id_place = $value->id_place;
            }
            $s = DB::select("SELECT * FROM place_service_image AS p WHERE p.place_id = '$id_place'");
            if ($s == null) {
                $image = null;
            }
            else{
                foreach ($s as $v) {
                    $image = $v->image_details_1;
                }
            }
        }

        return $image;
    }

    // public function dichvu_lancan($id_city,$id_service,$limit)
    // {
    //     $result_sv = DB::select("CALL load_service_idcity(?,?,?)",array($id_city,$id_service,$limit));
    //     foreach ($result_sv as $sv) {
    //         $image = DB::table('vnt_images')->where('service_id',$sv->id_service)->first();// load anh cua
    //         $sv_name = $this::getname_Service($sv->id_service,$sv->sv_types);
    //         if ($image == null) {
    //             $image_banner = "null";
    //         }
    //         else{
    //             $image_banner = $image->image_banner;
    //         }

    //         $result[] = array(
    //             'sv_id' => $sv->id_service,
    //             'sv_name' => $sv_name,
    //             'sv_type' => $sv->sv_types,
    //             'image_banner' => $image_banner
    //         );
    //     }
    //     if (!isset($result)) {
    //         return null;
    //     }else{
    //         return $result;
    //     }

    // }

    public function getname_Service($id_service,$type)
    {
        switch ($type) { //load ten theo id service
                case 1:
                    $dv = DB::table('vnt_eating')->where('service_id',$id_service)->select('eat_name as sv_name')->first();
                    break;
                case 2:
                    $dv = DB::table('vnt_hotels')->where('service_id',$id_service)->select('hotel_name as sv_name')->first();
                    break;
                case 3:
                    $dv = DB::table('vnt_transport')->where('service_id',$id_service)->select('transport_name as sv_name')->first();
                    break;
                case 4:
                    $dv = DB::table('vnt_sightseeing')->where('service_id',$id_service)->select('sightseeing_name as sv_name')->first();
                    break;
                case 5:
                    $dv = DB::table('vnt_entertainments')->where('service_id',$id_service)->select('entertainments_name as sv_name')->first();
                    break;
                default:
                    $dv = null;
                    break;
        }

        if ($dv == null) {
            return null;
        }
        else{
            return $dv->sv_name;
        }
    }

    public function checkLike($userid,$idservice)
    {
        // kiem tra nguoi dung co login hay chưa
        $like = DB::table('vnt_likes')->where('user_id',$userid)->where('service_id',$idservice)->select('id')->first();
        if ($like == null) {
            $result = -1;
        }
        else{
            $result = 1;
        }
        return json_encode($result);
    }

    // public function addview($idservice)
    // {
    //     $result = servicesModel::findOrFail($idservice);
    //     if ($result == null) {
    //         $view = 1;
    //     }else{
    //         $view = $result->sv_counter_view + 1;
    //     }
    //     $result->sv_counter_view = $view;

    //     $result->save();
    // }


    //api 
    public function addview($id)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
        $response = $client->request('GET',"add-view/{$id}");

        return json_decode($response->getBody()->getContents());
    }

    public function get_service_id($id,$type)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
        $response = $client->request('GET',"get_service_id/{$id}&type={$type}");

        return json_decode($response->getBody()->getContents());
    }

    public function dichvu_lancan($idcity,$id,$limit)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
        $response = $client->request('GET',"dichvu_lancan/idcity={$idcity}&id={$id}&limit={$limit}");

        return json_decode($response->getBody()->getContents());
    }

    public function getRating($idservice)
    {
        // $result = DB::select("SELECT vr_title, vr_ratings_details,vr_rating,user_id,service_id,created_at,username FROM `vnt_visitor_ratings` AS r INNER JOIN vnt_user AS i ON r.user_id = i.user_id WHERE r.service_id = '$idservice'");

        $result = DB::table('vnt_visitor_ratings')
                    ->join('vnt_user','vnt_visitor_ratings.user_id','=','vnt_user.user_id')
                    ->leftjoin('vnt_contact_info','vnt_visitor_ratings.user_id','=','vnt_contact_info.user_id')
                    ->select('vr_title','vr_ratings_details','vr_rating','vnt_visitor_ratings.user_id','service_id','vnt_visitor_ratings.created_at','username','contact_avatar')
                    ->where('service_id',$idservice)->get();
        return $result;
    }

    public function check_Login()
    {
        if (Session::has('login') && Session::get('login')) 
        {
            // $result = Session::get('user_info');
            $result = Session::get('user_info')->id;
        }
        else{ $result = null ; }
        return json_encode($result);
    }

    public function checkUserRating($idservice,$iduser)
    {
        $result = DB::table('vnt_visitor_ratings')
                    ->join('vnt_user','vnt_visitor_ratings.user_id','=','vnt_user.user_id')
                    ->leftjoin('vnt_contact_info','vnt_visitor_ratings.user_id','=','vnt_contact_info.user_id')
                    ->select('vr_title','vr_ratings_details','vr_rating','vnt_visitor_ratings.user_id','service_id','vnt_visitor_ratings.created_at','username','contact_avatar')
                    ->where('service_id',$idservice)
                    ->where('vnt_visitor_ratings.user_id',$iduser)
                    ->orderBy('vnt_visitor_ratings.created_at','desc')
                    ->limit(10)
                    ->get();
        return $result;
    }

    public function save_rating($id_service, $rating, $detail)
    {
        $ra = (int)$rating;
        $user_id = $this::check_Login();
        $rating = new ratingsModel();
        $rating->vr_title = "d";
        $rating->vr_ratings_details = $detail;
        $rating->vr_rating = $ra;
        $rating->user_id = $user_id;
        $rating->service_id = $id_service;

        $mytime = Carbon\Carbon::now();
        $rating->created_at = $mytime->toDateTimeString();

        $rating->save();

        return 1;
    }

    public function save_update_rating($id_service, $rating, $detail)
    {
        $user_id = $this::check_Login();
        $mytime = Carbon\Carbon::now();
        DB::table('vnt_visitor_ratings')
            ->where('user_id', $user_id)
            ->where('service_id', $id_service)
            ->update(['vr_rating' => $rating, 'vr_ratings_details' => $detail,'created_at' => $mytime->toDateTimeString()]);
        return 1;
    }

    public function ThemVaCapNhatLike($idservice)
    {
        $user_id = $this::check_Login();
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
        $response = $client->request('GET',"ThemVaCapNhatLike/{$idservice}&user={$user_id}");

        return json_decode($response->getBody()->getContents());
    }
}
