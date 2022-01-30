@extends('client.master')
@section('content')
<body>
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header>
            {{-- @include('client.top') --}}
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
                        <li class="active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Wishlist Area Strat-->
        <div class="wishlist-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">remove</th>
                                            <th class="li-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="li-product-price">Unit Price</th>
                                            <th class="li-product-stock-status">Stock Status</th>
                                            <th class="li-product-add-cart">add to cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $status = ['Available','Out of stock', 'Coming soon'];
                                            $color = ['Green','Red','Warning']
                                        @endphp
                                        @if(isset($wishlist))
                                        @foreach ($wishlist as $key => $value)
                                        <tr>
                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail"><a href="#"><img src="{{ $value->Wishlist->image_product }}" alt=""></a></td>
                                            <td class="li-product-name"><a>{{ $value->Wishlist->name }}</a></td>
                                            <td class="li-product-price"><span class="amount">{{ empty($value->Wishlist->price_sell) ?  number_format($value->Wishlist->price_root, 0, '.', ',') . " đ" : number_format($value->Wishlist->price_sell, 0, '.', ',') . " đ"}}</span></td>
                                            <td style="color:{{$color[$value->wishlist->status ]}}; font-size:18px" value={{$value->wishlist->status}}><span class="in-stock"> {{$status[ $value->wishlist->status ]}}</span></td>
                                            <td class="li-product-add-cart"><a href="#" data-toggle="modal" data-target="#modalLogin">add to cart</a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Wishlist Area End-->
        <!-- Begin Footer Area -->
        {{-- <div class="footer">
            @include('client.footer')
        </div> --}}
        <!-- Footer Area End Here -->
        <!-- Begin Modal Area -->
        {{-- <div class="modal fade open-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <!-- Begin Modal Image Area -->
                    <div class="col-md-5">
                        <!-- Begin Modal Tab Content Area -->
                        <div class="tab-content product-details-large myTabContent">
                          <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="/client/images/product/large-size/1.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="/client/images/product/large-size/2.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="/client/images/product/large-size/3.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="/client/images/product/large-size/4.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide5" role="tabpanel" aria-labelledby="single-slide-tab-4">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="/client/images/product/large-size/5.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide6" role="tabpanel" aria-labelledby="single-slide-tab-4">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="/client/images/product/large-size/6.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                        </div>
                        <!-- Modal Tab Content Area End Here -->
                        <!-- Begin Modal Tab Menu Area -->
                        <div class="single-product-menu">
                            <div class="nav single-slide-menu owl-carousel" role="tablist">
                                <div class="single-tab-menu img-full">
                                    <a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="/client/images/product/small-size/1.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="/client/images/product/small-size/2.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="/client/images/product/small-size/3.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="/client/images/product/small-size/4.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-5" href="#single-slide5"><img src="/client/images/product/small-size/5.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-6" href="#single-slide6"><img src="/client/images/product/small-size/6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tab Menu End Here -->
                    </div>
                    <!-- Modal Image Area End Here -->
                    <!-- Begin Modal Content Area -->
                    <div class="col-md-7">
                        <div class="modal-product-info">
                            <h2>Accusantium dolorem1</h2>
                            <div class="modal-product-price">
                               <span class="new-price">$46.80</span>
                           </div>
                           <div class="cart-description">
                               <p>Vector graphic, format: svg. Download for personal, private and non-commercial use.</p>
                           </div>
                           <div class="quantity">
                               <input class="input-text qty text" step="1" min="1" max="200" name="quantity" value="1" title="Qty" size="4" type="number">
                           </div>
                        </div>
                    </div>
                    <!-- Modal Content Area End Here -->
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- Modal Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    {{-- <script src="/client/js/vendor/jquery-1.12.4.min.js"></script>
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
    <script src="/client/js/main.js"></script> --}}

</body>
@endsection
