@extends('admin_Layout')

@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">

                    <div class="position-center">
                    <form action="{{url('/save-category-product')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text"
                            data-validation="required" data-validation="length" data-validation-length="3-200" data-validation-error-msg="Tên danh mục ít nhất 3 ký tự"
                            name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Mô tả danh mục ít nhất 3 ký tự" id="ckeditor3" style="resize:none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Quản lý</label>
                            <select
                            data-validation="required" data-validation-error-msg="Quản lý hiển thị danh mục cần được chọn"
                            name="category_product_status" class="form-control">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>

@endsection
