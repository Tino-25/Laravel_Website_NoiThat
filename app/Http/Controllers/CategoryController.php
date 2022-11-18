<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();

class CategoryController extends Controller
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
        $all_category = DB::table('tbl_categoryproduct')->get();
        return view('admin.pages.category.list_category')->with('all_category', $all_category);
    }

    public function add_category_form(){
        $this->authentication();
        return view('admin.pages.category.add_category');
    }

    public function add_category_action(Request $request){
        $this->authentication();
        $data = array();
        $data['categoryName'] = $request->categoryName;
        $data['categoryDesc'] = $request->categoryDesc;
        $get_image = $request->file('categoryImage');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('img/category/',$new_image);
            $data['categoryImage'] = $new_image;
        }
        DB::table('tbl_categoryproduct')->insert($data);
        return Redirect::to('/category-list');
    }

    public function delete_category($idCategoryProduct){
        $this->authentication();
        DB::table('tbl_categoryproduct')->where('idCategoryProduct', $idCategoryProduct)->delete();
        return Redirect::to('/category-list');
    }

    public function detail_category($idCategoryProduct){
        $this->authentication();
        $details_category = DB::table('tbl_categoryproduct')->where('idCategoryProduct', $idCategoryProduct)->get();
        return view('admin.pages.category.detail_category')->with('details_category', $details_category);
    }

    public function update_category_form($idCategoryProduct){
        $this->authentication();
        $detail_category = DB::table('tbl_categoryproduct')->where('idCategoryProduct', $idCategoryProduct)->get();
        return view('admin.pages.category.update_category')->with('detail_category', $detail_category);
    }

    public function update_category_action($idCategoryProduct, Request $request){
        $this->authentication();
        $data = array();
        $data['categoryName'] = $request->categoryName;
        $data['categoryDesc'] = $request->categoryDesc;
        $get_image = $request->file('categoryImage');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('img/category/',$new_image);
            $data['categoryImage'] = $new_image;
        }

        DB::table('tbl_categoryproduct')->where('idCategoryProduct', $idCategoryProduct)->update($data);
        return Redirect::to('category-list');
    }
}
