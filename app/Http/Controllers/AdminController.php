<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facedes\Redirect;

session_start();

class AdminController extends Controller
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

    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect('/dashboard')->with('thongbao', 'Đăng nhập tài khoản ' . Session::get('admin_name') . ' thành công');
        } else {
            return redirect('/admin')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
    }

    public function logout()
    {
        $this->AdminAuthCheck();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('/admin')->with('thongbao', 'Đăng xuất tài khoản thành công');
    }
}
