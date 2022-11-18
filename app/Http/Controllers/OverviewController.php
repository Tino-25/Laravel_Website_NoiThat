<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class OverviewController extends Controller
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
        $order_0 = DB::table('tbl_order')->where('statusOrder', 0)->join('tbl_user', 'tbl_order.idUser', '=', 'tbl_user.idUser')->get();
        return view('admin.pages.overview')->with('order_0', $order_0);
    }
}
