<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $new_product = DB::table('tbl_product')
            ->where('product_status', '1')
            ->orderByDesc('product_id')
            ->limit(8)
            ->get();

        $popular_product = DB::table('tbl_product')
            ->where('product_status', '2')
            ->orderByDesc('product_id')
            ->limit(8)
            ->get();

        return view('pages.home')
            ->with('new_product', $new_product)
            ->with('popular_product', $popular_product);
    }

    public function search(Request $request)
    {
        $key_words = $request->search;

        $search_product = Product::where('product_name', 'LIKE', '%' . $key_words . '%')
            ->orderBy('product_id', 'asc')->paginate(6);
        if ($search_product != null) {
            return view('pages.search.search')->with('result', $search_product);
        } else {
            return back()->with('error', 'Không có kết quả cho key words bạn tìm kiếm!');
        }
    }

    public function coming_soon()
    {
        return view('pages.comingpage.comingpage');
    }
}
