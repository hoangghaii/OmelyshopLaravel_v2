<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryProduct extends Controller
{
    //Back end
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('admin.dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_category_product()
    {
        $this->AdminAuthCheck();
        return view('admin.add_category_Product');
    }

    public function all_category_product()
    {
        $this->AdminAuthCheck();

        $category = Category::all();

        return view('admin.all_category_product')->with(compact('category'));
    }

    public function save_category_product(Request $request)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();

        return back()->with('thongbao', 'Thêm danh mục sản phẩm thành công');
    }

    public function unactive_category_product($category_product_id)
    {
        $this->AdminAuthCheck();

        Category::where('category_id', $category_product_id)->update(['category_status' => 0]);

        return back()->with('thongbao', 'Ẩn danh mục sản phẩm thành công');
    }

    public function active_category_product($category_product_id)
    {
        $this->AdminAuthCheck();

        Category::where('category_id', $category_product_id)->update(['category_status' => 1]);

        return back()->with('thongbao', 'Hiển thị danh mục sản phẩm thành công');
    }

    public function edit_category_product($category_product_id)
    {
        $this->AdminAuthCheck();

        $edit_category_product = Category::where('category_id', $category_product_id)->get();

        return view('admin.edit_category_product')->with(compact('edit_category_product'));
    }

    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        Category::where('category_id', $category_product_id)
            ->update(['category_name' => $data['category_name'], 'category_desc' => $data['category_desc']]);

        return redirect('all-category-product')->with('thongbao', 'Cập nhật danh mục sản phẩm thành công');
    }

    public function delete_category_product($category_product_id)
    {
        $this->AdminAuthCheck();

        Category::destroy($category_product_id);

        return back()->with('thongbao', 'Xóa danh mục sản phẩm thành công');
    }


    //Front end
    public function show_category_home($category_product_id)
    {
        $products = Product::where('category_id', $category_product_id)
            ->orderBy('product_id', 'desc')->paginate(6);

        $category_name = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->limit(1)->get();

        $name_category = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->limit(1)->get();

        $cate_name = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->limit(1)->get();

        $breadcrumb_category_name = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->limit(1)->get();

        $category_link = DB::table('tbl_product')
            ->where('tbl_product.category_id', $category_product_id)
            ->join('tbl_sub_category', 'tbl_sub_category.category_id', '=', 'tbl_product.category_id')
            ->distinct()
            ->select('tbl_sub_category.sub_category_id', 'tbl_sub_category.sub_category_name', 'tbl_product.category_id')
            ->get();

        return view(
            'pages.category.show_category_product',
            compact(
                'products',
                'category_name',
                'name_category',
                'cate_name',
                'breadcrumb_category_name',
                'category_link'
            )
        );
    }
}
