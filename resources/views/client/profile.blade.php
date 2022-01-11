@extends('client.master')
@section('content')
<body>
    <div class="body-wrapper" style="margin-top: -20px">
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Profie</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="col-lg-12 col-md-12 order-2 order-lg-1" >
                    <div class="team-member mb-90 mb-sm-60 mb-xs-60" style="width: 300px">
                        <div class="team-thumb">
                            <img src="/client/images/team/1.png" alt="Our Team Member">
                        </div>
                        <div class="team-content text-center" style="padding: 15px">
                            <h3>Nguyễn Thanh Phúc</h3>
                            <p>Member</p>
                            <a href="#">phuc01112002@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-lg-12 col-md-12 order-2 order-lg-1">
                    <div class="row">

                            <div class="col-lg-12">
                                <div class="li-product-tab">
                                    <ul class="nav li-product-menu">
                                       <li><a class="active" data-toggle="tab" href="#li-info"><span><i class="fa fa-address-card"></i> About</span></a></li>
                                       <li><a data-toggle="tab" href="#li-purchased-product"><span><i class="fa fa-shopping-cart"></i> Purchased products</span></a></li>
                                       <li><a data-toggle="tab" href="#li-delivering"><span><i class="fa fa-truck"></i> Your Order</span></a></li>
                                    </ul>
                                </div>
                                <!-- Begin Li's Tab Menu Content Area -->
                            </div>
                        <div class="col-12">
                        <div class="tab-content">
                            <div id="li-info" class="tab-pane active show" role="tabpanel">
                                <br>
                                <div class="single-contact mt-3">
                                    <h4><i class="fa fa-fax"></i> Address</h4>
                                    <p>Vạn Ninh - Quảng Ninh - Quảng Bình</p>
                                </div>
                                <br>
                                <div class="single-contact">
                                    <h4><i class="fa fa-phone"></i> Phone</h4>
                                    <p>Mobile: 0913946574</p>
                                </div>
                                <br>
                                <div class="single-contact last-child">
                                    <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                    <p>phuc01112002@gmail.com</p>
                                </div>
                                <br>
                                    <button type="submit" id="updateCategory"
                                        class="btn btn-warning me-1 waves-effect waves-float waves-light">Setting</button>
                            </div>

                            <div id="li-purchased-product" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                            <div class="table-content table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <br>
                                                            <br>
                                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                            <td class="li-product-thumbnail"><a href="#"><img style="width:60px;height:60px" src="images/product/small-size/5.jpg" alt="Li's Product Image"></a></td>
                                                            <td class="li-product-name"><a href="#">Accusantium dolorem1</a></td>
                                                            <td class="li-product-price"><span class="amount">$46.80</span></td>
                                                            <td class="quantity"><span class="amount">x1</span></td>
                                                            <td class="li-product-price"><span class="amount">Total: $46.80</span></td>
                                                            <td>
                                                                <button type="submit" class="btn btn-warning me-1 waves-effect waves-float waves-light">Rating</button>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                            <td class="li-product-thumbnail"><a href="#"><img style="width:60px;height:60px" src="images/product/small-size/6.jpg" alt="Li's Product Image"></a></td>
                                                            <td class="li-product-name"><a href="#">Mug Today is a good day</a></td>
                                                            <td class="li-product-price"><span class="amount">$71.80</span></td>
                                                            <td class="quantity"><span class="amount">x2</span></td>
                                                            <td class="li-product-price"><span class="amount">Total: $143.60</span></td>
                                                            <td>
                                                                <button type="submit" class="btn btn-warning me-1 waves-effect waves-float waves-light">Buy Again</button>
                                                            </td>

                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div id="li-delivering" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                            <div class="table-content table-responsive">
                                                <br>
                                                    <h6>Waiting for submission</h6>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                           <br>
                                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                            <td class="li-product-thumbnail"><a href="#"><img style="width:40px;height:40px" src="images/product/small-size/5.jpg" alt="Li's Product Image"></a></td>
                                                            <td class="li-product-name"><a href="#">Accusantium dolorem1</a></td>
                                                            <td class="li-product-price"><span class="amount">$46.80</span></td>
                                                            <td class="quantity"><span class="amount">x1</span></td>
                                                            <td class="li-product-price"><span class="amount">Total: $46.80</span></td>

                                                        </tr>
                                                        <tr>
                                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                            <td class="li-product-thumbnail"><a href="#"><img style="width:40px;height:40px" src="images/product/small-size/6.jpg" alt="Li's Product Image"></a></td>
                                                            <td class="li-product-name"><a href="#">Mug Today is a good day</a></td>
                                                            <td class="li-product-price"><span class="amount">$71.80</span></td>
                                                            <td class="quantity"><span class="amount">x2</span></td>
                                                            <td class="li-product-price"><span class="amount">Total: $143.60</span></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <br>
                                                <h6>Delivering</h6>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                            <td class="li-product-thumbnail"><a href="#"><img style="width:30px;height:30px" src="images/product/small-size/5.jpg" alt="Li's Product Image"></a></td>
                                                            <td class="li-product-name"><a href="#">Accusantium dolorem1</a></td>
                                                            <td class="li-product-price"><span class="amount">$46.80</span></td>
                                                            <td class="quantity"><span class="amount">x1</span></td>
                                                            <td class="li-product-price"><span class="amount">Total: $46.80</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                            <td class="li-product-thumbnail"><a href="#"><img style="width:40px;height:40px" src="images/product/small-size/6.jpg" alt="Li's Product Image"></a></td>
                                                            <td class="li-product-name"><a href="#">Mug Today is a good day</a></td>
                                                            <td class="li-product-price"><span class="amount">$71.80</span></td>
                                                            <td class="quantity"><span class="amount">x2</span></td>
                                                            <td class="li-product-price"><span class="amount">Total: $143.60</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
    </div>
    </div>
</body>
@endsection
