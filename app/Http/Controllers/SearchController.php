<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristPlacesModel;
use App\servicesModel;
use DB;

class SearchController extends Controller
{
    //
    public function distance($lat1, $lon1, $lat2, $lon2) 
    {
        // có thế thêm tham số $unit vào hàm để tính theo các đơn vị khác 
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        // $unit = strtoupper($unit);
        return ($miles * 1.609344)*1000; //trả về mét
        
    }

    public function distanceRadius($latitude, $longitude, $radius)
    {
        $places = touristPlacesModel::all();
        foreach ($places as $p) {
            $p_latitude = (double)$p['pl_latitude'];
            $p_longitude = (double)$p['pl_longitude'];
            $distancePlace = $this::distance($latitude, $longitude, $p_latitude, $p_longitude);
            if ($distancePlace <= $radius && $distancePlace > 1) {
                $result[$distancePlace] = array('id' => $p['id'],'pl_name' => $p['pl_name'],'distantce' => $distancePlace, 'latitude' => $p['pl_latitude'],'longitude' => $p['pl_longitude']);
            }
        }
        if (isset($result)) { return $result; }
        else{ return null; } 
    }

    public function searchPlaceVicinity($user_lat, $user_lon, $radius)
    {
        $result = $this::distanceRadius($user_lat,$user_lon,$radius);
        if (isset($result)) 
        {
            ksort($result);
            $temp = 0;
            foreach ($result as $item) {
                if ($temp < 10) {
                    $jsonResult[] = $item;
                    $temp++;
                }
                else{break;}
            }
            $jsonResultData = array('data'=>$jsonResult,'status'=>'OK');
            return json_encode($jsonResultData);
        }
        else{
            $jsonResult['data'] = null;
            $jsonResult['status'] = 'NOT FOUND';
            return json_encode($jsonResult);
        }
    }

    public static function getServicesAll($place_id,$typeServices, $distance)
    {
        switch ($typeServices) {
            case '1':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'eat_name' => $value->eat_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '2':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_hotels.hotel_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'hotel_name' => $value->hotel_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '3':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_transport.transport_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'transport_name' => $value->transport_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '4':
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_sightseeing.sightseeing_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->take(5)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'sightseeing_name' => $value->sightseeing_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
            case '5':
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_entertainments.entertainments_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('tourist_places_id',$place_id)
                                    ->where('sv_types',$typeServices)->get();
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $resultCustom[] = array('id'=> $value->id,'entertainments_name' => $value->entertainments_name,'image_id' => $value->image_id,'image_details_1' => $value->image_details_1,'distance' => $distance);
                    }
                    if (isset($resultCustom)) {
                        return $resultCustom;
                    }
                    else{ return null;  }
                }else{ return null; }
                break;
        }
    }

    //tìm dịch vụ lân cận
    public function searchServicesVicinity($latitude,$longitude, $type,int $radius)
    {
        if ($radius >=100) 
        {
            $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            // dd($arr_distance);
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                foreach ($arr_distance as $value) {
                    $arr_distancePlace[$value['id']] = $value['distantce'];
                }
                foreach ($arr_distancePlace as $key => $value) {
                    if (!empty($this::getServicesAll($key,$type,$value))) {
                        foreach ($this::getServicesAll($key,$type,$value) as $k => $v) {
                            $r[] = $v;
                        }
                    }
                }
                if (isset($r)) {
                    $resultAll['data'] = $r;
                    $resultAll['status'] = "OK";
                    return json_encode($resultAll);
                }
                else{
                    $resultAll = array('data' => null,'status' => 'NOT FOUND');
                    return json_encode($resultAll);
                }
            }
            else{
                $resultAll = array('data' => null,'status' => 'NOT FOUND');
                return json_encode($resultAll);
            }
        }
        else
        {
            $resultAll = array('data' => null,'status' => 'DISTANCE');
            return json_encode($resultAll);
        } 
    }

    public function searchServicesKeyword($keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        // $result = dichvuModel::where('dv_gioithieu','like',"%$keyword_handing%")
        //                         ->select('')->take(30)->paginate(5);
        $result = DB::table('vnt_services') // idhinhanh, anhimage_detail_1
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_transport', 'vnt_services.id', '=', 'vnt_transport.service_id')
                                    ->leftJoin('vnt_entertainments', 'vnt_services.id', '=', 'vnt_entertainments.service_id')
                                    ->leftJoin('vnt_sightseeing', 'vnt_services.id', '=', 'vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_hotels.hotel_name','vnt_sightseeing.sightseeing_name','vnt_transport.transport_name','vnt_entertainments.entertainments_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('eat_name','like',"%$keyword_handing%")
                                    ->orWhere('hotel_name','like',"%$keyword_handing%")
                                    ->orWhere('sightseeing_name','like',"%$keyword_handing%")
                                    ->orWhere('transport_name','like',"%$keyword_handing%")
                                    ->orWhere('entertainments_name','like',"%$keyword_handing%")->take(30)->paginate(10);
        return json_encode($result);
    }

    public function searchServicesTypeKeyword($type,$keyword)
    {
        $keyword_handing = str_replace("+", " ", $keyword);
        switch ($type) {
            case '1':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id', 'vnt_eating.eat_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('eat_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '2':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_hotels.hotel_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('hotel_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '3':
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_transport.transport_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('transport_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '4':
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_sightseeing.sightseeing_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('sightseeing_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
            case '5':
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_entertainments.entertainments_name','vnt_images.id as image_id','vnt_images.image_details_1')
                                    ->where('entertainments_name','like',"%$keyword_handing%")
                                    ->where('sv_types',$type)->paginate(10);
                return json_encode($result);
                break;
        }
    }
    
    public static function searchServicesVicinityWEB($latitude,$longitude, $type,int $radius)
    {
       if ($radius >=100) 
        {
            $arr_distance = $this::distanceRadius($latitude,$longitude,$radius);
            if (!empty($arr_distance)) {
                ksort($arr_distance);
                foreach ($arr_distance as $value) {
                    $arr_distancePlace[$value['id']] = $value['distantce'];
                }
                foreach ($arr_distancePlace as $key => $value) {
                    if (!empty($this::getServicesAll($key,$type,$value))) {
                        foreach ($this::getServicesAll($key,$type,$value) as $k => $v) {
                            $r[] = $v;
                        }
                    }
                }
                if (isset($r)) {
                    return $r;
                }
                else{
                    return "Loi1";
                }
            }
            else{
                return "Loi2";
            }
        }
        else
        {
            return "Loi3";
        } 
    }

}
