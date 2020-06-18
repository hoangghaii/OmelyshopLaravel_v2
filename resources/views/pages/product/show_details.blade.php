@extends('layout')

@section('content')
<section class="cate-banner">
    <div class="bg"></div>
    <div class="title middle">
        @foreach ($product_name as $product_name)
        {{$product_name -> product_name}}
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
                    @foreach ($sub_category_name as $sub_category_name)
                    <a href="{{url('/danh-muc-con/'.$sub_category_name -> category_id.'/'.$sub_category_name -> sub_category_id)}}" class="breadcrumbs__link">
                        {{$sub_category_name -> sub_category_name}}
                    </a>
                    @endforeach
                </li>
                <li class="breadcrumbs__item">
                    @foreach ($prod_name_ as $prod_name_)
                    <a href="" class="breadcrumbs__link breadcrumbs__link--active">
                        {{$prod_name_ -> product_name}}
                    </a>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</section>

<!--- Breadcrumbs --->

<!--- #End Breadcrumbs --->

<section class="cate-content prod-content">
    <div class="container">
        <div class="cate-container">

            @foreach ($details_product as $product)
            <div class="cate-left">
                <div class="prod-wrapper">
                    <div class="prod-left">
                        <div class="img-magnifier-container">
                            <img id="prod_image" src="{{url('public//uploads/product/'.$product -> product_image)}}" alt="" />
                        </div>
                    </div>
                    <div class="prod-right">
                        <div href="javascript:{}" class="prod-name">{{$product -> product_name}}</div>
                        <div class="prod-rating">
                            <div class="rating">
                                <input type="radio" name="star" id="star1"><label for="star1"></label>
                                <input type="radio" name="star" id="star2"><label for="star2"></label>
                                <input type="radio" name="star" id="star3"><label for="star3"></label>
                                <input type="radio" name="star" id="star4"><label for="star4"></label>
                                <input type="radio" name="star" id="star5"><label for="star5"></label>
                            </div>
                            <a href="javascript:{}" class="rating-link">80 đánh giá</a>
                        </div>
                        <div class="prod-decription">
                            {{$product -> product_desc}}
                        </div>
                        <div class="price">{{number_format($product -> product_price)}}đ</div>
                        <form action="{{url('/mua-san-pham')}}" method="post" id="buy_product">
                            {{ csrf_field() }}
                            <div class="quantity__card">
                                <input type="number" name="quantity" id="prod-quantity" value="1" step="1" min="1" max="99"
                                    readonly>
                                <input type="hidden" name="productId_hidden" value="{{$product -> product_id}}">
                                <a href="javascript:{}" class="prod-cart" onclick="document.getElementById('buy_product').submit()">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Mua hàng
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="prod-footer">
                    <div class="prod-footer__title">
                        <a href="#prod-footer__content--desc" class="active">Mô tả</a>
                        <a href="#prod-footer__content--info">Thông tin sản phẩm</a>
                    </div>
                    <div class="prod-footer__content">
                        <div class="prod-footer__content--prod content--desc active" id="prod-footer__content--desc">
                            <p>
                                {{$product -> product_content}}
                            </p>
                        </div>
                        <div class="prod-footer__content--prod" id="prod-footer__content--info">
                            <table>
                                <tr>
                                    <th>Cân Nặng</th>
                                    <td>{{$product -> product_weight}}g</td>
                                </tr>
                                <tr>
                                    <th>Đơn Vị Tính</th>
                                    <td>{{$product -> product_unit}}</td>
                                </tr>
                                <tr>
                                    <th>Xuất xứ</th>
                                    <td>{{$product -> product_origin}}</td>
                                </tr>
                                <tr>
                                    <th>Khối lượng tịnh</th>
                                    <td>{{$product -> product_netweight}}g</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

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

<div class="container">
    <hr>
</div>

<section class="about">
    <div class="container">
        @foreach ($prod_detail as $prod_detail)
        <h3>Nơi bán {{$prod_detail->product_name}} – {{$prod_detail->product_origin}} – {{$prod_detail->product_weight}}g ở Nha Trang</h3>
        <p>
            Các bạn ở TP. Nha Trang có nhu cầu mua sản phẩm thì có thể đến Omely - Candy & Snack Shop. Tuy nhiên nếu
            bạn không ở tại TP.Nha Trang thì shop vẫn có dịch vụ SHIP TOÀN QUỐC giúp bạn có thể trải nghiệm sản phẩm
            {{$prod_detail->product_name}} – {{$prod_detail->product_origin}} – {{$prod_detail->product_weight}}g. Omely - Candy & Snack Shop chuyên phân phối sỉ và lẻ các mặt hàng bánh kẹo nhập khẩu.
            Mọi chi tiết xin vui lòng liên hệ theo thông tin bên dưới website. Xin cám ơn.
        </p>
        @endforeach

        <div class="about-contact">
            <div class="about-address">
                <i class="fad fa-map-marked-alt"></i>
                <span>Địa chỉ:</span> Omely - Candy & Snack Shop
                <a href="https://goo.gl/maps/64rwHHi7KXBLg3fn7" title="Đi đến bản đồ">
                    362/32/4 Lê Hồng Phong, TP. Nha Trang
                </a>
            </div>
            <div class="about-phone">
                <i class="fad fa-mobile-alt"></i><span>Hotline:</span>
                <a href="tel:+964226542" title="Gọi đến 0964226542"> 0964.226.542</a>
            </div>
        </div>
        <img src="{{asset('public/frontend/images/about-banner.jpg')}}" alt="">
    </div>
</section>

<section class="same-prod">
    <div class="container">
        <h3>Bạn có thể cũng thích</h3>
        <div class="product-grid">

            @foreach ($same_product as $same_product)
            @if ($same_product->product_status != 3)
            <div>
                <div class="__1prod">
                    <div class="img-prod">
                        <img src="{{url('public/uploads/product/'.$same_product -> product_image)}}" alt="" class="img-fluid">
                        <form>
                            @csrf
                            <input type="hidden" value="{{$same_product->product_id}}" class="cart_product_id_{{$same_product->product_id}}">
                            <input type="hidden" value="{{$same_product->product_name}}" class="cart_product_name_{{$same_product->product_id}}">
                            <input type="hidden" value="{{$same_product->product_image}}" class="cart_product_image_{{$same_product->product_id}}">
                            <input type="hidden" value="{{$same_product->product_price}}" class="cart_product_price_{{$same_product->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$same_product->product_id}}">

                            <a href="javascript:{}" class="sale" data-id_product="{{$same_product->product_id}}">
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
                    <a href="{{url('/chi-tiet-san-pham/'.$same_product -> product_id)}}" class="prod-heading">
                        {{$same_product -> product_name}}
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
                    <div class="prod-price">{{number_format($same_product -> product_price)}}đ</div>
                </div>
            </div>
            @else
                <div class="oot-product">
                    <div class="__1prod">
                        <div class="img-prod">
                            <span class="prod-badge">Hết hàng</span>
                            <img src="{{url('public/uploads/product/'.$same_product -> product_image)}}" alt="" class="img-fluid">
                        </div>
                        <a href="javascript:{} class="prod-heading">
                            {{$same_product -> product_name}}
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
                        <div class="prod-price">{{number_format($same_product -> product_price)}}đ</div>
                    </div>
                </div>
            @endif

            @endforeach

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
