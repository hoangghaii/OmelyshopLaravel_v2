@extends('admin_Layout')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh mục sản phẩm
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Quản lý</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $category)
                    <tr>
                        <td>{{$category -> category_name}}</td>
                        <td><span class="text-ellipsis">
                            @php
                              if($category->category_status == 0){
                            @endphp
                            <a href="{{url('/active-category-product/'.$category->category_id)}}">
                                <span class="fa fa-thumbs-down"></span>
                            </a>
                            @php
                            }else{
                            @endphp
                            <a href="{{url('/unactive-category-product/'.$category->category_id)}}">
                                <span class="fa fa-thumbs-up"></span>
                            </a>
                            @php
                                }
                            @endphp
                            </span>
                        </td>
                        <td>
                            <a href="{{url('/edit-category-product/'.$category->category_id)}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-pencil-square-o text-success text-active"></span>
                            </a>
                            <a href="{{url('/delete-category-product/'.$category->category_id)}}" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?');" class="active" ui-toggle-class="">
                                    <span class="fa fa-times text-danger text"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
