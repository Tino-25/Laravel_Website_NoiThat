<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StoreController extends Controller
{
    public function index(){
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // tất cả sản phẩm (có ảnh - ảnh có isMain = 1)
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
        ->where('tbl_image.isMain', 1)
        ->get();
        return view('pages.store')
        ->with('title', 'Tất Cả sản phẩm')
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }
    
    public function sort_new(){
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // tất cả sản phẩm (có ảnh - ảnh có isMain = 1)
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
        ->where('tbl_image.isMain', 1)
        ->orderby('tbl_product.idProduct', 'desc')
        ->get();
        return view('pages.store')
        ->with('title', 'Sắp xếp mới nhất')
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }

    public function price_desc(){
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // tất cả sản phẩm (có ảnh - ảnh có isMain = 1)
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
        ->where('tbl_image.isMain', 1)
        ->orderby('tbl_product.productUnitPrice', 'desc')
        ->get();
        return view('pages.store')
        ->with('title', 'Sắp xếp giá giảm dần')
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }

    public function price_asc(){
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // tất cả sản phẩm (có ảnh - ảnh có isMain = 1)
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
        ->where('tbl_image.isMain', 1)
        ->orderby('tbl_product.productUnitPrice', 'asc')
        ->get();
        return view('pages.store')
        ->with('title', 'Sắp xếp giá tăng dần')
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }

    public function show_product_category($idCategoryProduct){
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // tất cả sản phẩm (có ảnh - ảnh có isMain = 1)
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
        ->where('tbl_image.isMain', 1)
        ->where('tbl_product.idCategoryProduct', $idCategoryProduct)
        ->get();
        $category_product = DB::table('tbl_categoryproduct')->where('tbl_categoryproduct.idCategoryProduct', $idCategoryProduct)->get();
        foreach($category_product as $key=>$cate){
            $categoryName = $cate->categoryName;
        }
        return view('pages.store')
        ->with('title', 'Sản phẩm theo loại: '.$categoryName)
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }


    public function product_best_selling(){
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // sản phẩm bán chạy
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
        ->where('tbl_image.isMain', 1)
        ->orderby('number_sold', 'desc')
        ->get();
        return view('pages.store')
        ->with('title', 'Sắp xếp sản phẩm bán chạy')
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }


    public function product_search(Request $request){
        $value = $request->productSearch;
        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // sản phẩm bán chạy
        $search_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
        ->where('tbl_image.isMain', 1)
        ->where('tbl_product.productName', 'like', '%'.$value.'%')
        ->orderby('number_sold', 'desc')
        ->get();
        return view('pages.store')
        ->with('title', 'Sắp xếp sản phẩm bán chạy')
        ->with('all_category', $all_category)
        ->with('all_product', $search_product);
    }


    public function filter_price($price_range){
        if($price_range == 1){
            $from = 0;
            $to = 1000000;
        }
        if($price_range == '1-3'){
            $from = 1000000;
            $to = 3000000;
        }
        if($price_range == '3-5'){
            $from = 3000000;
            $to = 5000000;
        }
        if($price_range == '5-'){
            $from = 5000000;
            $to = 10000000000;
        }

        // dùng cho header
        $all_category = DB::table('tbl_categoryproduct')->get();
        // tất cả sản phẩm (có ảnh - ảnh có isMain = 1)
        $all_product = DB::table('tbl_product')
        ->join('tbl_image', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
        ->where('tbl_image.isMain', 1)
        ->whereBetween('tbl_product.productUnitPrice', [$from, $to])
        ->get();
        return view('pages.store')
        ->with('title', 'Sản phẩm có giá '.$price_range.' triệu')
        ->with('all_category', $all_category)
        ->with('all_product', $all_product);
    }

}
