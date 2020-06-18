<!DOCTYPE html>

<head>

    <link rel="icon" href="{{('public/frontend/images/logo.ico')}}">

    <title>Trang quản trị Omely - Candy Shop</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/toastr.css')}}">

    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>

</head>

<body>

    <div class="log-w3">
        <div class="w3layouts-main">

            <h2>Đăng nhập</h2>
            <form action="{{url('/admin_dashboard')}}" method="post">
                {{ csrf_field() }}
                <!-- tạo token ngẫu nhiên -->
                <input type="text" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
                <span><input type="checkbox" />Nhớ lần đăng nhập tiếp theo</span>
                <h6><a href="javascript:{}">Quên mật khẩu?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập" name="login">
            </form>

        </div>
    </div>

    <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>

    <script src="{{asset('public/frontend/js/toastr.min.js')}}"></script>
    @if(session('thongbao'))
    <script type="text/javascript">
        toastr.success('{{ session('thongbao') }}', '', {timeOut: 3000});
    </script>
    @endif @if(session('error'))
    <script type="text/javascript">
        toastr.error('{{ session('error') }}', '', {timeOut: 3000});
    </script>
    @endif
</body>

</html>
