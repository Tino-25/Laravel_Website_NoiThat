<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DetailsController extends Controller
{
    public function index($idProduct){
        $all_category = DB::table('tbl_categoryproduct')->get();
        $product_detail = DB::table('tbl_product')
            ->join('tbl_categoryproduct', 'tbl_product.idCategoryProduct', '=', 'tbl_categoryproduct.idCategoryProduct')
            ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
            ->join('tbl_color', 'tbl_product.idColor', '=', 'tbl_color.idColor')
            ->join('tbl_size', 'tbl_product.idSize', '=', 'tbl_size.idSize')
            ->where('tbl_product.idProduct', $idProduct)
            ->where('tbl_image.isMain', 1)
            ->get();
        $image_notMain = DB::table('tbl_image')
            ->join('tbl_product', 'tbl_image.idProduct', '=', 'tbl_product.idProduct')
            ->where('tbl_image.isMain', 0)
            ->get();
        foreach($product_detail as $pr){
            $idCategoryProduct = $pr->idCategoryProduct;
        }
        $similar_product = DB::table('tbl_product')
            ->join('tbl_image', 'tbl_product.idProduct', '=', 'tbl_image.idProduct')
            ->where('tbl_image.isMain', 1)
            ->where('tbl_product.idCategoryProduct', $idCategoryProduct)
            ->take(4)
            ->get();
        return view('pages.detail')
            ->with('all_category', $all_category)
            ->with('product_detail', $product_detail)
            ->with('image_notMain', $image_notMain)
            ->with('similar_product', $similar_product);
    }


}
