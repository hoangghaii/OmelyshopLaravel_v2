@extends('layout')

@section('content')
<!--- Big slide --->
<section class="cate-banner">
    <div class="bg"></div>
    <div class="title middle">Checkout</div>
    <div class="sect-breadcrumbs middle">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="{{url('/trang-chu')}}" class="breadcrumbs__link">Trang chủ</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="javascript:{}" class="breadcrumbs__link breadcrumbs__link--active">Đặt hàng</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--- #End big slide --->

<section>
    <form action="{{url('/dat-hang')}}" method="POST" id="add_shipping">
        @csrf
        <section class="cart-details">
            <div class="container">
                <div class="cart-details_left">
                    <h3>Chi tiết hóa đơn</h3>
                    <form>

                        @php
                            $customer_id =Session::get('customer_id');
                        @endphp

                        @if ($customer_id)
                            @foreach ($customer_info as $customer_info)
                                <div class="floating-label">
                                    <input class="float_input" type="text" name="inputName" id="inputName" readonly
                                        value="{{$customer_info->customer_name}}">
                                    <label class="form-label" for="inputName">Họ và tên</label>
                                </div>

                                <div class="floating-label">
                                    <input class="float_input" type="text" name="inputPhone" id="inputPhone"
                                        value="{{$customer_info->customer_phone}}" readonly>
                                    <label class="form-label" for="inputPhone">Số điện thoại</label>
                                </div>

                                <div class="floating-label">
                                    <input class="float_input" type="email" name="inputMail" id="inputMail"
                                        value="{{$customer_info->customer_email}}" readonly>
                                    <label class="form-label" for="inputMail">Địa chỉ email</label>
                                </div>

                                <div class="floating-label">
                                    <input class="float_input" type="email" name="inputMail" id="inputMail"
                                        value="{{$customer_info->customer_province}}" readonly>
                                    <label class="form-label" for="inputMail">Tỉnh/Thành phố</label>
                                </div>

                                <div class="floating-label">
                                    <input class="float_input" type="email" name="inputMail" id="inputMail"
                                         value="{{$customer_info->customer_district}}" readonly>
                                    <label class="form-label" for="inputMail">Quận/Huyện</label>
                                </div>

                                <div class="floating-label">
                                    <input class="float_input" type="email" name="inputMail" id="inputMail"
                                        value="{{$customer_info->customer_ward}}" readonly>
                                    <label class="form-label" for="inputMail">Xã/Phường</label>
                                </div>

                                <div class="floating-label">
                                    <input class="float_input" type="text" name="inputAddress" id="inputAddress"
                                        value="{{$customer_info->customer_address}}" readonly>
                                    <label class="form-label" for="inputAddress">Địa chỉ</label>
                                </div>
                                <div class="checkboxs">
                                    <label for="checkboxNewsletter">
                                        <input type="checkbox" name="checkboxNewsletter" id="checkboxNewsletter">
                                        <span class="label-text">Đăng ký nhận bản tin</span>
                                    </label>
                                    <label for="checkboxCreacc">
                                        <input type="checkbox" name="checkboxCreacc" id="checkboxCreacc" checked>
                                        <span class="label-text">Create an account?</span>
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <div class="floating-label">
                                <input class="float_input" type="text" name="inputName" id="inputName"
                                    data-validation="required" data-validation="length" data-validation-length="5-200" data-validation-error-msg="Bạn chưa nhập đúng họ và tên"
                                    placeholder="Họ và tên*" required>
                                <label class="form-label" for="inputName">Họ và tên*</label>
                            </div>

                            <div class="floating-label">
                                <input class="float_input" type="text" name="inputPhone" id="inputPhone"
                                data-validation="required" data-validation="number" data-validation-allowing="range[0;10]" data-validation-error-msg="Bạn nên nhập đúng định dạng só điện thoại"
                                    placeholder="Số điện thoại*" required>
                                <label class="form-label" for="inputPhone">Số điện thoại*</label>
                            </div>

                            <div class="floating-label">
                                <input class="float_input" type="email" name="inputMail" id="inputMail"
                                    data-validation="email" data-validation-error-msg="Bạn cần nhập đúng định dạng email"
                                    placeholder="Địa chỉ email (tùy chọn)">
                                <label class="form-label" for="inputMail">Địa chỉ email</label>
                            </div>

                            <div class="selected">
                                <select class="js-select js-choose" id="province" name="province" required
                                data-validation="required" data-validation-error-msg="Bạn cần chọn tỉnh, thành phố">
                                    <option value="" disabled selected></option>

                                    @foreach ($province as $province)
                                    <option value="{{$province->matp}}">{{$province->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="selected">
                                <select class="js-select js-choose" id="district" name="district" required
                                data-validation="required" data-validation-error-msg="Bạn cần chọn quận,huyện">
                                    <option value="" disabled selected></option>
                                </select>
                            </div>

                            <div class="selected">
                                <select class="js-select" id="ward" name="ward" required
                                data-validation="required" data-validation-error-msg="Bạn cần chọn xã, phường">
                                    <option value="" disabled selected></option>
                                </select>
                            </div>

                            <div class="floating-label">
                                <input class="float_input" type="text" name="inputAddress" id="inputAddress"
                                    data-validation="required" data-validation="length" data-validation-error-msg="Bạn chưa nhập địa chỉ"
                                    placeholder="Địa chỉ*" required>
                                <label class="form-label" for="inputAddress">Địa chỉ*</label>
                            </div>
                            <div class="checkboxs">
                                <label for="checkboxNewsletter">
                                    <input type="checkbox" name="checkboxNewsletter" id="checkboxNewsletter">
                                    <span class="label-text">Đăng ký nhận bản tin</span>
                                </label>
                                <label for="checkboxCreacc">
                                    <input type="checkbox" name="checkboxCreacc" id="checkboxCreacc" checked>
                                    <span class="label-text">Create an account?</span>
                                </label>
                            </div>
                        @endif

                </div>

                <div class="cart-details_right">
                    <div class="box-images">
                        <div class="front-image"></div>
                        <div class="back-image"></div>
                    </div>
                </div>

            </div>
        </section>

        <section class="your-cart">
            <div class="container">
                <h3>Đơn hàng của bạn</h3>

                @php
                $content = Cart::content();
                @endphp

                <table class="tbl-1">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th class="th-price">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($content as $value)
                        <tr>
                            <td class="td-product">
                                {{$value -> name}} - {{$value -> weight}} g <br>
                                x <span>{{$value -> qty}}</span>
                            </td>
                            <td class="td-price">{{number_format($value -> price)}} đ</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <table class="tbl-2">
                    <tr>
                        <th>Tạm tính</th>
                        <td class="td-price td-1">{{Cart::subtotal()}} đ</td>
                    </tr>
                    <tr>
                        <th>Vận chuyển & thuế</th>
                        <td class="td-price td-2">5.000đ/sản phẩm</td>
                    </tr>
                    <tr>
                        <th>Tổng</th>
                        <td class="td-price td-3">{{Cart::total()}} đ</td>
                    </tr>
                </table>
                <div class="checkout-footer1">
                    COD - Giao Hàng Trả Tiền <br>
                    Thanh toán khi nhận hàng.
                </div>
                <div class="checkout-footer2">
                    Thông tin cá nhân của bạn sẽ được dùng để hỗ trợ trải nghiệm tại website, để quản lý truy cập tài khoản
                    của bạn, và những mục đích khác được mô tả trong chính sách sử dụng
                    <a href="javascript:{}">chính sách riêng tư</a>.
                </div>
                <a href="javascript:{}" onclick="document.getElementById('add_shipping').submit();" type="button" class="get-order" id="order">
                    Đặt hàng
                </a>
            </div>
        </section>
    </form>
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
