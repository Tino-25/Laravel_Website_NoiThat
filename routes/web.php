<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// **************** Web page ***********************
Route::get('/login', 'LoginRegisterController@login_form');
Route::get('/register', 'LoginRegisterController@register_form');
Route::post('/register-user', 'LoginRegisterController@register');
Route::post('/login-user', 'LoginRegisterController@login');
Route::get('/logout', 'LoginRegisterController@logout');

Route::get('/', 'HomeController@index');
Route::get('/store', 'StoreController@index');
Route::get('/store-sort-new', 'StoreController@sort_new');
Route::get('/store-sort-price-desc', 'StoreController@price_desc');
Route::get('/store-sort-price-asc', 'StoreController@price_asc');
Route::get('/show-product-category/{idCategoryProduct}', 'StoreController@show_product_category');
Route::get('/filter_price/{price_range}', 'StoreController@filter_price');
Route::get('/product-best-selling', 'StoreController@product_best_selling');

Route::get('/search-product', 'StoreController@product_search');

Route::get('/show_detail_product/{idProduct}', 'DetailsController@index');


Route::post('/add-product-cart', 'CartController@add_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/update-cart-quantity/idRow/{idRow}/cart_quantity/{cart_quantity}','CartController@update_cart_quantity');

# order khi chưa đăng nhập -> phải qua đăng ký
Route::get('/order-infomation', 'PayController@user_order'); 
#order khi đã đăng nhập ->tới trang hiển thị thông tin order
Route::get('/order', 'PayController@order');
Route::post('/order-action', 'PayController@add_order_orderdetails');


/*
            Session::put('idUser', $result->idUser);
            Session::put('name', $result->firstName);
            Session::put('email', $result->email);
            
            Session::put('email', null);
            Session::put('idUser', null);
            Session::put('name', null);

            Session::put('name_admin', $result->firstName);
            Session::put('idUser_admin', $result->idUser);
            Session::put('email_admin', $result->email);

            Cart::destroy();

*/







// **************** Admin ***********************
Route::post('/login-admin', 'LoginRegisterController@login_admin');
Route::get('/administrator_login', 'LoginRegisterController@login_admin_form');
Route::get('/logout_admin', 'LoginRegisterController@logout_admin');

Route::get('/administrator', 'OverviewController@index');

//Route::get('/user-list', 'admin\UserController@index');
Route::get('/user-list', 'UserController@index');
Route::get('/user-add', 'UserController@formAdd');
Route::post('/user-add-action', 'UserController@addUser');
Route::get('/user-details/{idUser}', 'UserController@detailUser');
Route::get('/user-delete/{idUser}', 'UserController@deleteUser');
Route::get('/user-update/{idUser}', 'UserController@formUpdate_user');
Route::post('/user-update-action/{idUser}', 'UserController@updateUser');

Route::get('/category-list', 'CategoryController@index');
Route::get('/add-category-form', 'CategoryController@add_category_form');
Route::post('/add-category-action', 'CategoryController@add_category_action');
Route::get('/delete-category/{idCategory}', 'CategoryController@delete_category');
Route::get('/detail-category/{idCategory}', 'CategoryController@detail_category');
Route::get('/update-category-form/{idCategory}', 'CategoryController@update_category_form');
Route::post('/update-category-action/{idCategory}', 'CategoryController@update_category_action');

Route::get('/product-list', 'ProductController@index');
Route::get('/add-product-form', 'ProductController@add_product_form');
Route::post('/add-product-action', 'ProductController@add_product_action');
Route::get('/delete_product/{idProduct}', 'ProductController@delete_product');
Route::get('/detail_product/{idProduct}', 'ProductController@detail_product');
Route::get('/update_product_form/{idProduct}', 'ProductController@update_product_form');
Route::post('/update-product-action/{idProduct}', 'ProductController@update_product_action');

Route::get('/image_product/{idProduct}', 'ProductController@list_image');
Route::get('/delete-img/{idImg}/idProduct/{idProduct}', 'ProductController@delete_image');
Route::post('/add-image-action/{idProduct}', 'ProductController@add_image_action');

Route::get('/order-list', 'OrderController@index');
Route::get('/detail_order/{idOrder}', 'OrderController@detail_order');
Route::get('/update_status_order_1/{idOrder}', 'OrderController@update_status_1');
Route::get('/update_status_order_0/{idOrder}', 'OrderController@update_status_0');