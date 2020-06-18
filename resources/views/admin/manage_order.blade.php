@extends('admin_Layout')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê đơn hàng
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width: 12%">Mã đơn hàng</th>
                        <th>Tên người đặt</th>
                        <th>Tổng giá tiền</th>
                        <th>Tình trạng</th>
                        <th>Thời gian đặt hàng</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_order as $all_order)
                    <tr>
                        <td>{{$all_order -> order_id}}</td>
                        <td>{{$all_order -> customer_name}}</td>
                        <td>{{$all_order -> order_total}}</td>
                        <td>
                            @if ($all_order -> order_status == 1)
                                Đang chờ xử lý
                            @elseif($all_order -> order_status == 2)
                                Đã xử lý
                            @elseif($all_order -> order_status == 3)
                                Tạm giữ đơn hàng
                            @else
                                Đã hủy đơn
                            @endif
                        </td>
                        <td>{{$all_order -> created_at}}</td>
                        <td>
                            <a href="{{url('/view-order/' . $all_order -> order_id)}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-eye text-success text-active"></span>
                            </a>
                            <a href="{{url('/delete-order/' . $all_order -> order_id)}}" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?');" class="active" ui-toggle-class="">
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
