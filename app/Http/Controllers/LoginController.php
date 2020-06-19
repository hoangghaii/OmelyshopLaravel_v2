<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class LoginController extends Controller
{
    public function sign_up()
    {
        $province = Province::all();
        return view('pages.signup.signup')
            ->with(compact('province'));
    }

    public function add_customer(Request $request)
    {
        $data = $request->all();

        $customer = new Customer();

        $user_province = Province::where('matp', $data['province'])->value('name');
        $user_district = District::where('maqh', $data['district'])->value('name');
        $user_ward = Ward::where('xaid', $data['ward'])->value('name');

        $customer->customer_name = $data['username'];
        $customer->customer_password = md5($data['password']);
        $customer->customer_phone = $data['phone'];
        $customer->customer_email = $data['email'];
        $customer->customer_province = $user_province;
        $customer->customer_district = $user_district;
        $customer->customer_ward = $user_ward;
        $customer->customer_address = $data['address'];

        $customer->save();

        return back()->with('thongbao', 'Bạn đã đăng ký thành công, xin hãy đăng nhập!');
    }

    public function sign_out()
    {
        Session::flush();

        return back()->with('thongbao', 'Đăng xuất thành công');
    }

    public function login_customer(Request $request)
    {
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);

        $result = DB::table('tbl_customer')
            ->where('customer_email', $customer_email)
            ->where('customer_password', $customer_password)
            ->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);

            return redirect('/trang-chu')->with('thongbao', 'Bạn đã đăng nhập thành công');
        } else {
            return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
    }
}
