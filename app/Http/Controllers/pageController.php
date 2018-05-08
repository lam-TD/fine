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
        return view('VietNamTour.content.place');
    }

    public function loadPalce()
    {
        return view('VietNamTour.content.place');
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
    

    // page Search
    public function getpageSearch(Request $request)
    {
        $keyword = $request->keyword;
        $id_city = $request->city;
        $id_type = $request->type;

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $flag = 0;
        $flag_con = 0;
        $result_all = array();

        if ($id_city == "all" && $id_type == "all") {
            $response = $client->request('GET',"search-all/keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            $count_type = array();

            if (isset($result) && $result != null) {
            
                if ($result->eat != null) {
                    $result_all = array_merge($result_all,$result->eat);
                    $count_type['eat'] = count($result->eat);
                }
                else{$count_type['eat'] = 0;}

                if ($result->hotel != null) {
                    $result_all = array_merge($result_all,$result->hotel);
                    $count_type['hotel'] = count($result->hotel);
                }
                else{$count_type['hotel'] = 0;}

                if ($result->tran != null) {
                    $result_all = array_merge($result_all,$result->tran);
                    $count_type['tran'] = count($result->tran);
                }
                else{$count_type['tran'] = 0;}

                if ($result->see != null) {
                    $result_all = array_merge($result_all,$result->see);
                    $count_type['see'] = count($result->see);
                }
                else{$count_type['see'] = 0;}


                if ($result->enter != null) {
                    $result_all = array_merge($result_all,$result->enter);
                    $count_type['enter'] = count($result->enter);
                }
                else{ $count_type['enter'] = 0; }

                // luu gi tri theo loai
                if ($id_type == 1) {
                    $result_all_type = $result->eat;
                }
                if ($id_type == 2) {
                    $result_all_type = $result->hotel;
                }
                if ($id_type == 3) {
                    $result_all_type = $result->tran;
                }
                if ($id_type == 4) {
                    $result_all_type = $result->see;
                }
                if ($id_type == 5) {
                    $result_all_type = $result->enter;
                }
                
                $flag_con = 0;
                if (!isset($result_all_type)) {
                    $result_all_type = null;
                }
            }
            // return $result_all;
        }
        else if($id_city != "all" && $id_type == "all"){
            //search-city-alltype/{idcity}&keyword={key}
            $response = $client->request('GET',"search-city-alltype/{$id_city}&keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            if (isset($result) && $result != null) {
            
                if ($result->eat != null) {
                    $result_all = array_merge($result_all,$result->eat);
                    $count_type['eat'] = count($result->eat);
                }
                else{$count_type['eat'] = 0;}

                if ($result->hotel != null) {
                    $result_all = array_merge($result_all,$result->hotel);
                    $count_type['hotel'] = count($result->hotel);
                }
                else{$count_type['hotel'] = 0;}

                if ($result->tran != null) {
                    $result_all = array_merge($result_all,$result->tran);
                    $count_type['tran'] = count($result->tran);
                }
                else{$count_type['tran'] = 0;}

                if ($result->see != null) {
                    $result_all = array_merge($result_all,$result->see);
                    $count_type['see'] = count($result->see);
                }
                else{$count_type['see'] = 0;}


                if ($result->enter != null) {
                    $result_all = array_merge($result_all,$result->enter);
                    $count_type['enter'] = count($result->enter);
                }
                else{ $count_type['enter'] = 0; }

                // luu gi tri theo loai
                if ($id_type == 1) {
                    $result_all_type = $result->eat;
                }
                if ($id_type == 2) {
                    $result_all_type = $result->hotel;
                }
                if ($id_type == 3) {
                    $result_all_type = $result->tran;
                }
                if ($id_type == 4) {
                    $result_all_type = $result->see;
                }
                if ($id_type == 5) {
                    $result_all_type = $result->enter;
                }
                
                $flag_con = (int)$id_type;
                if (!isset($result_all_type)) {
                    $result_all_type = null;
                }
            }
            $flag = 1;
            // return $result_all;
            
        }
        else if ($id_city == "all" && $id_type != "all") {
            $response = $client->request('GET',"search-all/keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            $count_type = array();
            $flag = 1;
            if (isset($result) && $result != null) {

                if ($result->eat != null) {
                    $result_all = array_merge($result_all,$result->eat);
                    $count_type['eat'] = count($result->eat);
                }
                else{$count_type['eat'] = 0;}

                if ($result->hotel != null) {
                    $result_all = array_merge($result_all,$result->hotel);
                    $count_type['hotel'] = count($result->hotel);
                }
                else{$count_type['hotel'] = 0;}

                if ($result->tran != null) {
                    $result_all = array_merge($result_all,$result->tran);
                    $count_type['tran'] = count($result->tran);
                }
                else{$count_type['tran'] = 0;}

                if ($result->see != null) {
                    $result_all = array_merge($result_all,$result->see);
                    $count_type['see'] = count($result->see);
                }
                else{$count_type['see'] = 0;}


                if ($result->enter != null) {
                    $result_all = array_merge($result_all,$result->enter);
                    $count_type['enter'] = count($result->enter);
                }
                else{ $count_type['enter'] = 0; }

                // luu gi tri theo loai
                if ($id_type == 1) {
                    $result_all_type = $result->eat;
                }
                if ($id_type == 2) {
                    $result_all_type = $result->hotel;
                }
                if ($id_type == 3) {
                    $result_all_type = $result->tran;
                }
                if ($id_type == 4) {
                    $result_all_type = $result->see;
                }
                if ($id_type == 5) {
                    $result_all_type = $result->enter;
                }
                
                $flag_con = (int)$id_type;
                if (!isset($result_all_type)) {
                    $result_all_type = null;
                }
            }
            // return $flag;
        }
        else{
            $response = $client->request('GET',"search-city-type/{$id_city}&type={$id_type}&keyword={$keyword}");
            $result_all = json_decode($response->getBody()->getContents());
            // return $result_all;
            if ($result_all != null) {
                foreach ($result_all as $value) {
                    $mangghe[] = array(
                        'name' => $value->name,
                        'image'             => $value->image,
                        'name_city'         => $value->name_city,
                        'like'              => $value->like,
                        'view'              => $value->view,
                        'point'             => $value->point,
                        'rating'            => $value->rating,
                        'sv_type'           => $value->sv_type    
                    );
                }
            }
            else{ $mangghe = null; }    
                
            $flag = 3;
            // return $mangghe;
        }

        // return $result_all;
        if ($result_all == null) {
            $count = 0;
        }
        else{
            $count = count($result_all);
        }
            
        // return $flag;
        // var_dump($flag_con);
        // return $flag_con;
        return view('VietNamtour.content.pageSearch',compact('result_all','keyword','count','count_type','flag','flag_con','mangghe','result_all_type'));
    }

    public function conSearch($id_city,$id_type,$keyword,$select_type)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://chinhlytailieu/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);


        if ($id_city == "all" && $id_type == "all") 
        {
            $response = $client->request('GET',"search-all/keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            if ($select_type == 1) {
                $result_all_type = $result->eat;
            }
            if ($select_type == 2) {
                $result_all_type = $result->hotel;
            }
            if ($select_type == 3) {
                $result_all_type = $result->tran;
            }
            if ($select_type == 4) {
                $result_all_type = $result->see;
            }
            if ($select_type == 5) {
                $result_all_type = $result->enter;
            }
            
            return $result_all_type;
        }
        else if ($id_city != "all" && $id_type == "all") 
        {
            $response = $client->request('GET',"search-city-alltype/{$id_city}&keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            if ($select_type == 1) {
                $result_all_type = $result->eat;
            }
            if ($select_type == 2) {
                $result_all_type = $result->hotel;
            }
            if ($select_type == 3) {
                $result_all_type = $result->tran;
            }
            if ($select_type == 4) {
                $result_all_type = $result->see;
            }
            if ($select_type == 5) {
                $result_all_type = $result->enter;
            }
            
            return $result_all_type;
        }
        else if ($id_city == "all" && $id_type != "all")
        {
            $response = $client->request('GET',"search-allcity-type/type={$id_type}&keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            return $result;
            if ($select_type == 1) {
                $result_all_type = $result->eat;
            }
            if ($select_type == 2) {
                $result_all_type = $result->hotel;
            }
            if ($select_type == 3) {
                $result_all_type = $result->tran;
            }
            if ($select_type == 4) {
                $result_all_type = $result->see;
            }
            if ($select_type == 5) {
                $result_all_type = $result->enter;
            }
            
            return $result_all_type;
        }
        else
        {
            return null;
        }
    }

}
