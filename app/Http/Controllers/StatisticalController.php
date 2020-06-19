<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StatisticalController extends Controller
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

    public function statistical_order()
    {
        $this->AdminAuthCheck();

        // $sta_ord = Order::distinct()
        //     ->select('order_id', 'order_total', 'order_status', 'created_at')->get();
        $sta_ord = DB::table('tbl_order')->distinct()
            ->select('created_at')
            ->orderByDesc('created_at')->get();
        return view('admin.statistical_order')->with(compact('sta_ord'));
    }

    public function statistical_product()
    {
        $this->AdminAuthCheck();

        $sta_product = Product::select('product_id', 'product_name', 'product_image', 'product_sold', 'product_quantity_instock')
            ->paginate(10);
        return view('admin.statistical_product')->with(compact('sta_product'));
    }
}
