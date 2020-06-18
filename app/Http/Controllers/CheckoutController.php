<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class CheckoutController extends Controller
{
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('admin.dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function check_out()
    {
        $province = Province::all();
        // $province = DB::table('devvn_tinhthanhpho')->get();

        $customer_id = Session::get('customer_id');

        if ($customer_id) {
            $customer_info = Customer::where('customer_id', $customer_id)->get();
            // $customer_info = DB::table('tbl_customer')->where('customer_id', $customer_id)->get();
            // $customer_province = Province::where('matp', '=', $customer_info->customer_province)->get();
            // $customer_district = District::where('maqh', '=', $customer_info->customer_district)->get();
            // $customer_ward = Ward::where('xaid', '=', $customer_info->customer_ward)->get();
            return view('pages.checkout.checkout')
                // ->with(compact('province', 'customer_info', 'customer_province', 'customer_district', 'customer_ward'));
                ->with(compact('province', 'customer_info'));
            // ->with('province', $province)
            // ->with('customer_info', $customer_info);
        } else {
            return view('pages.checkout.checkout')
                ->with(compact('province'));
        }
    }

    public function select_location(Request $request)
    {
        $data = $request->all();

        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'province') {
                $select_district = District::where('matp', $data['locationId'])->get();
                $output .= '<option value="" disabled selected>Quận/Huyện*</option>';
                foreach ($select_district as $district) {
                    $output .= '<option value="' . $district->maqh . '">' . $district->name . '</option>';
                }
            } else {
                $select_ward = Ward::where('maqh', $data['locationId'])->get();
                $output .= '<option value="" disabled selected>Xã/Phường*</option>';
                foreach ($select_ward as $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
        }
        echo $output;
    }

    public function add_to_cart(Request $request)
    {
        $data = $request->all();

        $customer_id = Session::get('customer_id');

        $user_province = Province::where('matp', $data['province'])->value('name');
        $user_district = District::where('maqh', $data['district'])->value('name');
        $user_ward = Ward::where('xaid', $data['ward'])->value('name');

        if ($customer_id) {

            $update_customer = Customer::find($customer_id);

            if (!$data['inputMail']) {
                $update_customer->customer_name = $data['inputName'];
                $update_customer->customer_phone = $data['inputPhone'];
                $update_customer->customer_email = "";
                $update_customer->customer_province = $user_province;
                $update_customer->customer_district = $user_district;
                $update_customer->customer_ward = $user_ward;
                $update_customer->customer_address = $data['inputAddress'];
            } else {
                $update_customer->customer_name = $data['inputName'];
                $update_customer->customer_phone = $data['inputPhone'];
                $update_customer->customer_email = $data['inputMail'];
                $update_customer->customer_province = $user_province;
                $update_customer->customer_district = $user_district;
                $update_customer->customer_ward = $user_ward;
                $update_customer->customer_address = $data['inputAddress'];
            }

            $update_customer->save();
            $order_customer_id  = $update_customer->customer_id;
        } else {

            $new_customer = new Customer();
            if (
                !$data['inputName'] ||
                !$data['inputPhone'] ||
                !$user_province ||
                !$user_district ||
                !$user_ward ||
                !$data['inputAddress']
            ) {
                return back()->with('thongbao', 'Bạn cần điền đầy đủ thông tin cần thiết để đặt hàng!');
            } else {
                if (!$data['inputMail']) {
                    $new_customer->customer_name = $data['inputName'];
                    $new_customer->customer_phone = $data['inputPhone'];
                    $new_customer->customer_email = "";
                    $new_customer->customer_province = $user_province;
                    $new_customer->customer_district = $user_district;
                    $new_customer->customer_ward = $user_ward;
                    $new_customer->customer_address = $data['inputAddress'];
                } else {
                    $new_customer->customer_name = $data['inputName'];
                    $new_customer->customer_phone = $data['inputPhone'];
                    $new_customer->customer_email = $data['inputMail'];
                    $new_customer->customer_province = $user_province;
                    $new_customer->customer_district = $user_district;
                    $new_customer->customer_ward = $user_ward;
                    $new_customer->customer_address = $data['inputAddress'];
                }
                $new_customer->save();
                $order_customer_id  = $new_customer->customer_id;
            }
        }

        //Order
        $order = new Order();
        $order->customer_id = $order_customer_id;
        $order->order_total = Cart::total();
        $order->order_status = 1;
        $order->save();
        $order_id = $order->order_id;
        $order_total = $order->order_total;

        //Order detail
        $content = Cart::content();

        foreach ($content as $v_content) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $v_content->id;
            $order_detail->product_quantity = $v_content->qty;
            $order_detail->save();
        }

        Cart::destroy();
        return redirect('/trang-chu')->with('thongbao', 'Đơn hàng của bạn đã được đặt thành công, chúng tôi sẽ liên lạc với bạn sớm nhất!');
    }
}
