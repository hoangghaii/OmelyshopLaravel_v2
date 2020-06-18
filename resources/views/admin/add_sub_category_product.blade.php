@extends('admin_Layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm con
                </header>
                <div class="panel-body">

                    <div class="position-center">
                    <form action="{{url('/save-sub-category-product')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục con</label>
                            <input type="text"
                            data-validation="required" data-validation="length" data-validation-length="3-200" data-validation-error-msg="Tên danh mục con ít nhất 3 ký tự"
                            name="sub_category_product_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm cha</label>
                            <select
                            data-validation="required" data-validation-error-msg="Danh mục cha cần được chọn"
                            name="category_id" class="form-control">
                                @foreach ($category as $category)
                                <option value={{$category->category_id}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục con</label>
                            <textarea
                            data-validation="required" data-validation="length" data-validation-length="3-200" data-validation-error-msg="Mô tả danh mục con ít nhất 3 ký tự"
                            id="ckeditor4" style="resize:none" rows="8" class="form-control" name="sub_category_product_desc" id="exampleInputPassword1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Quản lý</label>
                            <select
                            data-validation="required" data-validation-error-msg="Quản lý hiển thị danh mục con cần được chọn"
                            name="sub_category_product_status" class="form-control">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="add_sub_category_product" class="btn btn-info">Thêm danh mục con</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>

@endsection
