@extends('admin_Layout')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thống kê sản phẩm
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng tồn kho</th>
                        <th>Số lượng đã bán</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sta_product as $sta_prd)
                    <tr>
                        <td>{{$sta_prd->product_id}}</td>
                        <td>{{$sta_prd->product_name}}</td>
                        <td>
                            <img src="public/uploads/product/{{$sta_prd -> product_image}}" alt="" height="80px" width="80px">
                        </td>
                        <td>{{$sta_prd->product_quantity_instock}}</td>
                        <td>{{$sta_prd->product_sold}}</td>
                        <td>
                            <a href="{{url('/view-detail-sta_product/')}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-eye text-success text-active"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center" style="margin-top: 20px">{{ $sta_product->links() }}</div>
</div>

@endsection
