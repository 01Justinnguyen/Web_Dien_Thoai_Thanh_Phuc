<!doctype html>
<html class="no-js" lang="zxx">
@include('client.headCSS')

<body>
    <div class="body-wrapper">
        @include('client.top')
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
                            <img src="images/team/1.png" alt="Our Team Member">
                        </div>
                        <div class="team-content text-center" style="padding: 15px">
                            <h3>Phạm Đức Kiệt</h3>
                            <p>Member</p>
                            <a href="#">info@example.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-lg-12 col-md-12 order-2 order-lg-1">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Thông Tin Cá Nhân</h3>

                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Address</h4>
                            <p>Bình Hiệp - Bình Sơn - Quảng Ngãi</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Phone</h4>
                            <p>Mobile: 0393900816</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p>yourmail@domain.com</p>
                        </div>
                        <div class="single-contact-block last-child text-center">
                            <button type="submit" id="updateCategory"
                                class="btn btn-success me-1 waves-effect waves-float waves-light">Setting</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="contact-main-page mt-40 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
        <div class="container mb-60">
            <div class="counterup-area">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin Limupa Counter Area -->
                            <div class="limupa-counter white-smoke-bg" style="cursor: pointer">
                                <div class="container">
                                    <div class="counter-img">
                                        <img src="images/about-us/icon/1.png" alt="">
                                    </div>
                                    <div class="counter-info">
                                        <div class="counter-number">
                                            <h3 class="counter">2169</h3>
                                        </div>
                                        <div class="counter-text">
                                            <span>HAPPY CUSTOMERS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin limupa Counter Area -->
                            <div class="limupa-counter gray-bg" style="cursor: pointer">
                                <div class="counter-img">
                                    <img src="images/about-us/icon/2.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">869</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>AWARDS WINNED</span>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin limupa Counter Area -->
                            <div class="limupa-counter white-smoke-bg" style="cursor: pointer">
                                <div class="counter-img">
                                    <img src="images/about-us/icon/3.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">689</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>HOURS WORKED</span>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin limupa Counter Area -->
                            <div class="limupa-counter gray-bg" style="cursor: pointer">
                                <div class="counter-img">
                                    <img src="images/about-us/icon/4.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">2169</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>COMPLETE PROJECTS</span>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('client.footer')
    </div>
    @include('client.footCSS')
</body>
</html>
