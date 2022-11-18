<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

session_start();

class HomeController extends Controller
{
    public function index(){
        $all_category = DB::table('tbl_categoryproduct')->get();

        // Sản phẩm bán chạy
        $sellingProduct = DB::table('tbl_product')
                            ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
                            ->where('tbl_image.isMain', 1)
                            ->orderby('number_sold', 'desc')
                            ->get();
        //Nội thất gia đình
        $homeProduct = DB::table('tbl_product')
                            ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
                            ->where('tbl_image.isMain', 1)
                            ->where('idCategoryProduct', 1)
                            ->get();

        //Nội thất văn phòng
        $officeProduct = DB::table('tbl_product')
                            ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
                            ->where('tbl_image.isMain', 1)
                            ->where('idCategoryProduct', 2)
                            ->get();

        return view('pages.home')
                ->with('sellingProduct', $sellingProduct)
                ->with('all_category', $all_category)
                ->with('homeProduct', $homeProduct)
                ->with('officeProduct', $officeProduct);
    }
}
