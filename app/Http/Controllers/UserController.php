<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();

class UserController extends Controller
{
    public function authentication(){
        if(Session::get('name_admin') == null && Session::get('idUser_admin')  == null && Session::get('email_admin') == null ){
            return Redirect::to('/administrator_login')->send();
        }else{
            return Redirect::to('/administrator');
        }
    }

    public function index(){
        $this->authentication();
        $all_user = DB::table('tbl_user')->get();
        return view('admin.pages.user.list_user')->with('all_user', $all_user);
    }

    public function formAdd(){
        $this->authentication();
        $all_division = DB::table('tbl_divisionUser')->get();
        return view('admin.pages.user.add_user')->with('all_division', $all_division);
    }

    public function addUser(Request $request){
        $this->authentication();
        $data = array();
        $data['idDivision'] = $request->division;
        $data['lastName'] = $request->lastName;
        $data['firstName'] = $request->firstName;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['address'] = $request->address;
        $data['sex'] = $request->sex;
        $data['phone'] = $request->phone;
        DB::table('tbl_user')->insert($data);
        return Redirect::to('user-list');
    }

    public function detailUser($idUser){
        $this->authentication();
        $detailsUser = DB::table('tbl_user')->where('idUser', $idUser)->get();
        return view('admin.pages.user.detail_user')->with('detailsUser', $detailsUser);
    }

    public function deleteUser($idUser){
        $this->authentication();
        DB::table('tbl_user')->where('idUser', $idUser)->delete();
        return Redirect::to('user-list');
    }

    public function formUpdate_user($idUser){
        $this->authentication();
        $all_division = DB::table('tbl_divisionuser')->get();
        $detailsUser = DB::table('tbl_user')->where('idUser', $idUser)->get();
        return view('admin.pages.user.update_user')->with('all_division', $all_division)->with('detailsUser', $detailsUser);
    }

    public function updateUser($idUser, Request $request){
        $this->authentication();
        $data = array();
        $data['idDivision'] = $request->division;
        $data['lastName'] = $request->lastName;
        $data['firstName'] = $request->firstName;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['address'] = $request->address;
        $data['sex'] = $request->sex;
        $data['phone'] = $request->phone;

        DB::table('tbl_user')->where('idUser', $idUser)->update($data);
        return Redirect::to('user-list');
    }

}
