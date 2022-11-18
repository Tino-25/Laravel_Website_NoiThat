<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();

class ProductController extends Controller
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
        $all_product = DB::table('tbl_product')
        ->join('tbl_categoryproduct', 'tbl_product.idCategoryProduct', '=', 'tbl_categoryproduct.idCategoryProduct')
        ->join('tbl_color', 'tbl_product.idColor', '=', 'tbl_color.idColor')
        ->join('tbl_size', 'tbl_product.idSize', '=', 'tbl_size.idSize')
        ->get();
        return view('admin.pages.product.list_product')->with('all_product', $all_product);
    }

    public function add_product_form(){
        $this->authentication();
        $all_category = DB::table('tbl_categoryproduct')->get();
        $all_color = DB::table('tbl_color')->get();
        $all_size = DB::table('tbl_size')->get();
        return view('admin.pages.product.add_product')
        ->with('all_category', $all_category)
        ->with('all_color', $all_color)
        ->with('all_size', $all_size);
    }

    public function add_product_action(Request $request){
        $this->authentication();
        $data = array();
        $data['idCategoryProduct'] = $request->category;
        $data['idColor'] = $request->color;
        $data['idSize'] = $request->size;
        $data['productName'] = $request->nameproduct;
        $data['productUnitPrice'] = $request->unitprice;
        $data['dateIn'] = $request->dateIn;
        $data['productDescription'] = $request->desc;
        DB::table('tbl_product')->insert($data);
        return Redirect('product-list');
    }

    public function delete_product($idProduct){
        $this->authentication();
        DB::table('tbl_product')->where('idProduct', $idProduct)->delete();
        return Redirect::to('/product-list');
    }

    public function detail_product($idProduct){
        $this->authentication();
        $product_detail = DB::table('tbl_product')
        ->join('tbl_categoryproduct', 'tbl_product.idCategoryProduct', '=', 'tbl_categoryproduct.idCategoryProduct')
        ->join('tbl_color', 'tbl_product.idColor', '=', 'tbl_color.idColor')
        ->join('tbl_size', 'tbl_product.idSize', '=', 'tbl_size.idSize')
        ->where('tbl_product.idProduct', $idProduct)
        ->get();
        return view('admin.pages.product.detail_product')->with('product_detail', $product_detail);
    }

    public function update_product_form($idProduct){
        $this->authentication();
        $product_detail = DB::table('tbl_product')
        ->join('tbl_categoryproduct', 'tbl_product.idCategoryProduct', '=', 'tbl_categoryproduct.idCategoryProduct')
        ->join('tbl_color', 'tbl_product.idColor', '=', 'tbl_color.idColor')
        ->join('tbl_size', 'tbl_product.idSize', '=', 'tbl_size.idSize')
        ->where('tbl_product.idProduct', $idProduct)
        ->get();
        $all_category = DB::table('tbl_categoryproduct')->get();
        $all_color = DB::table('tbl_color')->get();
        $all_size = DB::table('tbl_size')->get();

        return view('admin.pages.product.update_product')
        ->with('product_detail', $product_detail)
        ->with('all_category', $all_category)
        ->with('all_color', $all_color)
        ->with('all_size', $all_size);;
    }

    public function update_product_action($idProduct, Request $request){
        $this->authentication();
        $data = array();
        $data['idCategoryProduct'] = $request->category;
        $data['idColor'] = $request->color;
        $data['idSize'] = $request->size;
        $data['productName'] = $request->nameproduct;
        $data['productUnitPrice'] = $request->unitprice;
        $data['dateIn'] = $request->dateIn;
        $data['productDescription'] = $request->desc;
        DB::table('tbl_product')->where('idProduct', $idProduct)->update($data);
        return Redirect('product-list');
    }

    public function list_image($idProduct){
        $this->authentication();
        $productImages = DB::table('tbl_image')->where('idProduct', $idProduct)->get();
        $idProduct = $idProduct;
        return view('admin.pages.product.image_product')->with('productImages', $productImages)->with('idProduct', $idProduct);
    }

    public function delete_image($idImg, $idProduct){
        $this->authentication();
        DB::table('tbl_image')->where('idImg', $idImg)->delete();
        return Redirect::to('/image_product/'.$idProduct);
    }

    public function add_image_action(Request $request, $idProduct){
        $this->authentication();
        $get_image = $request->file('image_product');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('img/product/',$new_image);
            $image = $new_image;
            if($image){
                DB::table('tbl_image')->insert(['idProduct'=>$idProduct, 'image'=>$image]);
            }
        }
        return Redirect::to('/image_product/'.$idProduct);
    }


}