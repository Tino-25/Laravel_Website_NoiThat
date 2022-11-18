<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class OrderController extends Controller
{
    public function index(){
        $all_order = DB::table('tbl_order')
                    ->join('tbl_user', 'tbl_order.idUser', '=', 'tbl_user.idUser')
                    ->get();
        return view('admin.pages.order.list_order')->with('all_order', $all_order);
    }

    public function detail_order($idOrder){
        $detail_order = DB::table('tbl_orderdetail')
                        ->join('tbl_order', 'tbl_order.idOrder', '=', 'tbl_orderdetail.idOrder')
                        ->join('tbl_user', 'tbl_order.idUser', '=', 'tbl_user.idUser')
                        ->join('tbl_product', 'tbl_product.idProduct', '=', 'tbl_orderdetail.idProduct')
                        ->join('tbl_color', 'tbl_color.idColor', '=', 'tbl_product.idColor')
                        ->join('tbl_size', 'tbl_size.idSize', '=', 'tbl_product.idSize')
                        ->join('tbl_categoryproduct', 'tbl_categoryproduct.idCategoryProduct', '=', 'tbl_product.idCategoryProduct')
                        ->where('tbl_order.idOrder', $idOrder)
                        ->get();
        return view('admin.pages.order.detail_order')->with('detail_order', $detail_order);
    }

    public function update_status_1($idOrder){
        DB::table('tbl_order')->where('idOrder', $idOrder)->update(['statusOrder'=>1]);
        return Redirect::to('/order-list');
    }

    public function update_status_0($idOrder){
        DB::table('tbl_order')->where('idOrder', $idOrder)->update(['statusOrder'=>0]);
        return Redirect::to('/order-list');
    }
}