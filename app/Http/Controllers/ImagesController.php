<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\imagesModel;
use DateTime;


class ImagesController extends Controller
{
    public function getIcon($service_id)
    {
        $url  = 'icons/';
        $string_replace = '","id":';
        $icon_image = DB::table('vnt_images') 
        ->select('image_details_1','id')
        ->where('service_id', $service_id)->get();
        $string_cutting_icons = $icon_image;
        $string_cutted_icons = substr ( $string_cutting_icons ,21);
        $arr[]= (explode ('","' , $string_cutted_icons));
        $image_name = ($arr[0][0]);
        $cutting_right= rtrim($string_cutted_icons, '"}]');
        $result =  str_replace($string_replace , '+', $cutting_right);
        $url_image = $url.$result.'+'.$image_name;
        return json_encode($url_image, JSON_UNESCAPED_SLASHES);
    }


    public function getBanner($service_id)
    {
        $url  = 'banners/';
        $string_replace = '","id":';
        $icon_image = DB::table('vnt_images') 
        ->select('image_banner','id')
        ->where('service_id', $service_id)
        ->where('image_status',1)
        ->get();
        //echo $icon_image;
        $string_cutting_icons = $icon_image;
        $string_cutted_icons = substr ( $string_cutting_icons ,18);
        $arr[]= (explode ('","' , $string_cutted_icons));
        $image_name = ($arr[0][0]);
        $cutting_right= rtrim($string_cutted_icons, '"}]');
        $result =  str_replace($string_replace , '+', $cutting_right);
        $url_image = $url.$result.'+'.$image_name;
        return json_encode($url_image, JSON_UNESCAPED_SLASHES);
    }

    public function getThumbnail1($service_id)
    {
        $url  = 'thumbnails/';
        $string_replace = '","id":';
        $thumb_image = DB::table('vnt_images') ->select('image_details_1','id')
        ->where('service_id', $service_id)->get();
        $string_cutting_icons = $thumb_image;
        $string_cutted_icons = substr ( $string_cutting_icons ,21);
        $arr[]= (explode ('","' , $string_cutted_icons));
        $image_name = ($arr[0][0]);
        $cutting_right= rtrim($string_cutted_icons, '"}]');
        $result =  str_replace($string_replace , '+', $cutting_right);
        $url_image = $url.$result.'+'.$image_name;
        return json_encode($url_image, JSON_UNESCAPED_SLASHES);
    }
    public function getThumbnail2($service_id)
    {
        $url  = 'thumbnails/';
        $string_replace = '","id":';
        $thumb_image = DB::table('vnt_images') ->select('image_details_2','id')
        ->where('service_id', $service_id)->get();
        $string_cutting_icons = $thumb_image;
        $string_cutted_icons = substr ( $string_cutting_icons ,21);
        $arr[]= (explode ('","' , $string_cutted_icons));
        $image_name = ($arr[0][0]);
        $cutting_right= rtrim($string_cutted_icons, '"}]');
        $result =  str_replace($string_replace , '+', $cutting_right);
        $url_image = $url.$result.'+'.$image_name;
        return json_encode($url_image, JSON_UNESCAPED_SLASHES);
    }
    public function getImageDetail1($service_id)
    {
        $url  = 'details1/';
        $string_replace = '","id":';
        $image_detail = DB::table('vnt_images') 
        ->select('image_details_1','id')
        ->where('service_id', $service_id)->get();
        $string_cutting_details = $image_detail;
        $string_cutted_details = substr ( $string_cutting_details ,21);
        $arr[]= (explode ('","' , $string_cutted_details));
        $image_name = ($arr[0][0]);
        $cutting_right= rtrim($string_cutted_details, '"}]');
        $result =  str_replace($string_replace , '+', $cutting_right);
        $url_image = $url.$result.'+'.$image_name;
        return json_encode($url_image, JSON_UNESCAPED_SLASHES);
    }
    public function getImageDetail2($service_id)
    {
        $url  = 'details2/';
        $string_replace = '","id":';
        $image_detail = DB::table('vnt_images') 
        ->select('image_details_2','id')
        ->where('service_id', $service_id)->get();
        $string_cutting_details = $image_detail;
        $string_cutted_details = substr ( $string_cutting_details ,21);
        $arr[]= (explode ('","' , $string_cutted_details));
        $image_name = ($arr[0][0]);
        $cutting_right= rtrim($string_cutted_details, '"}]');
        $result =  str_replace($string_replace , '+', $cutting_right);
        $url_image = $url.$result.'+'.$image_name;
        return json_encode($url_image, JSON_UNESCAPED_SLASHES);
    }


    public function Upload(Request $request, $id_service)
    {
        $date = date("Y_m_d");
        $timedate = date("h_i_s");
        $time = '_'.$date.'_'.$timedate;
        
        // $path_banner = public_path().'/banners/';
        // $path_details1 = public_path().'/details1/';
        // $path_details2 = public_path().'/details2/';
        // $path_icon = public_path().'/icons/';
        // $path_thumb = public_path().'/thumbnails/';

        $path_banner = '../../upload/img/banners/';
        $path_details1 = '../../upload/img/details1/';
        $path_details2 ='../../upload/img/details2/';
        $path_icon = '../../upload/img/icons/';
        $path_thumb = '../../upload/img/thumbnails/';

        //upload banner
        $file_banner = $request->file('banner');
        $image_banner = \Image::make($file_banner);
     
        $image_banner->resize(768,720);
        $image_banner->save($path_banner.'banner_'.$time.'.'.$file_banner->getClientOriginalExtension());
        $image_banner->resize(600,400);
        $image_banner->save($path_thumb.'banner_'.$time.'.'.$file_banner->getClientOriginalExtension());
        $image_banner->resize(50,50);
        $image_banner->save($path_icon.'banner_'.$time.'.'.$file_banner->getClientOriginalExtension());
        

        //upload chi tiet 1
        $file_details_1 = $request->file('details1');
        $image_details1 = \Image::make($file_details_1);
        $image_details1->resize(1280,720);
        $image_details1->save($path_details1.'details1_'.$time.'.'.$file_details_1->getClientOriginalExtension());
        $image_details1->resize(600,400);
        $image_details1->save($path_thumb.'details1_'.$time.'.'.$file_details_1->getClientOriginalExtension());
        $image_details1->resize(50,50);
        $image_details1->save($path_icon.'details1_'.$time.'.'.$file_details_1->getClientOriginalExtension());
        

        //upload chi tiet 2
        $file_details_2 = $request->file('details2');
        $image_details2 = \Image::make($file_details_2);
        $image_details2->resize(1280,720);
        $image_details2->save($path_details2.'details2_'.$time.'.'.$file_details_2->getClientOriginalExtension());
        $image_details2->resize(600,400);
        $image_details2->save($path_thumb.'details2_'.$time.'.'.$file_details_2->getClientOriginalExtension());
        $image_details2->resize(50,50);
        $image_details2->save($path_icon.'details2_'.$time.'.'.$file_details_2->getClientOriginalExtension());
                 

       // create images in model
        $thumbnail = new imagesModel();
        $thumbnail->image_banner = "banner_".$time.'.'.$file_banner->getClientOriginalExtension();
        $thumbnail->image_details_1 ="details1_".$time.'.'.$file_details_1->getClientOriginalExtension();
        $thumbnail->image_details_2 = "details2_".$time.'.'.$file_details_2->getClientOriginalExtension();
        $thumbnail->image_status =1;
        $thumbnail->service_id=$id_service;
        $thumbnail->save();
        return json_encode("status:200");
        
    } 
}
