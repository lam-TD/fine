<?php

namespace App\Http\Controllers;
use usersModel;
use Session;
// use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\servicesModel;
use App\Http\Controllers\SearchController;
use App\touristPlacesModel;
use App\provincecityModel;
use Illuminate\Database\Eloquent\Colection;
use Illuminate\Support\Facades\Auth;
use Validator;
use GuzzleHttp\Client;

class pageController extends Controller
{
    // $path = "http://chinhlytailieu/vntour_api/";
    public function layindex()
    {
        return view('VietNamTour.content.index');
    }

    public function getindex()
    {   
        $placecount       = $this::count_city_service_all_image();

        $services_eat     = $this::gettypeService(1,8);
        $services_hotel   = $this::gettypeService(2,6);
        $services_tran    = $this::gettypeService(3,8);
        // dd($services_tran);
        $services_see     = $this::gettypeService(4,8);
        $services_enter   = $this::gettypeService(5,8);

        $checkLogin = $this::check_Login();

        // dd($services_hotel);
    	return view('VietNamTour.content.index',compact('placecount','services_hotel','services_eat','services_enter','services_see','services_tran','checkLogin'));
    }

    public function getlogin()
    {
    	return view('VietNamTour.login');
    }

    public function getregister()
    {
        return view('VietNamTour.register');
    }

    public function getregisterSuccess()
    {
        return view('VietNamTour.registerSuccess');
    }

    public function getuser()
    {
        return view('VietNamTour.user');
    }

    public function getdetail($idservices,$type)
    {
        $placecount       = $this::count_place_display();
        $detailServices = $this::getServiceType($idservices,$type);
        $place = $this::findplace_service($idservices);
        
        $dichvulancan = $this::searchServicesVicinity($place->pl_latitude,$place->pl_longitude,5,5000);
        // print_r($dichvulancan)
        $lam = var_dump($dichvulancan);
        // dd($lam);
        return view('VietNamTour.content.detail',compact('placecount','detailServices','dichvulancan'));
    }

    public function getaddplace()
    {
        return view('VietNamTour.addplace');
    }

    public function getaddservice()
    {
        return view('VietNamTour.addservice');
    }

    // funtion

    


    //=============================== NEW ===========================================



    public function numberToK($num)
    {
        if ($num >= 1000) {
            $n = $num / 1000; // phan nguyen
            $d = $num % 1000; // phan du
            if ($d > 100) {
                $c = $d/100;
                return $n.$c."K";
            }
            else{
                return $n."K";
            }
        }
        else{
            return $num;
        }
    }



    //================================= LOGIN-LOGOUT =====================================

    public function LoginSession(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"loginpost/user={$username}&pass={$password}");
        $lam = json_decode($response->getBody()->getContents());
        
        if ($lam != null) {
            Session()->put('login',true);  
            Session()->put('user_info',$lam);
            return redirect('/');
        }
        else{
            return redirect()->back()->with(['erro'=>'Tên tài khoản hoặc mật khẩu không đúng','userold'=>$username]);
        }
            
    }

    public function LogoutSession()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"logoutW");
        Session()->flush();
        return redirect()->back();
    }

    // api
    public function gettypeService($type, $take)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"getServicesTake/type={$type}&id={$take}");

        return json_decode($response->getBody()->getContents());
    }

    public function check_Login()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"checklogin");

        return json_decode($response->getBody()->getContents());
    }

    public function count_city_service_all_image()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"count_city_service_all_image");

        return json_decode($response->getBody()->getContents());
    }
    
}
