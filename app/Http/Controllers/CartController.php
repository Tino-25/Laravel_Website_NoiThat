<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Session;

session_start();

class CartController extends Controller
{

    public function show_cart(Request $request){
        $all_category = DB::table('tbl_categoryproduct')->get();
        return view('pages.cart')
        ->with('all_category', $all_category);
    }

    public function add_cart(Request $request){
        $data['id'] = $request->id_product__hidden;
        $data['options']['productImage'] = $request->image_product__hidden;
        $data['name'] = $request->name_product__hidden;
        $data['price'] = $request->price_product__hidden;
        $data['weight'] = $request->price_product__hidden;
        $data['qty'] = $request->get_quantity;
        Cart::add($data);
        //Cart::destroy();
        return Redirect::to('/show-cart');
    }

    public function delete_to_cart($idRow){
        Cart::update($idRow,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity($rowId, $qty){
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }

}
