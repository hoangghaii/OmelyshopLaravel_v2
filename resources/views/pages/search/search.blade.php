@extends('layout')

@section('content')

<section class="cate-banner">
    <div class="bg"></div>
    <div class="title middle">
        Tìm kiếm
    </div>
    <div class="sect-breadcrumbs middle">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="{{url('/trang-chu')}}" class="breadcrumbs__link">Trang chủ</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="javacript:{}" class="breadcrumbs__link breadcrumbs__link--active">
                        Tìm kiếm
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="cate-content">
    <div class="container">

        @if (session('error'))
        <div class="text-error">{{session('error')}}</div>
        @else
            <div class="cate-container">
                <div class="cate-left">
                    <hr>
                    <div class="cate-left_content">
                        <div class="product-grid">

                            @foreach ($result as $result_search)
                                @if ($result_search->product_status != 3)
                                    <div>
                                        <div class="__1prod">
                                            <div class="img-prod">
                                                <img src="{{url('public/uploads/product/'.$result_search -> product_image)}}" alt="" class="img-fluid">
                                                <a href="{{url('/chi-tiet-san-pham/'.$result_search -> product_id)}}" class="sale">
                                                    <i class="far fa-shopping-bag">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </i>
                                                </a>
                                            </div>
                                            <a href="{{url('/chi-tiet-san-pham/'.$result_search -> product_id)}}" class="prod-heading">
                                                {{$result_search -> product_name}}
                                            </a>
                                            <div class="prod-star">
                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-half" aria-hidden="true"></i></li>
                                                    <div class="evaluate"> ( 50 đánh giá )</div>
                                                </ul>
                                            </div>
                                            <div class="prod-price">{{number_format($result_search -> product_price)}}đ</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="oot-product">
                                        <div class="__1prod">
                                            <div class="img-prod">
                                                <span class="prod-badge">Hết hàng</span>
                                                <img src="{{url('public/uploads/product/'.$result_search -> product_image)}}" alt="" class="img-fluid">
                                            </div>
                                            <a href="javascript:{}" class="prod-heading">
                                                {{$result_search -> product_name}}
                                            </a>
                                            <div class="prod-star">
                                                <ul>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <div class="evaluate"> ( {{mt_rand(1, 20)}} đánh giá )</div>
                                                </ul>
                                            </div>
                                            <div class="prod-price">{{number_format($result_search -> product_price)}}đ</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                    {{ $result->links() }}

                </div>

                <div class="cate-right">
                    <h3 class="cate-right_title">Danh mục sản phẩm</h3>
                    <hr>
                    <ul class="cate-nav-list">
                        <li>
                            <a href="{{url('/danh-muc-san-pham/1')}}">
                                Bánh
                                <i class="fal fa-angle-down"></i>
                            </a>
                            <ul class="cate-sub-menu">
                                <li><a href="{{url('/danh-muc-con/1/1')}}">Bánh Quy</a></li>
                                <li><a href="{{url('/danh-muc-con/1/2')}}">Bánh Gạo</a></li>
                                <li><a href="{{url('/danh-muc-con/1/3')}}">Bánh Sicula</a></li>
                                <li><a href="{{url('/danh-muc-con/1/4')}}">Bánh Xốp</a></li>
                                <li><a href="{{url('/danh-muc-con/1/5')}}">Bánh Khác</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/danh-muc-san-pham/2')}}">
                                Kẹo
                                <i class="fal fa-angle-down"></i>
                            </a>
                            <ul class="cate-sub-menu">
                                <li><a href="{{url('/danh-muc-con/2/6')}}">Kẹo Mềm/Dẻo</a></li>
                                <li><a href="{{url('/danh-muc-con/2/7')}}">Kẹo Cứng</a></li>
                                <li><a href="{{url('/danh-muc-con/2/8')}}">Kẹo Sicula</a></li>
                                <li><a href="{{url('/danh-muc-con/2/9')}}">Kẹo Khác</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/danh-muc-san-pham/3')}}">Đồ uống</a></li>
                        <li>
                            <a href="{{url('/danh-muc-san-pham/4')}}">
                                Thực phẩm khác
                                <i class="fal fa-angle-down"></i>
                            </a>
                            <ul class="cate-sub-menu">
                                <li><a href="{{url('/danh-muc-con/4/10')}}">Hạt Khô</a></li>
                                <li><a href="{{url('/danh-muc-con/4/11')}}">Trái Cây Khô</a></li>
                                <li><a href="{{url('/danh-muc-con/4/13')}}">Rau Củ Khô</a></li>
                                <li><a href="{{url('/danh-muc-con/4/16')}}">Thực Phẩm Chức Năng</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        @endif

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
