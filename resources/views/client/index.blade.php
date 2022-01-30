@extends('client.master')
@section('content')
{{-- Banner to --}}
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        @foreach ($mainBanner as $value)
                        <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url({{$value->main_banner_1}})">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                <h2>Samsung Galaxy S9 | S9+</h2>
                                <h3>Starting at <span>$1209.00</span></h3>
                                {{-- <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                @foreach ( $SmallBanner1 as $value )
                <div class="li-banner">
                    <a href="#">
                        <img src="{{$value->small_banner_1}}" alt="">
                    </a>
                </div>
                @endforeach
                @foreach ($SmallBanner2 as $value)
                    <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                        <a href="#">
                            <img src="{{$value->small_banner_2}}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
{{-- end banner to --}}
{{-- New best  --}}
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                       <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                       {{-- <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li> --}}
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($product as $value)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="/detail/{{$value->slug}}-{{$value->id}}">
                                            <img src="{{ $value->image_product }}" alt="Li's Product Image">
                                        </a>
                                        <span class="{{ $value->price_sell ? "sticker" : " " }}" style="color: yellow">
                                            @if(!empty($value->price_sell))
                                                <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="#">Đánh giá</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        @php
                                                            $star = rand(3, 5);
                                                        @endphp
                                                        @for ($x=1;$x<=$star;$x++)
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        {{-- <li class="no-star"><i class="fa fa-star-o"></i></li> --}}
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="/detail/{{$value->slug}}-{{$value->id}}">{{ $value->name }}</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">{{ empty($value->price_sell) ?  number_format($value->price_root, 0, '.', ',') . " đ" : number_format($value->price_sell, 0, '.', ',') . " đ"}}</span>
                                                <span class="old-price">{{ empty($value->price_sell) ?  '' : number_format($value->price_root, 0, '.', ',') . " đ" }}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#" data-toggle="modal" data-target="#modalLogin">Add to cart</a></li>
                                                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                {{-- <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($product2 as $value)

                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/detail/{{$value->slug}}-{{$value->id}}">
                                        <img src="{{ $value->image_product }}" alt="Li's Product Image">
                                    </a>
                                    <span class="{{ !empty($value->price_sell) ? "sticker" : " " }}" style="color: yellow">
                                            @if(!empty($value->price_sell))
                                                <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                            @endif
                                    </span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="#">Đánh giá</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @php
                                                        $star = rand(3, 5);
                                                    @endphp
                                                    @for ($x=1;$x<=$star;$x++)
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        {{-- <li class="no-star"><i class="fa fa-star-o"></i></li> --}}
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/detail/{{$value->slug}}-{{$value->id}}">{{ $value->name }}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">{{ empty($value->price_sell) ?  number_format($value->price_root, 0, '.', ',') . " đ" : number_format($value->price_sell, 0, '.', ',') . " đ"}}</span>
                                            <span class="old-price">{{ empty($value->price_sell) ?  '' : number_format($value->price_root, 0, '.', ',') . " đ" }}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#" data-toggle="modal" data-target="#modalLogin">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            {{-- <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end new best --}}
<!-- Product Area End Here -->

<!-- Begin Li's Laptop Product Area -->
@foreach ($category as $value)
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>{{ $value->name }}</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($listProducts as $value_product)
                        @if ($value_product->category_id == $value->id)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/detail/{{$value_product->slug}}-{{$value_product->id}}">
                                        <img src="{{ $value_product->image_product }}" alt="Li's Product Image">
                                    </a>
                                    <span class="{{ $value_product->price_sell ? "sticker" : " " }}" style="color: yellow">
                                        @if(!empty($value_product->price_sell))
                                            <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value_product->price_root - $value_product->price_sell) / $value_product->price_root * 100, 0) }}%</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="#">Đánh giá</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @php
                                                        $star = rand(3, 5);
                                                    @endphp
                                                    @for ($x=1;$x<=$star;$x++)
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/detail/{{$value_product->slug}}-{{$value_product->id}}">{{ $value_product->name }}</a></h4>
                                        <div class="price-box">
                                            <div class="price-box">
                                                <span class="new-price new-price-2">{{ empty($value_product->price_sell) ?  number_format($value_product->price_root, 0, '.', ',') . " đ" : number_format($value_product->price_sell, 0, '.', ',') . " đ"}}</span>
                                                <span class="old-price">{{ empty($value_product->price_sell) ?  '' : number_format($value_product->price_root, 0, '.', ',') . " đ" }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <input type="hidden" id="product_id" value="{{$value->id}}">
                                        @php
                                            $user = Auth::user();
                                        @endphp
                                        <ul class="add-actions-link">
                                            @if (isset($user))
                                                <li class="add-cart active"><a id="addToCart">Add to cart</a></li>
                                                <li><a class="links-details" id="addToWishList1" style="cursor: pointer"><i class="fa fa-heart-o"></i></a></li>
                                            @else
                                                <li class="add-cart active"><a href="#" data-toggle="modal" data-target="#modalLogin">Add to cart</a></li>
                                                <li><a class="links-details" id="addToWishList1" data-toggle="modal" data-target="#modalLogin" style="cursor: pointer"><i class="fa fa-heart-o"></i></a></li>
                                            @endif
                                                {{-- <li><a class="links-details" id="addToWishList1" style="cursor: pointer"><i class="fa fa-heart-o"></i></a></li> --}}
                                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
@endforeach
{{-- <!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's Static Home Area --> --}}
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                @foreach ($SubBanner as $value)
                    <div class="li-static-home-image" style="background-image: url({{$value->sub_banner}})"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Li's Static Home Area End Here -->
<!-- Begin Li's Trending Product Area -->
<section class="product-area li-trending-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            {{-- @foreach ($product2 as $value) --}}

            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Sắp ra mắt</span>
                    </h2>

                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($product3 as $value)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ $value->image_product }}" alt="Li's Product Image">
                                            </a>
                                            {{-- <span class="sticker"></span> --}}
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">

                                                </div>
                                                <h4><a class="product_name" href="single-product.html">{{ $value->name }}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>

<div class="modal fade modal-wrapper" id="exampleModalCenter" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                       <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="/client/images/product/large-size/1.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="/client/images/product/large-size/2.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="/client/images/product/large-size/3.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="/client/images/product/large-size/4.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="/client/images/product/large-size/5.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="/client/images/product/large-size/6.jpg" alt="product image">
                                </div>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img src="/client/images/product/small-size/1.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="/client/images/product/small-size/2.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="/client/images/product/small-size/3.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="/client/images/product/small-size/4.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="/client/images/product/small-size/5.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="/client/images/product/small-size/6.jpg" alt="product image thumb"></div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>Today is a good day Framed poster</h2>
                                <span class="product-details-ref">Reference: demo_15</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="review-item"><a href="#">Read Review</a></li>
                                        <li class="review-item"><a href="#">Write Review</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">$57.98</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                        </span>
                                    </p>
                                </div>
                                <div class="product-variants">
                                    <div class="produt-variants-size">
                                        <label>Dimension</label>
                                        <select class="nice-select">
                                            <option value="1" title="S" selected="selected">40x60cm</option>
                                            <option value="2" title="M">60x90cm</option>
                                            <option value="3" title="L">80x120cm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text" id="qty">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                            <input type="hidden" name="" id="product_id">
                                        </div>
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $("#addToCart").click(function(){
            console.log(123123);
            var payload = {
                'qty'        : $("#qty").val(),
                'product_id' : $("#product_id").val(),
            };

            // $.ajax({
            //     url : '/cart',
            //     type: 'post',
            //     data: payload,
            //     success: function($xxx){
            //         toastr.success('Đã thêm sản phẩm vào giỏ hàng');
            //     },
            //     error: function($errors){
            //         var listErrors = $errors.responseJSON.errors;
            //         $.each(listErrors, function(key, value) {
            //             toastr.error(value[0]);
            //         });
            //     }
            // });
        });
        $("#addToWishList1").click(function(){
                    var product_id      = $("#product_id").val();
                    var data = {
                        'product_id'    : product_id,
                };
                $.ajax({
                        url : '/wishlist/add',
                        type: 'post',
                        data: data,
                        success: function($data){
                            toastr.success('Sản phẩm đã có trong mục yêu thích');
                        },
                        error: function($errors){
                            var listErrors = $errors.responseJSON.errors;
                            $.each(listErrors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        }
                    });
                });
    });
</script>
@endsection
