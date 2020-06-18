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

//Frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::post('/tim-kiem', 'HomeController@search');


//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_product_id}', 'CategoryProduct@show_category_home');
Route::get('/danh-muc-con/{category_product_id}/{sub_category_product_id}', 'SubCategoryController@show_sub_category_home');


//Chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@details_product');


//Coming soon
Route::get('/coming-soon', 'HomeController@coming_soon');

//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin_dashboard', 'AdminController@dashboard');


//Categoty product
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');


//Sub-categoty product
Route::get('/add-sub-category-product', 'SubCategoryController@add_sub_category_product');
Route::get('/all-sub-category-product', 'SubCategoryController@all_sub_category_product');
Route::get('/edit-sub-category-product/{sub_category_product_id}', 'SubCategoryController@edit_sub_category_product');
Route::get('/delete-sub-category-product/{sub_category_product_id}', 'SubCategoryController@delete_sub_category_product');

Route::get('/unactive-sub-category-product/{sub_category_product_id}', 'SubCategoryController@unactive_sub_category_product');
Route::get('/active-sub-category-product/{sub_category_product_id}', 'SubCategoryController@active_sub_category_product');

Route::post('/save-sub-category-product', 'SubCategoryController@save_sub_category_product');
Route::post('/update-sub-category-product/{sub_category_product_id}', 'SubCategoryController@update_sub_category_product');


//Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::get('/default-product/{product_id}', 'ProductController@default_product');
Route::get('/new-product/{product_id}', 'ProductController@new_product');
Route::get('/popular-product/{product_id}', 'ProductController@popular_product');
Route::get('/outofstock-product/{product_id}', 'ProductController@outofstock_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');
Route::post('/select-subcategory', 'ProductController@select_subcategory');


//Cart
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/xoa-san-pham/{rowId}', 'CartController@delete_to_cart');
Route::post('/add-cart-ajax', 'CartController@add_cart_ajax');
Route::post('/mua-san-pham', 'CartController@save_cart');
Route::post('/cap-nhat-gio-hang', 'CartController@update_cart_quantity');


//Checkout
Route::get('/thanh-toan', 'CheckoutController@check_out');
Route::post('/select-location', 'CheckoutController@select_location');
Route::post('/dat-hang', 'CheckoutController@add_to_cart');
//Send mail
Route::get('send-mail', 'CheckoutController@send_mail');

//Login
Route::get('/dang-ky', 'LoginController@sign_up');
Route::get('/dang-xuat', 'LoginController@sign_out');
Route::post('/add-customer', 'LoginController@add_customer');
Route::post('/login-customer', 'LoginController@login_customer');


//Order
Route::get('/manage-order', 'OrderController@manage_order');
Route::get('/view-order/{order_id}', 'OrderController@view_order');
Route::get('/delete-order/{order_id}', 'OrderController@delete_order');
Route::post('/update-order-qty', 'OrderController@update_order_qty');


//statistical
Route::get('/statistical-order', 'StatisticalController@statistical_order');
Route::get('/statistical-product', 'StatisticalController@statistical_product');
