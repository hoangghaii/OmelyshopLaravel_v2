@extends('admin_Layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê sản phẩm
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng tồn kho</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Danh mục sản phẩm con</th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_product as $product)
                    <tr>
                        <td>{{$product -> product_name}}</td>
                        <td>{{$product -> product_quantity_instock}}</td>
                        <td>{{$product -> category_name}}</td>
                        <td>{{$product -> sub_category_name}}</td>
                        <td><img src="public/uploads/product/{{$product -> product_image}}" alt="" height="100px" width="100px"></td>
                        <td>{{number_format($product -> product_price)}}</td>
                        <td class="product">
                            <span class="text-ellipsis">
                            @if ($product->product_status == 3)
                            <a href="{{url('/popular-product/'.$product->product_id)}}">
                                <span class="product-display outofstock-product">Hết hàng</span>
                            </a>
                            @elseif($product->product_status == 2)
                            <a href="{{url('/new-product/'.$product->product_id)}}">
                                <span class="product-display popular-product">Phổ biến</span>
                            </a>
                            @elseif($product->product_status == 1)
                            <a href="{{url('/default-product/'.$product->product_id)}}">
                                <span class="product-display new-product">Mới</span>
                            </a>
                            @elseif($product->product_status == 0)
                            <a href="{{url('/outofstock-product/'.$product->product_id)}}">
                                <span class="product-display default-product">Mặc định</span>
                            </a>
                            @endif
                            </span>
                        </td>
                        <td>
                            <a href="{{url('/edit-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-pencil-square-o text-success text-active"></span>
                            </a>
                            <a href="{{url('/delete-product/'.$product->product_id)}}" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" class="active" ui-toggle-class="">
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
        {{ $all_product->links() }}
    </div>
</div>

@endsection
