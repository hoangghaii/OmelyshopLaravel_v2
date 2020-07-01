@extends('admin_Layout')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thống kê đơn hàng
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width: 12%">Ngày</th>
                        <th>Tổng đơn hàng</th>
                        <th>Chưa xử lý</th>
                        <th>Đã giao hàng</th>
                        <th>Đang tạm giữ</th>
                        <th>Đã hủy</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sta_ord as $sta_order)
                    <tr>
                        <td>
                            {{ \Carbon\Carbon::parse($sta_order->created_at)->format('d/m/Y')}}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                        <td></td>
                        <td>
                            <a href="{{url('/view-detail-sta_order/')}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-eye text-success text-active"></span>
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
