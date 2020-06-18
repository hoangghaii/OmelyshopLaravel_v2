@extends('layout')

@section('content')
<section class="cate-banner">
    <div class="bg"></div>
    <div class="title middle">
        @foreach ($sub_category_name as $sub_category_name)
        {{$sub_category_name -> sub_category_name}}
        @endforeach
    </div>
    <div class="sect-breadcrumbs middle">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="{{url('/trang-chu')}}" class="breadcrumbs__link">Trang chủ</a>
                </li>
                <li class="breadcrumbs__item">
                    @foreach ($category_name as $category_name)
                    <a href="{{url('/danh-muc-san-pham/'.$category_name -> category_id)}}" class="breadcrumbs__link">
                        {{$category_name -> category_name}}
                    </a>
                    @endforeach
                </li>
                <li class="breadcrumbs__item">
                    @foreach ($breadcrumb_category_name as $breadcrumb_category_name)
                    <a href="" class="breadcrumbs__link breadcrumbs__link--active">
                        {{$breadcrumb_category_name -> sub_category_name}}
                    </a>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="cate-content">
    <div class="container">
        <div class="cate-header">
            <i class="fas fa-quote-left"></i>
            @foreach ($sub_cate_name as $sub_cate_name)
            Shop bánh kẹo Omely – Candy & Snack Shop với rất nhiều loại
            <span style="text-transform: lowercase">{{$sub_cate_name -> sub_category_name}}</span> thơm ngon,
            bổ dưỡng và đầy đủ mùi vị chắc chắn phù hợp với khẩu vị của các bạn. 😗
            @endforeach
            <i class="fas fa-quote-right"></i>
        </div>

        <div class="cate-container">
            <div class="cate-left">
                <hr>
                <div class="cate-left_content">
                    <div class="product-grid">

                        @foreach ($products as $product)
                            @if ($product->product_status != 3)
                                <div>
                                    <div class="__1prod">
                                        <div class="img-prod">
                                            <img src="{{url('public/uploads/product/'.$product -> product_image)}}" alt="" class="img-fluid">
                                            <form>
                                                @csrf
                                                <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                                <a href="javascript:{}" class="sale" data-id_product="{{$product->product_id}}">
                                                    <i class="far fa-shopping-bag">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </i>
                                                </a>
                                            </form>
                                        </div>
                                        <a href="{{url('/chi-tiet-san-pham/'.$product -> product_id)}}" class="prod-heading">
                                            {{$product -> product_name}}
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
                                        <div class="prod-price">{{number_format($product -> product_price)}}đ</div>
                                    </div>
                                </div>
                            @else
                                <div class="oot-product">
                                    <div class="__1prod">
                                        <div class="img-prod">
                                            <span class="prod-badge">Hết hàng</span>
                                            <img src="{{url('public/uploads/product/'.$product -> product_image)}}" alt="" class="img-fluid">
                                        </div>
                                        <a href="javascript:{}" class="prod-heading">
                                            {{$product -> product_name}}
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
                                        <div class="prod-price">{{number_format($product -> product_price)}}đ</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                {{ $products->links() }}

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
