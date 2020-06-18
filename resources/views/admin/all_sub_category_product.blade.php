@extends('admin_Layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh mục con
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Danh mục con</th>
                        <th>Danh mục cha</th>
                        <th>Quản lý</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_sub_category as $sub_cate_pro)
                    <tr>
                        <td>{{$sub_cate_pro -> sub_category_name}}</td>
                        <td>{{$sub_cate_pro -> category_name}}</td>
                        <td><span class="text-ellipsis">
                            @php
                              if($sub_cate_pro->sub_category_status == 0){
                            @endphp
                            <a href="{{url('/active-sub-category-product/'.$sub_cate_pro->sub_category_id)}}">
                                <span class="fa fa-thumbs-down"></span>
                            </a>
                            @php
                            }else{
                            @endphp
                            <a href="{{url('/unactive-sub-category-product/'.$sub_cate_pro->sub_category_id)}}">
                                <span class="fa fa-thumbs-up"></span>
                            </a>
                            @php
                                }
                            @endphp
                            </span>
                        </td>
                        <td>
                            <a href="{{url('/edit-sub-category-product/'.$sub_cate_pro->sub_category_id)}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-pencil-square-o text-success text-active"></span>
                            </a>
                            <a href="{{url('/delete-sub-category-product/'.$sub_cate_pro->sub_category_id)}}" onclick="return confirm('Bạn có chắc muốn xóa danh mục con này?');" class="active" ui-toggle-class="">
                                    <span class="fa fa-times text-danger text"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{ $all_sub_category->links() }}
    </div>
</div>

@endsection
