@extends('admin_Layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm con
                </header>
                <div class="panel-body">
                    @foreach ($edit_sub_category as $edit_value)
                    <div class="position-center">
                        <form action="{{url('/update-sub-category-product/'.$edit_value->sub_category_id)}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục con</label>
                                <input type="text"
                                data-validation="required" data-validation="length" data-validation-length="3-200" data-validation-error-msg="Tên danh mục con ít nhất 3 ký tự"
                                value="{{$edit_value->sub_category_name}}" name="sub_category_product_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục sản phẩm cha</label>
                                <select
                                data-validation="required" data-validation-error-msg="Danh mục cha cần được chọn"
                                name="category_id" class="form-control">
                                    @foreach ($cate_product as $key => $category_product)
                                        @if ($category_product -> category_id == $edit_value -> category_id)
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
                                <label for="exampleInputPassword1">Mô tả danh mục con</label>
                                <textarea id="ckeditor7"
                                data-validation="required" data-validation="length" data-validation-length="3-200" data-validation-error-msg="Mô tả danh mục con ít nhất 3 ký tự"
                                style="resize:none" rows="8" class="form-control" name="sub_category_product_desc" id="exampleInputPassword1">
                                    {{$edit_value->sub_category_desc}}
                                </textarea>
                            </div>
                            <button type="submit" name="add_sub_category_product" class="btn btn-info">Cập nhật danh mục con</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>

@endsection
