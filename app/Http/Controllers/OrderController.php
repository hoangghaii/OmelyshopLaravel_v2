<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class OrderController extends Controller
{
    //Backend
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('admin.dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function manage_order()
    {
        $this->AdminAuthCheck();

        $all_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
            ->select('tbl_customer.customer_name', 'tbl_order.*')
            ->orderByDesc('tbl_order.order_id')
            ->get();

        return view('admin.manage_order')->with('all_order', $all_order);
    }

    public function view_order($order_id)
    {
        $this->AdminAuthCheck();

        $order = Order::where('order_id', $order_id)->get();

        $customer_by_order = DB::table('tbl_customer')
            ->join('tbl_order', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->where('tbl_order.order_id', $order_id)
            ->select(
                'tbl_order.created_at',
                'tbl_customer.customer_name',
                'tbl_customer.customer_phone',
                'tbl_customer.customer_email',
                'tbl_customer.customer_address',
                'tbl_customer.customer_ward',
                'tbl_customer.customer_district',
                'tbl_customer.customer_province'
            )
            ->get();

        $order_by_id = DB::table('tbl_order')
            ->where('tbl_order.order_id', $order_id)
            ->join('tbl_order_detail', 'tbl_order_detail.order_id', '=', 'tbl_order.order_id')
            ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_detail.product_id')
            ->select(
                'tbl_order.order_id',
                'tbl_order.order_total',
                'tbl_order_detail.product_quantity',
                'tbl_product.product_id',
                'tbl_product.product_name',
                'tbl_product.product_quantity_instock',
                'tbl_product.product_price'
            )
            ->distinct()->get();

        $order_total_byId = DB::table('tbl_order')
            ->where('order_id', $order_id)
            ->select('order_total')->get();

        return view('admin.view_order')
            ->with('order_by_id', $order_by_id)
            ->with('customer_by_order', $customer_by_order)
            ->with('order_total_byId', $order_total_byId)
            ->with('order', $order);
    }

    public function delete_order($order_id)
    {
        OrderDetail::where('order_id', $order_id)->delete();
        Order::where('order_id', $order_id)->delete();

        return redirect('/manage-order')->with('thongbao', 'Đơn hàng số ' . $order_id . ' đã được xóa');
    }

    public function update_order_qty(Request $request)
    {
        $data = $request->all();

        //update order
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        //update quantity
        foreach ($data['order_product_id'] as $key => $product_id) {
            $product = Product::find($product_id);
            $product_quantity = $product->product_quantity_instock;
            $product_sold = $product->product_sold;
            foreach ($data['quantity'] as $key2 => $qty) {
                if ($key == $key2) {
                    $product_remain = $product_quantity - $qty;
                    $product->product_quantity_instock = $product_remain;
                    $product->product_sold = $product_sold + $qty;
                    $product->save();
                }
            }
        }
    }
}
