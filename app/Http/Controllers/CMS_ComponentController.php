<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Colection;
class CMS_ComponentController extends Controller
{
    public function _DISPLAY_LIST_ALL_USER()
    {
        $data = DB::table('vnt_user') 
		->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
		->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.list_user')){
            return view('CMS.components.com_user.list_user', ['data'=>$data]);
            
        }
    	else	{
			return view('CMS.components.error');
		}
    }

    public function _DISPLAY_LIST_ADMIN_USER()
    {
        $data = DB::table('vnt_user') 
        ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->join('vnt_admin_user', 'vnt_admin_user.user_id', '=', 'vnt_user.user_id')
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
        ->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.admin.list_admin')){
            return view('CMS.components.com_user.admin.list_admin', ['data'=>$data]);
        }
        else {
            return view('CMS.components.error');
        }
    }

    public function _DISPLAY_LIST_MODERATOR_USER()
    {
        $data = DB::table('vnt_user') 
        ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->join('vnt_moderator_users', 'vnt_moderator_users.user_id', '=', 'vnt_user.user_id')
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
        ->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.moderator.list_mod')){
            return view('CMS.components.com_user.moderator.list_mod', ['data'=>$data]);
        }
        else {
            return view('CMS.components.error');
        }
    }



    public function _DISPLAY_LIST_PARTNER()
    {
        $data = DB::table('vnt_user') 
        ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->join('vnt_partner_user', 'vnt_partner_user.user_id', '=', 'vnt_user.user_id')
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
        ->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.partner.list')){
            return view('CMS.components.com_user.partner.list', ['data'=>$data]);
        }
        else {
            return view('CMS.components.error');
        }
    }


    //     public function _DISPLAY_LIST_PARTNER()
    // {
    //     $data = DB::table('vnt_user') 
    //     ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
    //         'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
    //     )
    //     ->join('vnt_partner_user', 'vnt_partner_user.user_id', '=', 'vnt_user.user_id')
    //     ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
    //     ->join('vnt_active_accounts', 'vnt_active_accounts.user_moderator_id')
    //     ->orderBy('vnt_user.user_id', 'desc')
    //     ->paginate(4);
    //     // return $data;
    //     if (view()->exists('CMS.components.com_user.partner.list')){
    //         return view('CMS.components.com_user.partner.list', ['data'=>$data]);
    //     }
    //     else {
    //         return view('CMS.components.error');
    //     }
    // }

    
    public function _DISPLAY_LIST_ENTERPRISE()
    {
        $data = DB::table('vnt_user') 
        ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->join('vnt_enterprise_user', 'vnt_enterprise_user.user_id', '=', 'vnt_user.user_id')
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
        ->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.enterprise.list_enterprise')){
            return view('CMS.components.com_user.enterprise.list_enterprise', ['data'=>$data]);
        }
        else {
            return view('CMS.components.error');
        }
    }


    public function _DISPLAY_LIST_PERSIONAL()
    {
        $data = DB::table('vnt_user') 
        ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
        ->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.list_user')){
            return view('CMS.components.com_user.list_user', ['data'=>$data]);
        }
        else {
            return view('CMS.components.error');
        }
    }


    public function _DISPLAY_TOURIST_PLACES()
    {
        $data = DB::table('vnt_tourist_places') 
		->select( DB::raw('DATE_FORMAT(vnt_tourist_places.updated_at, "%d-%m-%Y") as updated_at'),
            'pl_name', 'pl_details','pl_address', 'pl_phone_number', 'pl_latitude', 'pl_longitude','pl_status', 'vnt_tourist_places.id'
        )       
        ->orderBy('vnt_tourist_places.id', 'desc')
        ->orderBy('vnt_tourist_places.updated_at', 'desc')
        ->paginate(15);
        // return $data;
        if (view()->exists('CMS.components.com_tourist_places.list_tourist_places'))
        {
            return view('CMS.components.com_tourist_places.list_tourist_places', ['data'=>$data]);
        }
    	else	{
			return view('CMS.components.error');
		}
		
    }




    public function _DISPLAY_LIST_SERVICES()
    {
        $data = DB::table('vnt_services') 
		->select( DB::raw('DATE_FORMAT(vnt_services.updated_at, "%d-%m-%Y") as updated_at'),
            'sv_description', 'sv_open','sv_close', 'sv_highest_price', 'sv_lowest_price',
             'sv_phone_number','sv_types', 'sv_website', 'vnt_hotels.hotel_name'
             , 'entertainments_name', 'sightseeing_name', 'transport_name', 'eat_name', 'sv_status'
        )     
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->where('vnt_services.sv_status', 1)
        ->orderBy('vnt_services.id', 'desc')
        ->orderBy('vnt_services.updated_at', 'desc')
        ->paginate(15);
        // return $data;
        if (view()->exists('CMS.components.com_services.list_services')){
            return view('CMS.components.com_services.list_services', ['data'=>$data]);
        }
    	else	{
			return view('CMS.components.error');
		}
    }


    public function _DISPLAY_LIST_SERVICES_BY_PLACESID($id)
    {
        $data = DB::table('vnt_services') 
        ->select( DB::raw('DATE_FORMAT(vnt_services.updated_at, "%d-%m-%Y") as updated_at'),
            'sv_description', 'sv_open','sv_close', 'sv_highest_price', 'sv_lowest_price',
             'sv_phone_number','sv_types', 'sv_website', 'vnt_hotels.hotel_name'
             , 'entertainments_name', 'sightseeing_name', 'transport_name', 'eat_name', 'sv_status', 'image_banner','vnt_services.id' 
        )
        ->join('vnt_tourist_places', 'vnt_tourist_places.id', '=', 'vnt_services.tourist_places_id')     
        ->leftJoin('vnt_events', 'vnt_events.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_hotels', 'vnt_hotels.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_eating', 'vnt_eating.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_entertainments', 'vnt_entertainments.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_sightseeing', 'vnt_sightseeing.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_images', 'vnt_images.service_id', '=', 'vnt_services.id')
        ->leftJoin('vnt_transport', 'vnt_transport.service_id', '=', 'vnt_services.id')
        ->where('vnt_services.tourist_places_id', $id)
        ->orderBy('vnt_services.id', 'desc')
        ->orderBy('vnt_services.updated_at', 'desc')
        ->paginate(15);
        return $data;
        
    }

    public function _DISPLAY_TOURIST_PLACES_DETAILS($id)
    {
         $data = DB::table('vnt_tourist_places') 
        ->select( DB::raw('DATE_FORMAT(vnt_tourist_places.updated_at, "%d-%m-%Y") as updated_at'), DB::raw('DATE_FORMAT(vnt_tourist_places.created_at, "%d-%m-%Y") as created_at'),
            'pl_name', 'pl_details','pl_address', 'pl_phone_number', 'pl_latitude', 'pl_longitude','pl_status', 'vnt_tourist_places.id','province_city_name','district_name','ward_name' 

        )
        ->leftJoin('vnt_tour_guide', 'vnt_tourist_places.user_tour_guide_id', '=', 'vnt_tour_guide.user_id')
        ->leftJoin('vnt_partner_user', 'vnt_tourist_places.user_partner_id', '=', 'vnt_partner_user.user_id')
        ->join('vnt_ward', 'vnt_tourist_places.id_ward', '=', 'vnt_ward.id')
        ->join('vnt_district', 'vnt_district.id', '=', 'vnt_ward.district_id')
        ->join('vnt_province_city', 'vnt_province_city.id', '=', 'vnt_district.province_city_id')
        ->where('vnt_tourist_places.id', $id)
        ->get();
        return $data;
    }

    public function _GET_VIEW_PLACES_DETAILS($id)
    {
        $service =  $this::_DISPLAY_LIST_SERVICES_BY_PLACESID($id);
        $place =  $this::_DISPLAY_TOURIST_PLACES_DETAILS($id);
        return view('CMS.components.com_tourist_places.tourist_places_details', ['data1'=>$service, 'data2'=>$place]);
    }



    public function _DISPLAY_LIST_TOURGUIDE()
    {
        $data = DB::table('vnt_user') 
        ->select( DB::raw('DATE_FORMAT(vnt_user.created_at, "%d-%m-%Y") as created_at'),
            'username', 'contact_name','social_login_id', 'contact_phone', 'contact_website', 'contact_email_address'
        )
        ->join('vnt_tour_guide', 'vnt_tour_guide.user_id', '=', 'vnt_user.user_id')
        ->leftJoin('vnt_contact_info', 'vnt_contact_info.user_id', '=', 'vnt_user.user_id')
        ->orderBy('vnt_user.user_id', 'desc')
        ->paginate(4);
        // return $data;
        if (view()->exists('CMS.components.com_user.tour_guide.list_tourguide')){
            return view('CMS.components.com_user.tour_guide.list_tourguide', ['data'=>$data]);
        }
        else {
            return view('CMS.components.error');
        }
    }

}
