<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class ProductController extends Controller
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

    public function add_product()
    {
        $this->AdminAuthCheck();

        $category = Category::all();
        $sub_category = SubCategory::all();

        return View('admin.add_product')->with(compact('category', 'sub_category'));
    }

    public function all_product()
    {
        $this->AdminAuthCheck();

        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('tbl_sub_category', 'tbl_product.sub_category_id', '=', 'tbl_sub_category.sub_category_id')
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_sub_category.sub_category_name')
            ->orderByDesc('product_id')
            ->paginate(12);

        $manage_product = view('admin.all_product')->with('all_product', $all_product);

        return View('admin_Layout')->with('admin.all_product', $manage_product);
    }

    public function save_product(Request $request)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity_instock'] = $request->product_quantity_instock;
        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_weight'] = $request->product_weight;
        $data['product_unit'] = $request->product_unit;
        $data['product_origin'] = $request->product_origin;
        $data['product_netweight'] = $request->product_netweight;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;

            $product = new Product();
            $product->product_name = $data['product_name'];
            $product->product_quantity_instock = $data['product_quantity_instock'];
            $product->category_id = $data['category_id'];
            $product->sub_category_id = $data['sub_category_id'];
            $product->product_desc = $data['product_desc'];
            $product->product_content = $data['product_content'];
            $product->product_price = $data['product_price'];
            $product->product_weight = $data['product_weight'];
            $product->product_unit = $data['product_unit'];
            $product->product_origin = $data['product_origin'];
            $product->product_netweight = $data['product_netweight'];
            $product->product_status = $data['product_status'];
            $product->product_image = $data['product_image'];
            $product->save();

            return redirect('add-product')->with('thongbao', 'Thêm sản phẩm thành công');
        } else {
            $data['product_image'] = '';

            $product = new Product();
            $product->product_name = $data['product_name'];
            $product->product_quantity_instock = $data['product_quantity_instock'];
            $product->category_id = $data['category_id'];
            $product->sub_category_id = $data['sub_category_id'];
            $product->product_desc = $data['product_desc'];
            $product->product_content = $data['product_content'];
            $product->product_price = $data['product_price'];
            $product->product_weight = $data['product_weight'];
            $product->product_unit = $data['product_unit'];
            $product->product_origin = $data['product_origin'];
            $product->product_netweight = $data['product_netweight'];
            $product->product_status = $data['product_status'];
            $product->product_image = $data['product_image'];
            $product->save();

            return redirect('add-product')->with('thongbao', 'Thêm sản phẩm thành công');
        }
    }

    public function default_product($product_id)
    {
        $this->AdminAuthCheck();

        Product::where('product_id', $product_id)->update(['product_status' => 0]);

        return back()->with('thongbao', 'Hiển thị sản phẩm mặc định thành công');
    }

    public function new_product($product_id)
    {
        $this->AdminAuthCheck();

        Product::where('product_id', $product_id)->update(['product_status' => 1]);

        return back()->with('thongbao', 'Hiển thị sản phẩm mới thành công');
    }

    public function popular_product($product_id)
    {
        $this->AdminAuthCheck();

        Product::where('product_id', $product_id)->update(['product_status' => 2]);

        return back()->with('thongbao', 'Hiển thị sản phẩm phổ biến thành công');
    }

    public function outofstock_product($product_id)
    {
        $this->AdminAuthCheck();

        Product::where('product_id', $product_id)->update(['product_status' => 3]);

        return back()->with('thongbao', 'Hiển thị sản phẩm hết hàng thành công');
    }

    public function edit_product($product_id)
    {
        $this->AdminAuthCheck();

        $cate_product = DB::table('tbl_category_product')->orderByDesc('category_id')->get();
        $sub_cate_product = DB::table('tbl_sub_category')->orderByDesc('sub_category_id')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manage_product = view('admin.edit_product')
            ->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)
            ->with('sub_cate_product', $sub_cate_product);

        return View('admin_Layout')->with('admin.edit_product', $manage_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity_instock'] = $request->product_quantity_instock;
        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_weight'] = $request->product_weight;
        $data['product_unit'] = $request->product_unit;
        $data['product_origin'] = $request->product_origin;
        $data['product_netweight'] = $request->product_netweight;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product', $new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->where('product_id', $product_id)->update($data);

            return redirect('all-product')->with('thongbao', 'Cập nhật sản phẩm thành công');
        } else {
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);

            return redirect('all-product')->with('thongbao', 'Cập nhật sản phẩm thành công thành công');
        }
    }

    public function delete_product($product_id)
    {
        $this->AdminAuthCheck();

        Product::destroy($product_id);

        return back()->with('thongbao', 'Xóa sản phẩm thành công');
    }

    public function select_subcategory(Request $request)
    {

        $data = $request->all();

        if ($data['action']) {
            $output = '';
            $select_subcategory = SubCategory::where('category_id', $data['categoryId'])->get();
            foreach ($select_subcategory as $subcategory) {
                $output .= '<option value="' . $subcategory->sub_category_id . '">' . $subcategory->sub_category_name . '</option>';
            }
        }
        echo $output;
    }


    //Front end
    public function details_product($product_id)
    {
        $category_name = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', $product_id)
            ->select('tbl_product.category_id', 'tbl_category_product.category_name')->get();

        $sub_category_name = DB::table('tbl_product')
            ->join('tbl_sub_category', 'tbl_sub_category.sub_category_id', '=', 'tbl_product.sub_category_id')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', $product_id)
            ->select(
                'tbl_product.sub_category_id',
                'tbl_product.category_id',
                'tbl_sub_category.sub_category_name'
            )->get();

        $product_name = DB::table('tbl_product')->where('product_id', $product_id)->select('product_name')->get();

        $prod_name_ = DB::table('tbl_product')->where('product_id', $product_id)->select('product_name')->get();

        $prod_detail = DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->select('product_name', 'product_origin', 'product_weight')->get();

        $details_product = DB::table('tbl_product')->where('product_id', $product_id)->get();

        $same_product = DB::table('tbl_product')
            ->whereNotIn('product_id', [$product_id])
            ->orderByDesc('product_id')->limit(4)->get();

        return view('pages.product.show_details')
            ->with(compact(
                'product_name',
                'details_product',
                'category_name',
                'sub_category_name',
                'prod_name_',
                'prod_detail',
                'same_product'
            ));
    }
}
