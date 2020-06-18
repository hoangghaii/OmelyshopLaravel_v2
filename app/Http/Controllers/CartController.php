<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_id = $request->productId_hidden;
        $quantity = $request->quantity;

        $product_info = DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->select('product_id', 'product_name', 'product_price', 'product_weight', 'product_image')
            ->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_weight;
        $data['options']['image'] = $product_info->product_image;

        Cart::setGlobalTax(0);
        // Cart::destroy();
        Cart::add($data);

        return back()->with('thongbao', 'Bạn đã mua ' . $product_info->product_name . ' thành công');
    }

    public function show_cart()
    {
        return view('pages.cart.show_cart');
    }

    public function delete_to_cart($rowId)
    {
        Cart::remove($rowId);

        return back()->with('thongbao', 'Bạn đã xóa sản phẩm thành công');
    }

    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId, $qty);

        return back()->with('thongbao', 'Cập nhật sản phẩm thành công');
    }
    // public function update_cart_quantity(Request $request)
    // {
    //     $data = [];
    //     $data['rowId'] = $request->rowId_cart;
    //     $data['qty'] = $request->cart_quantity;
    //     // $rowId = $request->rowId_cart;
    //     // $qty = $request->cart_quantity;
    //     print_r($data['rowId']);
    //     // Cart::update($rowId, $qty);

    //     // return back()->with('thongbao', 'Cập nhật sản phẩm thành công');
    // }

    public function add_cart_ajax(Request $request)
    {
        // Session::forget('cart');
        $data = [];
        $data['id'] = $request->cart_product_id;
        $data['qty'] = $request->cart_product_qty;
        $data['name'] = $request->cart_product_name;
        $data['price'] = $request->cart_product_price;
        $data['weight'] = $request->cart_product_price;
        $data['options']['image'] = $request->cart_product_image;

        Cart::add($data);
        // $session_id = substr(md5(microtime()), rand(0, 26), 5);
        // $cart = Session::get('cart');
        // if ($cart) {
        //     $is_avaiable = 0;

        //     if ($is_avaiable == 0) {
        //         $cart[] = array(
        //             'session_id' => $session_id,
        //             'product_name' => $data['name'],
        //             'product_id' => $data['id'],
        //             'product_image' => $data['options']['image'],
        //             'product_qty' => $data['qty'],
        //             'product_price' => $data['price'],
        //             'product_weight' => $data['weight'],
        //         );
        //         // Session::put('cart', $cart);
        //         Cart::add($data);
        //     } else {
        //         foreach ($cart as $val) {
        //             if ($val['product_id'] == $data['cart_product_id']) {
        //                 $is_avaiable++;
        //             }
        //         }
        //     }
        // } else {
        //     $cart[] = array(
        //         'session_id' => $session_id,
        //         'product_name' => $data['name'],
        //         'product_id' => $data['id'],
        //         'product_image' => $data['options']['image'],
        //         'product_qty' => $data['qty'],
        //         'product_price' => $data['price'],
        //         'product_weight' => $data['weight'],
        //     );
        //     Session::put('cart', $cart);
        //     Cart::add($data);
        // }

        // Session::save();
    }
}
