@extends('layout')

@section('content')
<!--- Big slide --->
<section class="header-slide">
    <div class="bg"></div>
    <img src="{{('public/frontend/images/Omely-logo-withtext.png')}}" alt="">
</section>
<!--- #End big slide --->
<!--- Product container --->
<section class="product">
    <div class="container-fluid">
        <div class="product-content-left">
            <div class="bg-product">
                <div class="overlay-clr"></div>
            </div>
            <h3 class="product-content-left__title">sản phẩm mới</h3>
            <a href="{{url('/coming-soon')}}" class="more" id="more">
                Mua ngay &rarr;
            </a>
        </div>
        <div class="product-content-right">
            <div class="product-content-right__title">
                <a href="#product-content-right__newprod" class="active">Sản phẩm mới</a>
                <a href="#product-content-right__hotprod">Sản phẩm nổi bật</a>
            </div>
            <div class="product-content-right__content">
                <div class="product-content-right__content__product active" id="product-content-right__newprod">
                    <div class="product-flex home_blade">

                        @foreach ($new_product as $new_product)
                            <div class="__1prod">
                                <div class="img-prod">
                                    <span class="prod-badge">New</span>
                                    <img src="{{url('public/uploads/product/'.$new_product -> product_image)}}" alt="">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$new_product->product_id}}" class="cart_product_id_{{$new_product->product_id}}">
                                        <input type="hidden" value="{{$new_product->product_name}}" class="cart_product_name_{{$new_product->product_id}}">
                                        <input type="hidden" value="{{$new_product->product_image}}" class="cart_product_image_{{$new_product->product_id}}">
                                        <input type="hidden" value="{{$new_product->product_price}}" class="cart_product_price_{{$new_product->product_id}}">
                                        <input type="hidden" value="{{$new_product->product_weight}}" class="cart_product_weight_{{$new_product->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$new_product->product_id}}">

                                        <a href="javascript:{}" class="sale" data-id_product="{{$new_product->product_id}}">
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
                                <a href="{{url('/chi-tiet-san-pham/'.$new_product -> product_id)}}" class="prod-heading">
                                    {{$new_product -> product_name}}
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
                                <div class="prod-price">{{number_format($new_product -> product_price)}}đ</div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="product-content-right__content__product" id="product-content-right__hotprod">
                    <div class="product-flex home_blade">

                        @foreach ($popular_product as $popular_product)
                        <div>
                            <div class="__1prod">
                                <div class="img-prod">
                                    <span class="prod-badge">Popular</span>

                                    <img src="{{url('public/uploads/product/'.$popular_product -> product_image)}}" alt="">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$popular_product->product_id}}" class="cart_product_id_{{$popular_product->product_id}}">
                                        <input type="hidden" value="{{$popular_product->product_name}}" class="cart_product_name_{{$popular_product->product_id}}">
                                        <input type="hidden" value="{{$popular_product->product_image}}" class="cart_product_image_{{$popular_product->product_id}}">
                                        <input type="hidden" value="{{$popular_product->product_price}}" class="cart_product_price_{{$popular_product->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$popular_product->product_id}}">

                                        <a href="javascript:{}" class="sale" data-id_product="{{$popular_product->product_id}}">
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
                                <a href="{{url('/chi-tiet-san-pham/'.$popular_product -> product_id)}}" class="prod-heading">
                                    {{$popular_product -> product_name}}
                                </a>
                                <div class="star-price">
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
                                    <div class="prod-price">{{number_format($popular_product -> product_price)}}đ</div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- #End product container --->

<section class="blog">
    <div class="container-fluid">
        <h3 class="section-title">Thông tin mới</h3>
        <p class="blog-divider">omely blog</p>
        <div class="blog-grid">
            <div>
                <div class="__1blog">
                    <div class="img-blog">
                        <img src="{{asset('public/frontend/images/blog1.jpg')}}" alt="">
                    </div>
                    <div class="__1blog-flex">
                        <div class="blog-heading">
                            <i class="fal fa-clock"></i><span>25/04/2020</span>
                        </div>
                        <h3 class="blog-title">
                            2 cách làm kẹo Nougat tại nhà béo núng na núng nính như mỡ bụng của bạn.
                        </h3>
                        <a href="{{url('/coming-soon')}}" class="blog-more">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="__1blog">
                    <div class="img-blog">
                        <img src="{{asset('public/frontend/images/blog2.jpg')}}" alt="">
                    </div>
                    <div class="__1blog-flex">
                        <div class="blog-heading">
                            <i class="fal fa-clock"></i><span>08/05/2020</span>
                        </div>
                        <h3 class="blog-title">
                            Cách chọn hạt dưa,mứt,bánh kẹo ngon và an toàn.
                        </h3>
                        <a href="{{url('/coming-soon')}}" class="blog-more">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="__1blog">
                    <div class="img-blog">
                        <img src="{{asset('public/frontend/images/blog3.jpeg')}}" alt="">
                    </div>
                    <div class="__1blog-flex">
                        <div class="blog-heading">
                            <i class="fal fa-clock"></i><span>03/06/2020</span>
                        </div>
                        <h3 class="blog-title">
                            Top bánh kẹo ngoại không đường thích hợp cho người ăn kiêng, tiểu đường.
                        </h3>
                        <a href="{{url('/coming-soon')}}" class="blog-more">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="__1blog">
                    <div class="img-blog">
                        <img src="{{asset('public/frontend/images/blog4.jpg')}}" alt="">
                    </div>
                    <div class="__1blog-flex">
                        <div class="blog-heading">
                            <i class="fal fa-clock"></i><span>16/06/2020</span>
                        </div>
                        <h3 class="blog-title">
                            Lollipop và sức ảnh hưởng mang lại cho giới trẻ.
                        </h3>
                        <a href="{{url('/coming-soon')}}" class="blog-more">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="brand">
    <div class="container-fluid">
        <h3 class="section-title">Các thương hiệu nổi bật</h3>
        <div class="brand-carousel">
            <div>
                <img src="{{('public/frontend/images/brand1.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand2.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand3.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand4.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand5.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand6.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand7.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand8.png')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand9.jpg')}}" alt="">
            </div>
            <div>
                <img src="{{('public/frontend/images/brand10.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

<section class="getinfo">
    <div class="container">
        <h3>Bản tin omely - candy shop</h3>
        <div>
            <span>đăng ký nhận bản tin từ chúng tôi</span>
            <div class="input_getinfo">
                <input type="text" name="" id="" placeholder="Your email address">
                <button id="submit">Submit</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
@endsection
