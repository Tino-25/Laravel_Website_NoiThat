<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class LoginRegisterController extends Controller
{

    public function login_form(){
        $all_category = DB::table('tbl_categoryproduct')->get();
        return view('login')
                ->with('all_category', $all_category);
    }
    
    public function register_form(){
        $all_category = DB::table('tbl_categoryproduct')->get();
        return view('register')
        ->with('all_category', $all_category);
    }

    public function register(Request $request){
        $data = array();
        $data['lastName'] = $request->firstname;
        $data['firstName'] = $request->lastname;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['address'] = $request->address;
        $data['sex'] = $request->sex;
        $data['phone'] = $request->phone;
        DB::table('tbl_user')->insert($data);

        $result = DB::table('tbl_user')->where('email', $data['email'])->where('password', $data['password'])->first();
        if($result){
            Session::put('idUser', $result->idUser);
            Session::put('name', $result->firstName);
            Session::put('email', $result->email);
        }

        # nếu là đăng ký khi order thì qua show-cart - còn dk thường thì tới trang chủ
        if(isset($request->test)){
            return Redirect::to('/show-cart');
        }else{
            return Redirect::to('/');
        }

    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('tbl_user')->where('email', $email)->where('password', $password)->first();
        if($result){
            Session::put('name', $result->firstName);
            Session::put('idUser', $result->idUser);
            Session::put('email', $result->email);
            // return view('index');
            return Redirect::to('/');
        }else{
            Session::put('message','mat khau hoac email khong dung, nhap lai nhe');
            return Redirect::to('/login');

        }
    }

    public function login_admin_form(){
        return view('admin.login_admin');
    }

    public function login_admin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('tbl_user')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->where('idDivision', 1)
                    ->first();
        if($result){
            Session::put('name_admin', $result->firstName);
            Session::put('idUser_admin', $result->idUser);
            Session::put('email_admin', $result->email);
            // return view('index');
            return Redirect::to('/administrator');
        }else{
            Session::put('message','mat khau hoac email khong dung, nhap lai nhe');
            return Redirect::to('/administrator_login');

        }
    }

    public function logout_admin(){
        Session::put('name_admin', null);
        Session::put('idUser_admin', null);
        Session::put('email_admin', null);
        return Redirect::to('/administrator_login');
    }

    public function logout(){
        Session::put('email', null);
        Session::put('idUser', null);
        Session::put('name', null);
        return Redirect::to('/');
    }

}
