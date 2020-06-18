@extends('admin_Layout')

@section('admin_content')


    {{ csrf_field() }}
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin khách hàng
            </div>
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th style="width: 30%">Địa chỉ</th>
                            <th>Thời gian đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer_by_order as $customer_by_order)
                        <tr>
                            <td>{{$customer_by_order->customer_name}}</td>
                            <td>{{$customer_by_order->customer_phone}}</td>
                            <td>{{$customer_by_order->customer_email}}</td>
                            <td>
                                {{$customer_by_order->customer_address}}, {{$customer_by_order->customer_ward}}, {{$customer_by_order->customer_district}}, {{$customer_by_order->customer_province}}
                            </td>
                            <td>{{$customer_by_order->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết đơn hàng
            </div>
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng tồn kho</th>
                            <th>Số lượng cần giao</th>
                            <th>Giá</th>
                            <th>Phí vận chuyển</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_by_id as $order_by_id)

                            <tr>
                                <td>{{$order_by_id->product_name}}</td>
                                <td>{{$order_by_id->product_quantity_instock}}</td>
                                <input type="hidden" name="product_sales_quantity" value="{{$order_by_id->product_quantity}}">
                                <input type="hidden" name="product_sales_id" value="{{$order_by_id->product_id}}">
                                <td>{{$order_by_id->product_quantity}}</td>
                                <td>{{number_format($order_by_id->product_price)}} đ</td>
                                <td>5,000 đ/sản phẩm</td>
                                <td>
                                {{number_format(($order_by_id->product_price + 5000) * $order_by_id->product_quantity)}}đ
                                </td>
                            </tr>

                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Tổng giá trị đơn hàng:</th>
                            <td>
                                @foreach ($order_total_byId as $order_total_byId)
                                {{$order_total_byId->order_total}} đ
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($order as $or)
            @if ($or -> order_status == 1)
                <form action="">
                    @csrf
                    <select class="form-control order_details" name="" id="">
                        <option id="{{$or -> order_id}}" value="">--------------Chọn hình thức xử lý--------------</option>
                        <option id="{{$or -> order_id}}" value="2">Giao đơn hàng</option>
                        <option id="{{$or -> order_id}}" value="3">Tạm giữ đơn hàng</option>
                        <option id="{{$or -> order_id}}" value="4">Hủy đơn hàng</option>
                        <option id="{{$or -> order_id}}" hidden></option>
                    </select>
                </form>
            @elseif($or -> order_status == 3)
                <form action="">
                    @csrf
                    <select class="form-control order_details" name="" id="">
                        <option id="{{$or -> order_id}}" value="">--------------Chọn hình thức xử lý--------------</option>
                        <option id="{{$or -> order_id}}" value="2">Giao đơn hàng</option>
                        <option id="{{$or -> order_id}}" value="4">Hủy đơn hàng</option>
                        <option id="{{$or -> order_id}}" hidden></option>
                    </select>
                </form>
            @endif
        @endforeach

    </div>

@endsection
