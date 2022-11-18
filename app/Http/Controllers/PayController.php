<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Cart;

session_start();

class PayController extends Controller
{
    public function user_order(){
        $all_category = DB::table('tbl_categoryproduct')->get();
        return view('pages.user_order')
        ->with('all_category', $all_category);
    }

    public function order(){
        $all_category = DB::table('tbl_categoryproduct')->get();
        $user = DB::table('tbl_user')->where('idUser', Session::get('idUser'))->get();
        return view('pages.order')
        ->with('all_category', $all_category)
        ->with('user', $user);
    }

    public function add_order_orderdetails(Request $request){
        $data_order = array();
        $data_order['idUser'] = Session::get('idUser');

        //idproduct-soluongmua--   vd:  1-2--5-1--
        $data_orderdetails_string = $request->stringOrderDetails;

        $id_inser_order = DB::table('tbl_order')->insertGetId($data_order);
        if($id_inser_order){
            $data_orderdetails_explode = explode('--', $data_orderdetails_string);
            foreach($data_orderdetails_explode as $key=>$item){
                if($item!=''){
                    $i = explode('-', $item);
                    $idProduct = $i['0'];
                    $soluong = $i['1'];
                    $data_orderdetails = array();
                    $data_orderdetails['idProduct'] = $idProduct;
                    $data_orderdetails['idOrder'] = $id_inser_order;
                    $data_orderdetails['quantityOrder'] = $soluong;
                    $data_orderdetails['discount'] = 0;
                    $id_inser_orderdetails = DB::table('tbl_orderdetail')->insertGetId($data_orderdetails);
                }
            }
        }
        if(isset($id_inser_order) && isset($id_inser_orderdetails)){
            Cart::destroy();
            return Redirect::to('/');
        }else{
            echo "Lỗi xảy ra khi đặt hàng, vui lòng thử lại nhé";
        }
    }       

}


/*
$data = array();
        $data['idDivision'] = $request->division;
        $data['lastName'] = $request->lastName;
        $data['firstName'] = $request->firstName;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['address'] = $request->address;
        $data['sex'] = $request->sex;
        $data['phone'] = $request->phone;
        $id = DB::table('tbl_user')->insertGetId($data);
*/

/*


    SCOPE_IDENTITY ()
    DECLARE @MemberId int

INSERT INTO Member (name) VALUES ('hello');

SET @MemberId = SCOPE_IDENTITY()

INSERT INTO Member_Detail (pk, name) VALUES (@MemberId, 'hello again')

*/