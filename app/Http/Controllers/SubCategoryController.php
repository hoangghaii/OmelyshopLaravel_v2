<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class SubCategoryController extends Controller
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

    public function add_sub_category_product()
    {
        $this->AdminAuthCheck();

        $category = Category::all();

        return view('admin.add_sub_category_product')->with(compact('category'));
    }

    public function all_sub_category_product()
    {
        $this->AdminAuthCheck();

        $all_sub_category = DB::table('tbl_sub_category')
            ->join('tbl_category_product', 'tbl_sub_category.category_id', '=', 'tbl_category_product.category_id')
            ->select('tbl_sub_category.*', 'tbl_category_product.category_name')
            ->paginate(5);

        return view('admin.all_sub_category_product')->with(compact('all_sub_category'));
    }

    public function save_sub_category_product(Request $request)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['sub_category_name'] = $request->sub_category_product_name;
        $data['sub_category_desc'] = $request->sub_category_product_desc;
        $data['sub_category_status'] = $request->sub_category_product_status;

        $sub_category = new SubCategory();
        $sub_category->category_id = $data['category_id'];
        $sub_category->sub_category_name = $data['sub_category_name'];
        $sub_category->sub_category_desc = $data['sub_category_desc'];
        $sub_category->sub_category_status = $data['sub_category_status'];
        $sub_category->save();

        return back()->with('thongbao', 'Thêm danh mục con thành công');
    }

    public function unactive_sub_category_product($sub_category_product_id)
    {
        $this->AdminAuthCheck();

        SubCategory::where('sub_category_id', $sub_category_product_id)->update(['sub_category_status' => 0]);

        return back()->with('thongbao', 'Ẩn danh mục con thành công');
    }

    public function active_sub_category_product($sub_category_product_id)
    {
        $this->AdminAuthCheck();

        SubCategory::where('sub_category_id', $sub_category_product_id)->update(['sub_category_status' => 1]);

        return back()->with('thongbao', 'Hiển thị danh mục con thành công');
    }

    public function edit_sub_category_product($sub_category_product_id)
    {
        $this->AdminAuthCheck();

        $edit_sub_category = SubCategory::where('sub_category_id', $sub_category_product_id)->get();
        $cate_product = Category::all()->sortBy('category_id');

        $manage_sub_category_product = view('admin.edit_sub_category_product')
            ->with('edit_sub_category', $edit_sub_category)
            ->with('cate_product', $cate_product);

        return view('admin_Layout')->with('admin.edit_sub_category_product', $manage_sub_category_product);
    }

    public function update_sub_category_product(Request $request, $sub_category_product_id)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['sub_category_name'] = $request->sub_category_product_name;
        $data['sub_category_desc'] = $request->sub_category_product_desc;

        SubCategory::where('sub_category_id', $sub_category_product_id)
            ->update(['category_id' => $data['category_id'], 'sub_category_name' => $data['sub_category_name'], 'sub_category_desc' => $data['sub_category_desc']]);

        return redirect('all-sub-category-product')->with('thongbao', 'Cập nhật danh mục con thành công');
    }

    public function delete_sub_category_product($sub_category_product_id)
    {
        $this->AdminAuthCheck();

        SubCategory::destroy($sub_category_product_id);

        return redirect('all-sub-category-product')->with('thongbao', 'Xóa danh mục con thành công');
    }


    //Front end
    public function show_sub_category_home($category_product_id, $sub_category_product_id)
    {
        $products = Product::where('sub_category_id', $sub_category_product_id)
            ->orderBy('product_id', 'desc')
            ->paginate(6);

        $category_name = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->limit(1)->get();

        $sub_category_name = DB::table('tbl_sub_category')
            ->where('sub_category_id', $sub_category_product_id)
            ->limit(1)->get();

        $breadcrumb_category_name = DB::table('tbl_sub_category')
            ->where('sub_category_id', $sub_category_product_id)
            ->limit(1)->get();

        $sub_cate_name = DB::table('tbl_sub_category')
            ->where('sub_category_id', $sub_category_product_id)
            ->limit(1)->get();

        return view(
            'pages.category.show_sub_category_product',
            compact(
                'products',
                'category_name',
                'sub_category_name',
                'breadcrumb_category_name',
                'sub_cate_name'
            )
        );
    }
}
