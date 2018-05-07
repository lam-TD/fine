<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersModel;
use Auth;
use Validator;
use DB;
use Hash;
use Socialite;
use App\contact_infoModel;
class loginController extends Controller
{
    // web 
    public function postLoginW(Request $request)
    {
        $messages = [
            'required' => 'Trường bắt buộc nhập',
            'username.min'    => 'Tài khoản có độ dài từ 4-20 ký tự'
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4',
            'password' => 'required'
        ],$messages);
        if ($validator->fails()) {
            return redirect('loginW')->withErrors($validator)->withInput();
        } 
        else 
        {
            $username = $request->input('username');
            $pass = $request->input('password');
            if( Auth::attempt(['username' => $username, 'password' => $pass])) {
                return redirect('/');
                // return Auth::user()->user_id;
            } else {
                return redirect()->back()->with(['erro'=>'Tên tài khoản hoặc mật khẩu không đúng','userold'=>$username]);
            }
        }
    }

    public function logoutW()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registerW(Request $request)
    {
        $user = $request->input('username');
        $pass     = $request->input('password');
        $passold     = $request->input('passwordC');

        $messages = [
            'username.email'        => 'Không đúng định dạng email',
            'password.min'    => 'Tài khoản có độ dài từ 4-20 ký tự',
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'email|min:4',
            'password' => 'required:min:4'
        ],$messages);
        if ($validator->fails()) {
            return redirect('registerW')->withErrors($validator)->withInput();
        } 
        elseif ($this->check_username_existW($user)) {
            return redirect('registerW')->with(['userexist' => 'exist']);
        }
        elseif($pass != $passold){
            return redirect('registerW')->with(['password' => 'pass']);
        }
        else 
        {
            $username = $request->input('username');
            $pass     = $request->input('password');
            $userRegister                      = new usersModel();
            $userRegister->username            = $user;
            $userRegister->password            = bcrypt($pass);
            $userRegister->save();

            $lam = usersModel::where('username',$username)->first();

            $id_user = $lam->user_id;
            $contact = new contact_infoModel();
            $contact->user_id = $id_user;
            $contact->save();

            return redirect('registersuccess');
        }
    }

    function check_username_existW($user){
        $result = DB::table('vnt_user')
                        ->select('username')
                        ->where('username',$user)
                        ->get();
        foreach ($result as $value) {
            $erro = $value;
        }
        if (isset($erro))
            return true;
        else
            return false;  
    }
    // login facebook
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // dd($user);
        $social = usersModel::where('user_facebook_id',$user->id)->orWhere('username',$user->email)->first();
        if ($social) {
            Auth::login($social);
            return redirect('/');
        }
        else{
            $u = usersModel::create([
                'username'         => $user->email,
                'user_facebook_id' => $user->id,
                'user_groups_id'   => 1
            ]);
            $u->save();
            Auth::login($u);
            return redirect('/');
        }
    }

    // app
    public function postLogin(Request $request)
    {
        $rules = [
            'username' =>'required',
            'password' => 'required|min:4'
        ];
   
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $erro = array('result' => null,'error' => 2, 'status' => 'ERROR');
            return json_encode($erro);
        } 
        else 
        {
            $username = $request->input('username');
            $pass = $request->input('password');
            if( Auth::attempt(['username' => $username, 'password' =>$pass])) {

                // $contact = DB::select('CALL login_info(?)',array(Auth::user()->user_id));
                $result = DB::select('CALL login_info_phone(?)',array(Auth::user()->user_id));
                // dd($result);
                $level = "personal";
                foreach ($result as $result) {
                    if ($result->admin != null) {
                        $level = "admin";
                    }
                    else if($result->moderator != null){
                        $level = "moderator";
                    }
                    else if($result->partner != null){
                        $level = "partner";
                    }
                    else if($result->enterprise != null){
                        $level = "enterprise";
                    }
                    else if($result->tour_guide != null){
                        $level = "tour_guide";
                    }
    
                    $result_info = array(
                        'id' => $result->user_id,
                        'username' =>$result->username,
                        'avatar' =>$result->contact_avatar,
                        'level' =>$level
                    );
                }
                $result_user['result'] = $result_info;  
                $result_user['error'] = null;
                $result_user['status'] = "OK";
                return json_encode($result_user);
            } else {
                $erro = array('result' => null,'error' => 1, 'status' => 'ERROR');
                return json_encode($erro);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        if (!Auth::check()) {
            $logout = array('error' => null, 'status' => 'OK');
            return json_encode($logout);
        }
    }
    public function logout_api()
    {
        // if (Auth::check()) {
        //     $user = Auth::logout();
        //     return "Bạn đã đăng xuất"; 
        // }
        // else
        //     echo "loi";
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();
        return ("Bạn đã đăng xuất"); 
    }

    public function register(Request $request)
    {
        // $erro = (
        //     '1' => 'Tên tài khoản và mật khẩu không được để trống',
        //     '2' => 'Mật khẩu phải có độ dài từ 6-20 ký tự',
        //     '3' => 'Tên tài khoản đã tồn tại',
        //     '4' => 'Tài khoản có độ dài từ 5-25 ký tự',
        //     '5' => 'Đăng ký thành công'
        // )

        $user = $request->input('username');
        $password = $request->input('password');
        $country  = $request->input('country');
        $language  = $request->input('language');
 
        if (empty($user) || empty($password)) // kiểm tra rỗng
            $erro['error'] = 1;
        else if (strlen($password) < 6 || strlen($password) > 20) //kiểm tra độ dài pass
            $erro['error'] = 2;
        else if (strlen($user) < 5 || strlen($user) > 25) // kiểm tra độ dài tên tài khoản
            $erro['error'] = 4;
        else if ($this->check_username_exist($user) == "false") // kiểm tra tài khoản tồn tại
            $erro['error'] = 3;
        if (isset($erro)) {
            $erro['status'] = "ERROR";
            return json_encode($erro);
        }
        else
        {
            $userRegister                      = new usersModel();
            $userRegister->username      	   = $user;
            $userRegister->password            = bcrypt($password);
            
            $userRegister->save();
            $erro = array('error' => null, 'status' => 'OK');
            return json_encode($erro);
        }
    }

    function check_username_exist($user){
        $result = DB::table('vnt_user')
                        ->select('username')
                        ->where('username',$user)
                        ->get();
        foreach ($result as $value) {
            $erro = $value;
        }
        if (isset($erro))
            return "false";
        else
            return "true";  
    }
}
