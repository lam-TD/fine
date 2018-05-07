<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class publicSearchController extends Controller
{
    public function get_search()
    {
    	// $placecount       = $this::count_place_display();
    	return view('VietNamTour.content.search',compact('placecount'));
    }

    public function count_place_display()
    {
        $result = DB::select('CALL count_city_place()');
        foreach ($result as $value) {
            $image = $this::image_city($value->id);
            $last[] = array(
                'id' => $value->id,
                'amount_palce' => $value->amount_palce,
                'province_city_name' => $value->province_city_name,
                'image' => $image
            );
        }
        return $last;
    }

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


	//=================== PLACE CITY =====================
    public function get_place_city($idcity)
    {
    	$placecount       = $this::count_place_display();
    	$sum = $this::count_place_city($idcity); // ten city-count place
    	$count_sv = $this::count_servies_type($idcity);
    	$all_place = $this::get_all_place_city($idcity);
    	if ($sum == null) {
    		return view('VietNamTour.404');
    	}
    	else{
    		return view('VietNamTour.content.place_city',compact('placecount','sum','count_sv','all_place'));
    	}
    }

    public function count_place_city($idcity)
    {
    	$city = DB::select("SELECT COUNT(c.id_place) AS sum_place,c.province_city_name FROM city_place_all AS c WHERE c.id = '$idcity'");
    	$sum = 0;
    	$name = "";
    	$result = null;
    	foreach ($city as $value) {
    		$sum = $value->sum_place;
    		$name = $value->province_city_name;
    	}
    	if ($name == null) {
    		$result = null;
    	}
    	else if ($sum == 0 && $name == null) {
    		$result = null;
    	}
    	else if ($name != null){
    		$result = array('name' => $name, 'sum' => $sum);
    	}
    	return $result;
    }

    public function count_servies_type($idcity) // tra ve so luong dich vu tuong ung voi ten
    {
    	$sum_eat = 0;
    	$sum_hotel = 0;
    	$sum_see = 0;
    	$sum_tran = 0;
    	$sum_enter = 0;
    	$place = DB::table('vnt_tourist_places as t')->where('t.city_id',$idcity)->select('t.id')->get();

    	foreach ($place as $value) {
    		$sum_eat += $this::count_servies_type_con($value->id,1);
    		$sum_hotel += $this::count_servies_type_con($value->id,2);
    		$sum_see += $this::count_servies_type_con($value->id,4);
    		$sum_tran += $this::count_servies_type_con($value->id,3);
    		$sum_enter += $this::count_servies_type_con($value->id,5);
    	}
    	$result = array(
    					'eat' => $sum_eat,
    					'hotel' => $sum_hotel,
    					'see' => $sum_see,
    					'tran' => $sum_tran,
    					'enter' => $sum_enter,
    				);
    	return $result;
    }

    public function count_servies_type_con($id_place,$type_service) //dem tungtheo tung loai dich vu
    {
    	$sum = 0;
    	$count_ser = DB::select('CALL count_service_city(?,?)',array($id_place,$type_service));
    		foreach ($count_ser as $s) {
    			return $sum = $s->count_ser;
    		}
    }

    public function get_all_place_city($idcity) // all place with city
    {
    	$result_p = DB::select("SELECT * FROM city_place_all AS c WHERE c.id = '$idcity'");

    	foreach ($result_p as $value) {
    		$lam = DB::select('CALL load_lancan(?)',array($value->id_place));
    		if ($lam == null) {}
			else
			{
				foreach ($lam as $s) {
	                    $sv_id      = $s->sv_id;
	                    $place_id   = $s->place_id;
	                    $sv_type    = $s->sv_types;
	                    $place_name = $s->pl_name;
	                    $image      = $s->image_details_1;
	                    $view 		= $s->sv_counter_view;
	                    $point      = $s->sv_counter_point;
	                    $likes = DB::table('vnt_likes')->where('service_id', '=',$sv_id)->count();
	                    $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv_id)->first();
	    		}
	    		$result[] = array(
	    			'sv_id'    =>$sv_id,
	    			'sv_type'  =>$sv_type,
					'id_place' =>$value->id_place,
					'image'    =>$image,
					'name'     =>$place_name,
					'view'	   =>$view,
					'point'	   =>$point,
					'like'     =>$likes,
					'rating'   =>$ratings
	    		);
			}

    	}

    	if (!isset($result)) {
    		return "null";
    	}
    	else{
    		return $result;
    	}
    }

    public function get_all_place_city_type($idcity,$type) // all place with city
    {
    	$result_p = DB::select("SELECT * FROM city_place_all AS c WHERE c.id = '$idcity'");

    	foreach ($result_p as $value) {
    		$lam = DB::select('CALL load_service_city(?,?)',array($value->id_place,$type));
    		if ($lam == null) {
    		}
    		else{
				foreach ($lam as $s) {
	                    $sv_id      = $s->sv_id;
	                    $place_id   = $s->place_id;
	                    $sv_type    = $s->sv_types;
	                    $place_name = $s->pl_name;
	                    $image      = $s->image_details_1;
	                    $view 		= $s->sv_counter_view;
	                    $point      = $s->sv_counter_point;
	                    $likes = DB::table('vnt_likes')->where('service_id', '=',$sv_id)->count();
	                    $ratings = DB::table('vnt_visitor_ratings')->where('service_id',$sv_id)->first();
	    		}

	    		$result[] = array(
	    			'sv_id'    =>$sv_id,
	    			'sv_type'  =>$sv_type,
					'id_place' =>$value->id_place,
					'image'    =>$image,
					'name'     =>$place_name,
					'view'	   =>$view,
					'point'	   =>$point,
					'like'     =>$likes,
					'rating'   =>$ratings
	    		);
    		}

    	}
    	if (!isset($result)) {
    		return "null";
    	}
    	else{
    		return $result;
    	}

    }
}
