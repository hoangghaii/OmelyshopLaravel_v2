@extends('admin_Layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body"></div>
                    <div class="position-center">
                        @foreach ($edit_product as $key => $product)
                        <form action="{{url('/update-product/' . $product -> product_id)}}" method="post" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name"
                                data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Tên sản phẩm ít nhất 3 ký tự"
                                 class="form-control" id="exampleInputEmail1" value="{{$product -> product_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                <input type="text" name="product_quantity_instock"
                                data-validation="required" data-validation="number" data-validation-allowing="range[1;999]" data-validation-error-msg="Số lượng sản phẩm cần được nhập"
                                 class="form-control" id="exampleInputEmail1" value="{{$product -> product_quantity_instock}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control js-subcate-choose"
                                data-validation="required" data-validation-error-msg="Danh mục cha cần được chọn">
                                    @foreach ($cate_product as $key => $category_product)
                                        @if ($category_product -> category_id == $product -> category_id)
                                            <option selected value={{$category_product -> category_id}}>
                                            {{$category_product -> category_name}}
                                            </option>
                                        @else
                                            <option value={{$category_product -> category_id}}>
                                            {{$category_product -> category_name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục sản phẩm con</label>
                                <select name="sub_category_id" class="form-control"
                                data-validation="required" data-validation-error-msg="Danh mục con cần được chọn">
                                    @foreach ($sub_cate_product as $key => $sub_cate_product)
                                        @if ($sub_cate_product -> sub_category_id == $product -> sub_category_id)
                                            <option selected value={{$sub_cate_product -> sub_category_id}}>
                                            {{$sub_cate_product -> sub_category_name}}
                                            </option>
                                        @else
                                            <option value={{$sub_cate_product -> sub_category_id}}>
                                            {{$sub_cate_product -> sub_category_name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea id="ckeditor5"
                                data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Mô tả sản phẩm ít nhất 3 ký tự"
                                style="resize:none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1">
                                {{$product -> product_desc}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea id="ckeditor6"
                                data-validation="required" data-validation="length" data-validation-length="min3" data-validation-error-msg="Nội dung sản phẩm ít nhất 3 ký tự"
                                style="resize:none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1">
                                {{$product -> product_content}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                <br><br>
                                <img src="{{url('uploads/product/'.$product -> product_image)}}" alt="" width="100" height="100">
                                <br><br>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="product_price"
                                data-validation="required" data-validation="number" data-validation-allowing="range[5000;1000000000]" data-validation-error-msg="Giá sản phẩm ít nhất từ 5.000đ"
                                class="form-control" id="exampleInputEmail1" value="{{$product -> product_price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cân nặng</label>
                                <input type="text" name="product_weight"
                                data-validation="required" data-validation="number" data-validation-error-msg="Cân nặng sản phẩm cần được nhập và là số"
                                class="form-control" id="exampleInputEmail1" value="{{$product -> product_weight}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Đơn vị tính</label>
                                <input type="text" name="product_unit"
                                data-validation="required" data-validation="text" data-validation-error-msg="Đơn vị tính sản phẩm cần được nhập"
                                class="form-control" id="exampleInputEmail1" value="{{$product -> product_unit}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xuất xứ</label>
                                <input type="text" name="product_origin"
                                data-validation="required" data-validation="text" data-validation-error-msg="Xuất xứ sản phẩm cần được nhập"
                                class="form-control" id="exampleInputEmail1" value="{{$product -> product_origin}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khối lượng tịnh</label>
                                <input type="text"
                                data-validation="required" data-validation="number" data-validation-error-msg="Khối lượng tịnh sản phẩm cần được nhập và là số"
                                name="product_netweight"
                                class="form-control" id="exampleInputEmail1" value="{{$product -> product_netweight}}">
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

    </div>
</div>

@endsection
