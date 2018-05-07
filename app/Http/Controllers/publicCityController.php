<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
class publicCityController extends Controller
{
    public function getCity($idcity,$type,$current_page)
    {
        $service_city = $this::paginate($this::get_service_city_new($idcity,0,$type,1), $current_page,9);
        
        $count_sv     = $this::count_service_all_and_type($idcity);
        $district      = $this::get_district_city($idcity);
        if ($service_city == null) {
            return view('VietNamTour.404');
        }
        else{
            return view('VietNamTour.content.place_city', compact('service_city','count_sv','idcity','district'));
        }
    }


    public function get_service_city_fillter($idcity, $id_district, $type, $boloc,$current_page,$limit)
    {
        $service_city = $this::paginate($this::get_service_city_new($idcity,$id_district,$type,$boloc), $current_page,$limit);
        return $service_city;
        // $count_sv     = $this::count_service_all_and_type($idcity);
        // $district      = $this::get_district_city($idcity);
        // if ($service_city == null) {
        //     return view('VietNamTour.404');
        // }
        // else{
        //     return view('VietNamTour.content.place_city', compact('service_city','count_sv','idcity','district'));
        // }
    }

    public function get_service_city($idcity)
    {
        $result = DB::select("SELECT * FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity' ORDER BY c.sv_counter_view desc");
        if ($result == null) {
            return null;
        }
        else {
            foreach ($result as $value) {
                $sv_id = $value->id_service;
                $name    = $this::getname_Service($sv_id,$value->sv_types);
                $image = $this::get_image($sv_id);
                $likes   = DB::table('vnt_likes')->where('service_id', '=',$sv_id)->count();
                $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv_id)->first();
                if (!empty($ratings)) { $ponit_rating = $ratings->vr_rating; }else{ $ponit_rating = 0; }

                $mang[] = array(
                    'id_service'        => $sv_id,
                    'name'              => $name,
                    'description'       => $value->sv_description,
                    'image'             => $image,
                    'sv_highest_price'  => $value->sv_highest_price,
                    'sv_lowest_price'   => $value->sv_lowest_price,
                    'like'              => $likes,
                    'view'              => $value->sv_counter_view,
                    'point'             => $value->sv_counter_point,
                    'rating'            => $ponit_rating,
                    'sv_type'           => $value->sv_types);
            }
            return $mang;
        }
    }

    public function get_service_city_new($idcity, $id_district, $type, $boloc)
    {
        // city-all/id=6&district=1&type=1&fil=1
        
        $type2 = 0;
        $id_district2 = 0;

        if ((int)$id_district > 0) {
            $id_district2 = (int)$id_district;
        }
        
        if ((int)$type > 0) {
            $type2 = (int)$type;
        }
        
        // phan trang bat dau - start; limit-ket thuc
        $type_boloc = ""; // 1-theo view; 2-theo point
        //
        $boloc == 1 ? $type_boloc = 'c.sv_counter_view' : $type_boloc = 'c.sv_counter_point';
        // neu $type_boloc = 0 -> mặc định load theo view
        // neu id_district = 0 -> load het dich vu cua city
        // neu $type       = 0 -> load het dich vu

        // query district = 0 & type = 0
        if ($id_district2 == 0 && $type2 == 0) {
            $query = "SELECT * FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity' ORDER BY ". $type_boloc ." DESC";
        }
        elseif ($id_district2 != 0 && $type2 == 0) { // query district <> 0 & type <> 0
            $query = "SELECT * FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity' AND c.id_district = '$id_district2' ORDER BY ". $type_boloc ." DESC";
        }
        else if($id_district2 == 0 && $type2 != 0){ // query district = 0 & type <> 0
            $query = "SELECT * FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity' AND c.sv_types = '$type2' ORDER BY ". $type_boloc. " DESC";
        }
        else { // query_all
            $query = "SELECT * FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity' AND c.id_district = '$id_district2' AND c.sv_types = '$type2' ORDER BY ". $type_boloc. " DESC";
        }
        // dd($query);
        $result = DB::select($query);
        if ($result == null) {
            return null;
        }
        else
        {
            foreach ($result as $value) {
                $sv_id = $value->id_service;
                $name    = $this::getname_Service($sv_id,$value->sv_types);
                $image = $this::get_image($sv_id);
                $likes   = DB::table('vnt_likes')->where('service_id', '=',$sv_id)->count();
                $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv_id)->first();
                if (!empty($ratings)) { $ponit_rating = $ratings->vr_rating; }else{ $ponit_rating = 0; }

                $mang[] = array(
                    'id_service'        => $sv_id,
                    'name'              => $name,
                    'description'       => $value->sv_description,
                    'image'             => $image,
                    'sv_highest_price'  => $value->sv_highest_price,
                    'sv_lowest_price'   => $value->sv_lowest_price,
                    'like'              => $likes,
                    'view'              => $value->sv_counter_view,
                    'point'             => $value->sv_counter_point,
                    'rating'            => $ponit_rating,
                    'sv_type'           => $value->sv_types);
            }
            return $mang;
        }
     }
    public function get_image($id_service)
    {
        $image = DB::table('vnt_images')->where('service_id',$id_service)->first();// load anh cua servic
        if ($image == null) { return null;}
        else{ return $image->image_details_1; }
    }

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
        if ($dv == null) {return null;}else{return $dv->sv_name;}
    }

    public function count_service_all_and_type($idcity) // count tat ca dich vu cua city and count theo loai
    {
        $result['num_eat']   = 0;
        $result['num_hotel'] = 0;
        $result['num_tran']  = 0;
        $result['num_see']   = 0;
        $result['num_enter'] = 0;
        $result_all = DB::select("SELECT COUNT(c.id_service)AS 'sum_service' FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity'");
        foreach ($result_all as $value) { $result['num_all'] = $value->sum_service; }
        if ($result == null || $result['num_all'] == 0) {
            return $result;
        }
        else
        {
            for ($i=1; $i <= 5; $i++) {
                $query = "SELECT COUNT(c.id_service) AS 'sum_service' FROM c_city_district_ward_place_service AS c WHERE c.id_city = '$idcity' AND c.sv_types = '$i'";
                $result_type = DB::select($query);
                foreach ($result_type as $sv) { $num_type = $sv->sum_service; }

                $i == 1 ? $result['num_eat']   = $num_type : "";
                $i == 2 ? $result['num_hotel'] = $num_type : "";
                $i == 3 ? $result['num_tran']  = $num_type : "";
                $i == 4 ? $result['num_see']   = $num_type : "";
                $i == 5 ? $result['num_enter'] = $num_type : "";
            }
            return $result;
        }
    }

    public function paginate($data, $page,$limit)
    {
        // data du lieu de phan trang
        // page trang hien tai
        // limit hien thi so ket qua moi trang
        // bat dau tu phan tu nao

        // dd($data);
        if ($data == null) {
            $result_paginate['data'] = null;
            $result_paginate['total_page'] = 0;
            $result_paginate['current_page'] = 0;
            $result_paginate['limit'] = $limit;
        }
        else{
            $current_page  = $page;
            $total_records = count($data); // tong so item;

            $total_page    = ceil($total_records/$limit);

            if ($current_page > $total_page) { $current_page = $total_page; }
            else if ($current_page < 1) { $current_page = 1; }

            $start = ($current_page - 1) * $limit;
            $data == null ? $result = null : $result = $result = array_slice($data,$start,$limit);// lay danh sach say khi phan trang

            $result_paginate['data'] = $result;
            $result_paginate['total_page'] = $total_page;
            $result_paginate['current_page'] = $current_page;
            $result_paginate['limit'] = $limit;
        }
            
        return $result_paginate;

    }

    //load distric theo city_id
    public function get_district_city($idcity)
    {
        $result = DB::select("SELECT * FROM c_city_district AS c WHERE c.id_city = '$idcity'");
        return $result;
    }
}
