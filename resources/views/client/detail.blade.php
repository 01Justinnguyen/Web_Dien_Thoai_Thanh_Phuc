<!doctype html>
<html class="no-js" lang="zxx">

<!-- single-product31:30-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Single Product || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="/client/css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/client/css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="/client/css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="/client/css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="/client/css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="/client/css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="/client/css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="/client/css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="/client/css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="/client/css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="/client/css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="/client/css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="/client/css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="/client/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="/client/css/responsive.css">
        <!-- Modernizr js -->
        <script src="/client/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
    <body>
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                @include('client.top')
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container">
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area" style="margin-top: -20px">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            @foreach ($brand as $value_brand)
                                @if ($value_brand->id == $data->id)
                                    <li class="active">{{$value_brand->name}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            @foreach ($product as $value)
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" data-gall="myGallery">
                                            <img src="{{$value->image_product}}" alt="product image">
                                        </a>
                                    </div>
                                    {{-- <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="/client/images/product/large-size/2.jpg" data-gall="myGallery">
                                            <img src="/client/images/product/large-size/2.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="/client/images/product/large-size/3.jpg" data-gall="myGallery">
                                            <img src="/client/images/product/large-size/3.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="/client/images/product/large-size/4.jpg" data-gall="myGallery">
                                            <img src="/client/images/product/large-size/4.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="/client/images/product/large-size/5.jpg" data-gall="myGallery">
                                            <img src="/client/images/product/large-size/5.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="/client/images/product/large-size/6.jpg" data-gall="myGallery">
                                            <img src="/client/images/product/large-size/6.jpg" alt="product image">
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">
                                    {{-- <div class="sm-image"><img src="{{$value->image_product}}" alt="product image thumb"></div> --}}
                                    {{-- <div class="sm-image"><img src="/client/images/product/small-size/2.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="/client/images/product/small-size/3.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="/client/images/product/small-size/4.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="/client/images/product/small-size/5.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="/client/images/product/small-size/6.jpg" alt="product image thumb"></div> --}}
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{$value->name}}</h2>
                                    <span class="product-details-ref">Code: {{$value->code_product}}</span>
                                    <div class="rating-box pt-20">
                                        <ul class="rating rating-with-review-item">
                                            @php
                                                $star = rand(4, 5);
                                            @endphp
                                            @for ($x=1;$x<=$star;$x++)
                                                <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">{{ empty($value->price_sell) ?  number_format($value->price_root, 0, '.', ',') . " đ" : number_format($value->price_sell, 0, '.', ',') . " đ"}}</span>
                                        <span class="old-price" style="text-decoration-line: line-through" >{{ empty($value->price_sell) ?  '' : number_format($value->price_root, 0, '.', ',') . " đ" }}</span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span>{!!$value->info_product!!}</span>
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
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
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
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p>Security policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <p>Delivery policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>
                                                    <p> Return policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                                   <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                                </ul>
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span>{!!$value->description!!}</span>
                            </div>
                        </div>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                {{-- <a href="#">
                                    <img src="/client/images/product-details/1.jpg" alt="Product Manufacturer Image">
                                </a> --}}
                                <p><span>{!!$value->details!!}</span></p>
                                {{-- <p><span>Reference</span> demo_7</p> --}}
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                    <div class="comment-review">
                                        <span>Grade</span>
                                        <ul class="rating">
                                            @php
                                                $star = rand(4, 5);
                                            @endphp
                                            @for ($x=1;$x<=$star;$x++)
                                                <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="comment-author-infos pt-25">
                                        <span>DATE</span>
                                        <em>{{$value->created_at}}</em>
                                    </div>
                                    <div class="comment-details">
                                        <h4 class="title-block"></h4>
                                        <p>{!!$value->reviews!!}</p>
                                    </div>
                                    <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                                    </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Write Your Review</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="/client/images/product/large-size/3.jpg" alt="Li's Product">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name">Today is a good day Framed poster</p>
                                                                   <p>
                                                                       <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                                   </p>
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Our Feedback</h3>
                                                                        <form action="#">
                                                                            <p class="your-opinion">
                                                                                <label>Your Rating</label>
                                                                                <span>
                                                                                    <select class="star-rating">
                                                                                      <option value="1">1</option>
                                                                                      <option value="2">2</option>
                                                                                      <option value="3">3</option>
                                                                                      <option value="4">4</option>
                                                                                      <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Your Review</label>
                                                                                <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <p class="feedback-form-author">
                                                                                    <label for="author">Name<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                                </p>
                                                                                <p class="feedback-form-author feedback-form-email">
                                                                                    <label for="email">Email<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                                    <span class="required"><sub>*</sub> Required fields</span>
                                                                                </p>
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                                    <a href="#">Submit</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span> Other products in the same category:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                            @foreach ($products as $value_all)
                                                @if ($value_all->brand_id == $data->brand_id)
                                                    <div class="col-lg-12">
                                                        <!-- single-product-wrap start -->
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <a href="/detail/{{$value_all->slug}}-{{$value->id}}">
                                                                    <img src="{{$value_all->image_product}}" alt="Li's Product Image">
                                                                </a>
                                                                <span class="sticker" style="color: yellow">
                                                                    @if(!empty($value->price_sell))
                                                                        <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="product_desc">
                                                                <div class="product_desc_info">
                                                                    <div class="product-review">
                                                                        <h5 class="manufacturer">
                                                                            <a href="#">Graphic Corner</a>
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <ul class="rating">
                                                                                @php
                                                                                    $star = rand(4, 5);
                                                                                @endphp
                                                                                @for ($x=1;$x<=$star;$x++)
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                @endfor
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name" href="/detail/{{$value_all->slug}}-{{$value->id}}">{{$value_all->name}}</a></h4>
                                                                    <div class="price-box">
                                                                        <span class="new-price new-price-2">{{ empty($value->price_sell) ?  number_format($value->price_root, 0, '.', ',') . " đ" : number_format($value->price_sell, 0, '.', ',') . " đ"}}</span>
                                                                        <span class="old-price" style="text-decoration-line: line-through" >{{ empty($value->price_sell) ?  '' : number_format($value->price_root, 0, '.', ',') . " đ" }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="add-actions">
                                                                    <ul class="add-actions-link">
                                                                        <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Footer Area -->
            <div class="footer">
                @include('client.footer')
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            {{-- <div class="modal fade modal-wrapper" id="exampleModalCenter" >
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
                                            <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
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
                                                            <input class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
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
            </div> --}}
            <!-- Quick View | Modal Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="/client/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="/client/js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="/client/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="/client/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="/client/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="/client/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="/client/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="/client/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="/client/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="/client/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="/client/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="/client/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="/client/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="/client/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="/client/js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="/client/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="/client/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="/client/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="/client/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="/client/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="/client/js/main.js"></script>
    </body>

<!-- single-product31:32-->
</html>
