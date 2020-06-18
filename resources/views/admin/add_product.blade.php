@extends('admin_Layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">

                    <div class="position-center">
                    <form action="{{url('/save-product')}}" method="post" role="form" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text"
                            data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Tên sản phẩm ít nhất 3 ký tự"
                            name="product_name" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                            <input type="text"
                            data-validation="required" data-validation="number" data-validation-allowing="range[1;999]" data-validation-error-msg="Số lượng sản phẩm cần được nhập"
                            name="product_quantity_instock" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm cha</label>
                            <select
                            data-validation="required" data-validation-error-msg="Danh mục cha cần được chọn"
                            name="category_id" id="category_id" class="form-control js-subcate-choose" required>
                                <option value=""></option>
                                @foreach ($category as $category)
                                <option value={{$category->category_id}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm con</label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea
                            data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Mô tả sản phẩm ít nhất 3 ký tự"
                            id="ckeditor" style="resize:none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea
                            data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Nội dung sản phẩm ít nhất 3 ký tự"
                            id="ckeditor1" style="resize:none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                            <input type="file"
                            data-validation="required" data-validation="mime" data-validation-allowing="jpg, png, jpeg" data-validation-error-msg="Hình ảnh sản phẩm cần được chọn theo định dạng jpg, png, jpeg"
                            name="product_image" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text"
                            data-validation="required" data-validation="number" data-validation-allowing="range[5000;1000000000]" data-validation-error-msg="Giá sản phẩm ít nhất từ 5.000đ"
                            name="product_price" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cân nặng</label>
                            <input type="text"
                            data-validation="required" data-validation="number" data-validation-error-msg="Cân nặng sản phẩm cần được nhập và là số"
                            name="product_weight" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đơn vị tính</label>
                            <input type="text"
                            data-validation="required" data-validation="text" data-validation-error-msg="Đơn vị tính sản phẩm cần được nhập"
                            name="product_unit" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text"
                            data-validation="required" data-validation="text" data-validation-error-msg="Xuất xứ sản phẩm cần được nhập"
                            name="product_origin" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khối lượng tịnh</label>
                            <input type="text"
                            data-validation="required" data-validation="number" data-validation-error-msg="Khối lượng tịnh sản phẩm cần được nhập và là số"
                            name="product_netweight" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label>
                            <select name="product_status" class="form-control" required
                            data-validation="required" data-validation-error-msg="Hiển thị sản phẩm cần được chọn">
                                <option value="0">Mặc định</option>
                                <option value="1">Mới</option>
                                <option value="2">Phổ biến</option>
                                <option value="3">Hết hàng</option>
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>

@endsection
