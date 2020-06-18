<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/frontend/images/logo.ico')}}">
    <title>Omely Shop</title>
    <!-------- SEO -------->
    <meta name="description" content="Chuyên bán bánh kẹo nội ngoại chất lượng">
    <meta name="keywords" content="Bánh, Kẹo, Ngoại nhập, Bánh kẹo chất lượng, ngon"/>
    <meta name="robots" content="INDEX, FOLLOW"/>
    <meta name="author" content="NGuyễn Hoàng Hải"/>
    <!-------- #End SEO -------->
    <link rel="stylesheet" href="{{asset('public/frontend/fontawesome-pro-5.13.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/normal.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style1.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/toastr.css')}}">
</head>

<body class="preloading">

    <!--- Loading page --->
    <div class="load" id="loading">
        <img src="{{asset('public/frontend/images/loading.gif')}}">
    </div>
    <!--- #End loading page --->

    <!--- Scroll bar --->
    <div class="scroll-container">
        <div class="scroll-bar" id="myBar"></div>
    </div>
    <!--- #End scroll bar --->

    <!--- Header --->
    <header>
        <!--- Contact --->
        <div class="contact-container">
            <div class="container">
                <div class="contact-header">
                    <i class="far fa-phone-rotary"><span class=" phone"> 0964.226.542</span></i>
                    <i class="far fa-envelope-open-text"><span class="gmail"> nguyenhoanghai861@gmail.com</span></i>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-google-plus-g"></i>
                </div>
                <div class="registration">
                    @php
                        $customer_id = Session::get('customer_id');
                        $customer_name = Session::get('customer_name');
                    @endphp

                    @if ($customer_id != null)
                    <a href="{{url('/dang-xuat')}}" class="signIn" data-text="{{$customer_name}}">
                        {{$customer_name}}
                        <i class="fas fa-sign-out"></i>
                    </a>
                    @else
                    <a href="{{url('/dang-ky')}}" class="signIn" data-text="SignIn">
                        SignIn
                        <i class="fas fa-sign-in"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <!--- #End contact --->

        <!--- Menu --->
        <div class="menu">
            <div class="container">
                <!--- Logo --->
                <div class="logo">
                    <a href="{{url('/trang-chu')}}">
                        <img src="{{asset('public/frontend/images/Omely-logo-withtext.png')}}" alt="" />
                    </a>
                </div>
                <!--- #End logo --->

                <!--- Menu and submenu --->
                <div class="menu-left">
                    <ul class="nav-list">
                        <li>
                            <a href="{{url('/danh-muc-san-pham/1')}}">Bánh
                                <i class="fal fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/danh-muc-con/1/1')}}">Bánh Quy</a></li>
                                <li><a href="{{url('/danh-muc-con/1/2')}}">Bánh Gạo</a></li>
                                <li><a href="{{url('/danh-muc-con/1/3')}}">Bánh Socola</a></li>
                                <li><a href="{{url('/danh-muc-con/1/4')}}">Bánh Xốp</a></li>
                                <li><a href="{{url('/danh-muc-con/1/5')}}">Bánh Khác</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/danh-muc-san-pham/2')}}">Kẹo
                                <i class="fal fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/danh-muc-con/2/6')}}">Kẹo Mềm/Dẻo</a></li>
                                <li><a href="{{url('/danh-muc-con/2/7')}}">Kẹo Cứng</a></li>
                                <li><a href="{{url('/danh-muc-con/2/8')}}">Kẹo Socola</a></li>
                                <li><a href="{{url('/danh-muc-con/2/9')}}">Kẹo Khác</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/danh-muc-san-pham/3')}}">Đồ uống</a>
                        </li>
                        <li>
                            <a href="{{url('/danh-muc-san-pham/4')}}">Thực phẩm khác
                                <i class="fal fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/danh-muc-con/4/10')}}">Hạt Khô</a></li>
                                <li><a href="{{url('/danh-muc-con/4/11')}}">Trái Cây Khô</a></li>
                                <li><a href="{{url('/danh-muc-con/4/13')}}">Rau Củ Khô</a></li>
                                <li><a href="{{url('/danh-muc-con/4/16')}}">Thực Phẩm Chức Năng</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/coming-soon')}}">Blog</a>
                        </li>
                    </ul>
                </div>
                <!-- #End menu and submenu -->

                <!-- Search and shopping bag container -->
                <div class="search-shopping">
                    <form action="{{url('/tim-kiem')}}" method="post" id="search_box">
                        @csrf
                        <div class='search-box'>
                            <input type="text" name="search" id="input" class="search-txt" placeholder="Bạn muốn tìm gì ?">
                            <a href="javascript:{}" class="search-btn" onclick="document.getElementById('search_box').submit();">
                                <i class="far fa-search"></i>
                            </a>
                        </div>
                    </form>

                    <div class="shopping-bag">
                        <a href="javascript:{}" class="shopping-btn float-right" id="drawerCart">
                            <i class="fad fa-shopping-cart"></i>
                            <strong class="bag-quantity">
                                {{Cart::count()}}
                            </strong>
                        </a>
                        @php
                        $content = Cart::content();
                        @endphp
                        @if (Cart::count() > 0)
                            <div class="bag-cart" id="cart">
                                <div class="bag-cart-header">
                                    Giỏ hàng của bạn
                                </div>
                                    @foreach ($content as $item)
                                    <div class="cart-prod">
                                        <div class="cart-prod__img">
                                            <img src="{{url('public/uploads/product/'.$item -> options -> image)}}" alt="">
                                        </div>
                                        <div class="cart-prod__text">
                                            <div class="cart-prod__name">
                                                {{$item -> name}}
                                            </div>
                                            <div class="cart-prod__info">
                                                <div class="cart-prod__quantity">
                                                    <span class="weight">
                                                        {{$item -> weight}} g
                                                    </span>
                                                    - {{$item -> qty}} x
                                                    <span class="cart-prod__1price">
                                                        {{number_format($item -> price)}} đ
                                                    </span>
                                                </div>
                                                <a href="{{url('/xoa-san-pham/'.$item -> rowId)}}" class="cart-prod__delete">
                                                    <i class="fad fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                <hr>
                                <div class="total">Tạm tính:
                                    <span>{{Cart::subtotal()}} đ</span>
                                </div>
                                <div class="buy">
                                    <a href="{{url('/show-cart')}}" class="go-cart">Xem giỏ</a>
                                    <a href="{{url('/thanh-toan')}}" class="go-cart go-pay">Thanh toán</a>
                                </div>
                            </div>
                        @else
                            <div class="bag-cart" id="cart">
                                <div class="bag-cart-header">
                                    Giỏ hàng của bạn
                                </div>
                                <div class="empty-cart">
                                    Giỏ hàng của bạn đang trống, hãy mua một vài sản phẩm nhé!
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                <!--- #End search and shopping bag container --->
            </div>
        </div>
        <!--- #End menu --->
    </header>

    @yield('content')

    <footer>
        <div class="info">
            <div class="container">
                <div class="wrapper-left">
                    <img src="{{asset('public/frontend/images/logo-footer.png')}}" alt="">
                    <div class="content-left">
                        Omely - Candy & Snack Shop | Cửa hàng bánh kẹo nhập khẩu tại Tp. HCM với các sản phẩm từ
                        Thái,
                        Nhật,
                        Hàn, Malaysia, Indonesia, USA, Đức,...
                    </div>
                    <div class="content-left">- Giờ mở cửa: T2-CN (9h30 - 21h30)</div>
                    <ul>
                        <li>
                            <a href="{{url('/coming-soon')}}">
                                <i class="fab fa-facebook-f"></i>
                                <span class="wrapper-left_tooltip">Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/coming-soon')}}">
                                <i class="fab fa-instagram"></i>
                                <span class="wrapper-left_tooltip">Instagram</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/coming-soon')}}">
                                <i class="fab fa-twitter"></i>
                                <span class="wrapper-left_tooltip">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="wrapper-centerleft">
                    <div class="info-heading">Liên hệ</div>
                    <ul>
                        <li>
                            <i class="far fa-location-arrow"></i>
                            326/32/4 Lê Hồng Phong, Tp.Nha Trang, Tỉnh Khánh Hòa
                        </li>
                        <li>
                            <i class="far fa-phone-rotary"></i>
                            0964.226.542
                        </li>
                        <li>
                            <i class="far fa-envelope-open-text"></i>
                            Gmail-example@gmail.com
                        </li>
                    </ul>
                </div>
                <div class="wrapper-centerright">
                    <div class="info-heading">Omely shop</div>
                    <ul>
                        <li><a href="{{url('/coming-soon')}}">Giới thiệu</a></li>
                        <li><a href="{{url('/coming-soon')}}">Sản phẩm</a></li>
                        <li><a href="{{url('/coming-soon')}}">Blog</a></li>
                        <li><a href="{{url('/coming-soon')}}">Tuyển dụng</a></li>
                        <li><a href="{{url('/coming-soon')}}">Chính sách sử dụng</a></li>
                    </ul>
                </div>
                <div class="wrapper-right">
                    <div class="info-heading">Bài viết</div>
                    <ul>
                        <li>
                            <img src="{{asset('public/frontend/images/blog3.jpeg')}}" alt="">
                            <a href="{{url('/coming-soon')}}">
                                Top bánh kẹo ngoại không đường
                                thích hợp cho người ăn kiêng, tiểu đường.
                            </a>
                        </li>
                        <li>
                            <img src="{{asset('public/frontend/images/blog4.jpg')}}" alt="">
                            <a href="{{url('/coming-soon')}}">
                                Lollipop và sức ảnh hưởng mang lại cho giới trẻ.
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div>
                © 2020 <span>Omely - Candy house</span> . All rights reserved | Design by
                <a href="https://www.facebook.com/profile.php?id=100006885991030">
                    Nguyễn Hoàng Hải
                </a>
            </div>
        </div>

        <div class="gotop">TOP</div>
    </footer>

    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/number.js')}}"></script>
    <script src="{{asset('public/frontend/js/select2.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/validate.js')}}"></script>
    <script>$.validate({})public/;</script>
    <script src="{{asset('public/frontend/js/toastr.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/script.js')}}"></script>

    @if(session('thongbao'))
	<script>
		messageSuccess('{{ session('thongbao') }}');
	</script>
    @endif

    @if(session('error'))
        <script>
            messageError('{{ session('error') }}');
        </script>
    @endif

    <script>
        $(".js-choose").change(function () {
        var action = $(this).attr("id");
        var locationId = $(this).val();
        var _token = $('input[name = "_token"]').val();
        var result = "";

        if (action == "province") result = "district";
        else result = "ward";

        $.ajax({
            url: '{{url('/select-location')}}',
            method: "post",
            data: {
                action: action,
                locationId: locationId,
                _token: _token,
            },
            success: function (data) {
                $("#" + result).html(data);
            },
            error: function () {
                toastr.error("Có lỗi xảy ra,xin hãy thử lại sau!", "Thông báo");
            },
        });
    });
    </script>

    <script>
        $(".sale").click(function () {
        var id = $(this).data("id_product");

        var cart_product_id = $(".cart_product_id_" + id).val();
        var cart_product_name = $(".cart_product_name_" + id).val();
        var cart_product_image = $(".cart_product_image_" + id).val();
        var cart_product_price = $(".cart_product_price_" + id).val();
        var cart_product_weight = $(".cart_product_weight_" + id).val();
        var cart_product_qty = $(".cart_product_qty_" + id).val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{url("/add-cart-ajax")}}',
            method: "POST",
            data: {
                cart_product_id: cart_product_id,
                cart_product_name: cart_product_name,
                cart_product_image: cart_product_image,
                cart_product_price: cart_product_price,
                cart_product_qty: cart_product_qty,
                cart_product_weight: cart_product_weight,
                _token: _token,
            },
            success: function (data) {
                toastr.success("Đã thêm sản phẩm vào giỏ hàng", "Thông báo");
                location.reload();
            },
            error: function () {
                toastr.error("Có lỗi xảy ra, xin hãy thử lại sau!", "Thông báo");
            },
        });
    });
    </script>

</body>

</html>
