@extends('layout')

@section('content')
<!--- Big slide --->
<section class="cate-banner">
    <div class="bg"></div>
    <div class="title middle">Giỏ hàng</div>
    <div class="sect-breadcrumbs middle">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="{{url('/trang-chu')}}" class="breadcrumbs__link">Trang chủ</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="javascript:{}" class="breadcrumbs__link breadcrumbs__link--active">Giỏ hàng</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--- #End big slide --->

<section class="table-cart">
    <div class="container">
        @php
        $content = Cart::content();
        @endphp

        <table class="table-prod">
            <thead>
                <tr>
                    <th class="column-delete"></th>
                    <th class="column-prod">Sản phẩm</th>
                    <th class="column-price">Giá</th>
                    <th class="column-quantity">Số lượng</th>
                    <th class="column-total">Tổng</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($content as $v_content)
                <tr>
                    <td class="column-delete">
                        <a href="{{url('/xoa-san-pham/'.$v_content -> rowId)}}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                    <td class="column-prod">
                        <div class="cart_prod-img">
                            <img src="{{url('public/uploads/product/'.$v_content -> options -> image)}}" alt="">
                        </div>
                        <div class="cart_prod-name">
                            {{$v_content -> name}}
                        </div>
                    </td>
                    <td class="column-price">{{number_format($v_content -> price)}} đ</td>
                    <td class="column-quantity">
                        <form action="{{url('/cap-nhat-gio-hang')}}" method="post" id="updateCartQuantity">
                            @csrf
                            <input type="hidden" name="rowId_cart" value="{{$v_content -> rowId}}">
                            <input type="number" name="cart_quantity" id="prod-quantity" value="{{$v_content -> qty}}" step="1" min="1" max="99"
                                readonly>
                            <a class="update-cart" href="javascript:{}" onclick="document.getElementById('updateCartQuantity').submit()">
                                Cập nhật
                            </a>
                        </form>
                    </td>
                    <td class="column-total">
                        @php
                            $subtotal = $v_content -> price * $v_content -> qty;
                            echo number_format($subtotal);
                        @endphp đ
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
        <div class="ordering">
            <div class="order">
                <div class="order-heading">Đơn hàng</div>
                <h3>Tổng</h3>
                <table class="order-calcu">
                    <tr>
                        <th>Tạm tính:</th>
                        <td>{{Cart::subtotal()}} đ</td>
                    </tr>
                    <tr>
                        <th>Thành tiền:</th>
                        <td>{{Cart::total()}} đ</td>
                    </tr>
                </table>
            </div>
            <div class="tax">
                <div class="tax-heading">Ước tính</div>
                <h3>Phí vận chuyển & thuế</h3>
                <div class="tax-total">5.000 đ/sản phẩm</div>
                <a href="javascript:{}" class="tax-calcu">Tính vận chuyển</a>
            </div>
        </div>
    <a href="{{url('/thanh-toan')}}" class="action-ordering">
            Tiến hành thanh toán &rarr;
        </a>
    </div>
</section>

<section class="getinfo">
    <div class="container">
        <h3>Bản tin omely - candy shop</h3>
        <div class="">
            <span class="float-left">đăng ký nhận bản tin từ chúng tôi</span>
            <div class="input_getinfo float-right">
                <input type="text" name="" id="" placeholder="Your email address">
                <button id="submit">Submit</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
@endsection
