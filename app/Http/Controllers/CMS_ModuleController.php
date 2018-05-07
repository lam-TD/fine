<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Colection;
use App\usersModel;
class CMS_ModuleController extends Controller
{
	public function _GET_MONTH()
	{
		$date=  Carbon::now();
		$month[] = array();
		$minus_five = '-5 month';
		$minus_four = '-4 month';
		$minus_three = '-3 month';
		$minus_two = '-2 month';
		$minus_one = '-1 month';
		$minus_zero = '-0 month';
		$month_temp=0;
		for($i = 0; $i <= 5; $i++)
		{
			if($i==0)
			{
				$month_temp = $minus_zero;
			}
			else if($i==1)
			{
				$month_temp = $minus_one;
			}
			else if($i==2)
			{
				$month_temp = $minus_two;
			}
			else if($i==3)
			{
				$month_temp = $minus_three;
			}
			else if($i==4)
			{
				$month_temp = $minus_four;
			}
			else
			{
				$month_temp = $minus_five;
			}
			$month_year = strtotime ( $month_temp , strtotime ( $date ) ) ;
			$month_year = date ( 'Y-m-j' , $month_year );
			$month[$i] = date("m",strtotime($month_year));
		}
		return $month;
	}

	public function _GET_YEAR()
	{
		$date=  Carbon::now();
		$year[] = array();
		$minus_five = '-5 month';
		$minus_four = '-4 month';
		$minus_three = '-3 month';
		$minus_two = '-2 month';
		$minus_one = '-1 month';
		$minus_zero = '-0 month';
		$month_temp=0;
		for($i = 0; $i <= 5; $i++)
		{
			if($i==0)
			{
				$month_temp = $minus_zero;
			}
			else if($i==1)
			{
				$month_temp = $minus_one;
			}
			else if($i==2)
			{
				$month_temp = $minus_two;
			}
			else if($i==3)
			{
				$month_temp = $minus_three;
			}
			else if($i==4)
			{
				$month_temp = $minus_four;
			}
			else
			{
				$month_temp = $minus_five;
			}
			$month_year = strtotime ( $month_temp , strtotime ( $date ) ) ;
			$month_year = date ( 'Y-m-j' , $month_year );
			$year[$i] = date("Y",strtotime($month_year));
		}

		return $year;
	}

	public function _DISPLAY_NEW_SERVICES()
	{
		$month = $this::_GET_MONTH();
		$year = $this::_GET_YEAR();
		$data_1 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[0])
		->whereYear('created_at', '=', $year[0])
		->where('sv_status', '=', 1)
		->count();
		$data_2 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[1])
		->whereYear('created_at', '=', $year[1])
		->where('sv_status', '=', 1)
		->count();
		$data_3 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[2])
		->whereYear('created_at', '=', $year[2])
		->where('sv_status', '=', 1)
		->count();
		$data_4 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[3])
		->whereYear('created_at', '=', $year[3])
		->where('sv_status', '=', 1)
		->count();
		$data_5 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[4])
		->whereYear('created_at', '=', $year[4])
		->where('sv_status', '=', 1)
		->count();
		$data_6 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[5])
		->whereYear('created_at', '=', $year[5])
		->where('sv_status', '=', 1)
		->count();
		$string = $data_6.','.$data_5.','.$data_4.','.$data_3.','.$data_2.','.$data_1;
		return $string;
	}
	public function _DISPLAY_NEW_TOURIST_PLACES()
	{
		$month = $this::_GET_MONTH();
		$year = $this::_GET_YEAR();
		$data_1 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[0])
		->whereYear('created_at', '=', $year[0])
		->where('pl_status', '=', 1)
		->count();
		$data_2 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[1])
		->whereYear('created_at', '=', $year[1])
		->where('pl_status', '=', 1)
		->count();
		$data_3 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[2])
		->whereYear('created_at', '=', $year[2])
		->where('pl_status', '=', 1)
		->count();
		$data_4 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[3])
		->whereYear('created_at', '=', $year[3])
		->where('pl_status', '=', 1)
		->count();
		$data_5 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[4])
		->whereYear('created_at', '=', $year[4])
		->where('pl_status', '=', 1)
		->count();
		$data_6 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[5])
		->whereYear('created_at', '=', $year[5])
		->where('pl_status', '=', 1)
		->count();
		$string = $data_6.','.$data_5.','.$data_4.','.$data_3.','.$data_2.','.$data_1;
		return $string;
	}

	public function _COUNTER_WAITING_SERVICES_ACTIVE()
	{
		$data_not_active = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->where('sv_status', '!=', 1)
		->count();
		$data_all = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->count();
		$total = (($data_all - $data_not_active)/$data_all)*100;
		$sum = 100 -$total;
		//hàm CEIL lấy số nguyên
		return CEIL($sum);
	}

	public function _COUNTER_WAITING_TOURIST_ACTIVE()
	{
		$data_not_active = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->where('pl_status','!=',1)
		->count();
		$data_all = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->count();
		$total = (($data_all - $data_not_active)/$data_all)*100;
		$sum = 100 - $total;

		//hàm CEIL lấy số nguyên
		return CEIL($sum);
	}

	public function _COUNTER_WAITING_USER_ACTIVE()
	{
		
		$data_not_active_tour_guide = DB::table('vnt_tour_guide')
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->where('account_active', '!=', 1)
		->count();
		$data_not_active_partner = DB::table('vnt_partner_user')
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->where('account_active', '!=', 1)
		->count();
		$data_not_active = $data_not_active_tour_guide + $data_not_active_partner;
		$data_all_partner = DB::table('vnt_partner_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->count();
		$data_all_tour_guide = DB::table('vnt_tour_guide') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->count();
		$data_all = $data_all_partner + $data_all_tour_guide;
		$total = (($data_all - $data_not_active)/$data_all)*100;
		$sum = 100 - $total;
		return CEIL($sum);
	}

	//Hàm này trả về chuỗi giá trị in ra mảng _ chuỗi dữ liệu đếm người dùng
	public function _DISPLAY_NEW_USER()
	{

		$month = $this::_GET_MONTH();
		$year = $this::_GET_YEAR();
		$data_1 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[0])
		->whereYear('created_at', '=', $year[0])
        ->count();

		$data_2 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month[1])
		->whereYear('created_at', '=', $year[1])
        ->count();

		$data_3 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month[2])
		->whereYear('created_at', '=', $year[2])
        ->count();

		$data_4 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month[3])
		->whereYear('created_at', '=', $year[3])
        ->count();

		$data_5 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month[4])
		->whereYear('created_at', '=', $year[4])
        ->count();

		$data_6 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month[5])
		->whereYear('created_at', '=', $year[5])
        ->count();
		$string = $data_6.','.$data_5.','.$data_4.','.$data_3.','.$data_2.','.$data_1;
		return $string;
	}


	public function _DISPLAY_USER_PARTNER_MODERATOR()
	{
		$data_all_guide = DB::table('vnt_tour_guide') 
		->select('username', 'vnt_user.user_id')
		->join('vnt_user', 'vnt_user.user_id', '=', 'vnt_tour_guide.user_id')
		->where('vnt_tour_guide.account_active', '=',1)
		->orderBy('vnt_user.username', 'ASC')
		->paginate(10);
		return $data_all_guide;
	}

	public function Couter_User_Six_Month()
	{	
		$string = "";
		$string = $this::_DISPLAY_NEW_USER();
		$arr = explode(',', $string);
		$sum = $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4] + $arr[5];
		return $sum;
	}

	public function Couter_Places_Six_Month()
	{	
		$string = "";
		$string = $this::_DISPLAY_NEW_TOURIST_PLACES();
		$arr = explode(',', $string);
		$sum = $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4] + $arr[5];
		return $sum;
	}
	public function Couter_Services_Six_Month()
	{	
		$string = "";
		$string = $this::_DISPLAY_NEW_SERVICES();
		$arr = explode(',', $string);
		$sum = $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4] + $arr[5];
		return $sum;
	}
	public function _DISPLAY_TASK_LIST()
	{
		$data = DB::table('vnt_task') 
		->select( DB::raw('DATE_FORMAT(date_start, "%d-%m-%Y") as date_start'),
			'task_title', 'vnt_task.id')
		// ->join('vnt_user.user_id', '=', 'vnt_task.user_id')
		// ->join('vnt_user.user_id', '=', 'vnt_tour_guide.user_id')
		->where('status', '=', 1)
		->orderBy('vnt_task.id', 'desc')
		->limit(10)
		->get();
		return $data;
	}

	public function _DISPLAY_PROVINCE_CITY()
	{
		$data = DB::table('vnt_province_city') 
		->select('id', 'province_city_name')
		->orderBy('vnt_province_city.province_city_name', 'ASC')
		->get();
		return $data;
	}

	public function _DISPLAY_DISTRICT()
	{
		$data = DB::table('vnt_district') 
		->select('id', 'district_name','province_city_id')
		->where('vnt_district.enable' , '=', 1)
		->orderBy('vnt_district.district_name', 'ASC')
		->get();
		return $data;
	}
	public function _DISPLAY_WARD()
	{
		$data = DB::table('vnt_ward') 
		->select('id', 'ward_name','district_id', 'latitude','longtitude')
		->where('vnt_ward.enable',  '=', 1)
		->orderBy('vnt_ward.ward_name', 'ASC')
		->get();
		return $data;
	}


	public function _DISPLAY_PERCENT_USER()
	{
		$month = $this::_GET_MONTH();
		$year = $this::_GET_YEAR();
		$data_1 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[0])
		->whereYear('created_at', '=', $year[0])
        ->count();
        $data_2 = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
        ->whereMonth('created_at', '=', $month[1])
		->whereYear('created_at', '=', $year[1])
        ->count();
        $tmp = 0;
        if($data_2 == 0 )
        {
        	$tmp = 1;
        }
        else{
        	$tmp = $data_2;
        }
        $percent =  (($data_1-$data_2)/$tmp)*100;
        return CEIL($percent);
	}


	public function _DISPLAY_PERCENT_PLACES()
	{
		$month = $this::_GET_MONTH();
		$year = $this::_GET_YEAR();
		$data_1 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[0])
		->whereYear('created_at', '=', $year[0])
		->where('pl_status', '=', 1)
		->count();
		$data_2 = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[1])
		->whereYear('created_at', '=', $year[1])
		->where('pl_status', '=', 1)
		->count();
        $tmp = 0;
        if($data_2 == 0 )
        {
        	$tmp = 1;
        }
        else{
        	$tmp = $data_2;
        }
        $percent =  (($data_1-$data_2)/$tmp)*100;
        return CEIL($percent);
	}

	public function _DISPLAY_PERCENT_SERVICES()
	{
		$month = $this::_GET_MONTH();
		$year = $this::_GET_YEAR();
		$data_1 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[0])
		->whereYear('created_at', '=', $year[0])
		->where('sv_status', '=', 1)
		->count();
		$data_2 = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as created_at'))
		->whereMonth('created_at', '=', $month[1])
		->whereYear('created_at', '=', $year[1])
		->where('sv_status', '=', 1)
		->count();
        $tmp = 0;
        if($data_2 == 0 )
        {
        	$tmp = 1;
        }
        else{
        	$tmp = $data_2;
        }
        $percent =  (($data_1-$data_2)/$tmp)*100;
        return CEIL($percent);
	}

    public function getDashboard(){


		$data_couter_user_six_month =  $this::Couter_User_Six_Month();
		$data_couter_user_one_month = $this::_DISPLAY_NEW_USER();
		// return $data_couter_places_one_month;
		$data_couter_places_six_month =  $this::Couter_Places_Six_Month();
		$data_couter_places_one_month = $this::_DISPLAY_NEW_TOURIST_PLACES();
		$data_couter_services_six_month =  $this::Couter_Services_Six_Month();
		$data_couter_services_one_month = $this::_DISPLAY_NEW_SERVICES();
		$data_counter_services_not_active = $this::_COUNTER_WAITING_SERVICES_ACTIVE();
		$data_counter_places_not_active = $this::_COUNTER_WAITING_TOURIST_ACTIVE();
		$data_counter_user_not_active = $this::_COUNTER_WAITING_USER_ACTIVE();
		$data_task_list = $this::_DISPLAY_TASK_LIST();
		$data_task_list_guide =  $this::_DISPLAY_USER_PARTNER_MODERATOR();
		$data_percent_user = $this::_DISPLAY_PERCENT_USER();
		$data_percent_place = $this::_DISPLAY_PERCENT_PLACES();
		$data_percent_services = $this::_DISPLAY_PERCENT_SERVICES();
    	if (view()->exists('view.CMS.master')){return view('CMS.components.error');}
    	else	{
			return view('CMS.master', [
					'data1'=>$data_couter_user_one_month,
					'data2'=>$data_couter_user_six_month,
					'data3'=>$data_couter_places_six_month,
					'data4'=>$data_couter_places_one_month,
					'data5'=>$data_couter_services_six_month,
					'data6'=>$data_couter_services_one_month,
					'data7'=>$data_counter_services_not_active,
					'data8'=>$data_counter_places_not_active,
					'data9'=>$data_counter_user_not_active,
					'data10'=>$data_task_list,
					'data11'=>$data_task_list_guide,
					'data12'=>$data_percent_user,
					'data13'=>$data_percent_place,
					'data14'=>$data_percent_services,
			]);
		}

	}



	public function _GETVIEW_ADD_TOURIST_PLACES()
	{
		if (view()->exists('view.CMS.components.com_tourist_places.add_tourist_places')){return view('CMS.components.error');}
    	else	{
			return view('CMS.components.com_tourist_places.add_tourist_places',[
				'data1'=>$this::_DISPLAY_PROVINCE_CITY(),
				'data2'=>$this::_DISPLAY_DISTRICT(),
				'data3'=>$this::_DISPLAY_WARD(),

			]);
		}
	}
	public function _GETVIEW_ADD_SERVICES()
	{
		if (view()->exists('view.CMS.components.com_services.add_services'))
		{
			return view('CMS.components.error');
		}
    	else	{
			
			return view('CMS.components.com_services.add_services');
		}
	}


}
 