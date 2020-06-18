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
    <link rel="stylesheet" href="{{asset('public/frontend/css/style1.css')}}">
</head>

<body class="preloading">

    <!--- Loading page --->
    <div class="load" id="loading">
        <img src="{{asset('public/frontend/images/loading.gif')}}">
    </div>
    <!--- #End loading page --->

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
                            <a href="javascript:{}">Blog</a>
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

    <!-- Coming Soon -->
    <div class="bgimg">
        <div class="middle">
            <h1>Coming Soon</h1>
            <div class="container-count">
                <div class="count">
                    <div class="countd">
                        <span id="months">00</span>
                        MONTHS
                    </div>
                </div>
                <div class="count">
                    <div class="countd">
                        <span id="days">00</span>
                        DAYS
                    </div>
                </div>
                <div class="count">
                    <div class="countd">
                        <span id="hours">00</span>
                        HOURS
                    </div>
                </div>
                <div class="count">
                    <div class="countd">
                        <span id="minutes">00</span>
                        MINUTES
                    </div>
                </div>
                <div class="count">
                    <div class="countd">
                        <span id="seconds">00</span>
                        SECONDS
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/script.js')}}"></script>

    <script>
        var count = new Date("dec 1, 2020 00:00:00").getTime();
        var x = setInterval(() => {
            var now = new Date().getTime();
            var d = count - now;
            var months = Math.floor(d / (1000 * 60 * 60 * 24 * 7 * 4));
            var days = Math.floor(d / (1000 * 60 * 60 * 24 * 7));
            var hours = Math.floor((d % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((d % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((d % (1000 * 60)) / 1000);

            document.getElementById("months").innerHTML = months;
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            if (d <= 0) {
                clearInterval(x);
            }
        }, 1000);
    </script>

</body>

</html>
