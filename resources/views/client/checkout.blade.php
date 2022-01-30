@extends('client.master')
@section('content')
<body>
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
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Checkout Area Strat-->
        <div class="checkout-area pt-40 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-accordion">
                            <!--Accordion Start-->
                            <h3>Địa Chỉ Nhận Hàng?<span id="showaddress"> Bấm vào đây để thay đổi địa chỉ</span></h3>
                            <div id="checkout-address" class="coupon-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <div class="col-md-12">
                                             <div class="checkout-form-list create-acc">
                                                 @foreach ($data as $value)
                                                 <input  name="address" type="radio" value="{{$value->id}}">
                                                 <label style="font-weight: 700; font-size: 15px; margin-right:10px">{{ $value->fullname }} (+84) {{ $value->phone }}</label>
                                                 <label>{{ $value->details_add }}, {{$value->toWards->name_xaphuong}}, {{$value->toProvince->name_quanhuyen}}, {{$value->toCity->name_city}}</label>
                                                 <br>
                                                 @endforeach
                                            </div>
                                            <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#addNewAddress">Add Address</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!--Accordion End-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php $thanhTien = 0;
                         $tongSanPham = 0;
                         $milion = 1000000;
                    @endphp
                        @if (isset($checkout))
                            @foreach ($checkout as $key => $value)
                                @php
                                    $donGia = empty($value->product->price_sell) ? $value->product->price_root : $value->product->price_sell;
                                    $soLuong = $value->qty;
                                    $thanhTien = $thanhTien +  $donGia * $soLuong   ;
                                    $tongSanPham += $value->qty;
                                @endphp
                            @endforeach
                        @endif
                    <div class="col-lg-12 col-12">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                            <th class="cart-product-image">Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if(isset($user)) --}}
                                        @foreach ($checkout as $value)
                                            <tr class="cart_item">
                                                <td class="cart-product-name">{{$value->product->name}}<strong class="product-quantity"> × {{$value->qty}}</strong></td>
                                                <td class="cart-product-total"><span class="amount">{{ empty($value->product->price_sell) ?  number_format($value->product->price_root*$value->qty, 0, '.', ',') . " đ" : number_format($value->product->price_sell*$value->qty, 0, '.', ',') . " đ"}}</span></td>
                                                <td class="cart-product-name"><img src="{{$value->product->image_product}}" style="width:80px;height:80px" alt=""></td>
                                            </tr>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                    <tfoot>
                                        {{-- <tr class="cart-subtotal">
                                            <th>VAT</th>
                                            <td><span class="amount">2%</span></td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{number_format($thanhTien,0,'.',',')}}</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                      <div class="card">
                                        <div class="card-header" id="#payment-1">
                                          <h5 class="panel-title">
                                            <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Direct Bank Transfer.
                                            </a>
                                          </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                          <div class="card-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="#payment-2">
                                          <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                              Cheque Payment
                                            </a>
                                          </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="#payment-3">
                                          <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              PayPal
                                            </a>
                                          </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addNewAddress" class="modal fade">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                {{-- <form> --}}
                    <div class="col-lg-12 col-12">
                        <form>
                            @php
                                $user = Auth::user();
                            @endphp
                            <input type="hidden" value="{{$user->id}}" id="user_id">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label>Country</label>
                                            <select class="city" name="city" id="city">
                                              <option value="">Tỉnh / Thành phố</option>
                                                @foreach ($city as $key => $ci)
                                                    <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="country-select clearfix" id="formDistrict">
                                            <label>Quận huyện</label>
                                            <select class="district" id="district">
                                              <option value="">Quận / Huyện</option>
                                            </select>
                                        </div>
                                        <div class="country-select clearfix" id="formWards">
                                            <label>Xã / Phường</label>
                                            <select id="wards">
                                              <option value="">Xã / Phường</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Địa chỉ cụ thể<span class="required">*</span></label>
                                            <input placeholder="Mời bạn nhập địa chỉ cụ thể" type="text" id="details_add">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Full Name<span class="required">*</span></label>
                                            <input placeholder="" type="text" id="fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone<span class="required">*</span></label>
                                            <input type="text" id="phone">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning ml-3 add_address" id="add_address">Hoàn thành</button>
                                </div>
                            </div>
                        </form>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        </div>
    </div>
</body>
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
    <script>
        $(document).ready(function(){
            // $('.add_address').click(function(){
            //     var city     = $('.city').val();
            //     var district = $('.district').val();
            //     var wards    = $('.wards').val();

            // });
            // $('.choose').on('change', function() {
            //     var action = $(this).attr('id'); // khi select class choose thì nó sẽ lấy thuộc tính id của thẻ đó có lẽ vậy :))
            //     var ma_id = $(this).val(); // nó sẽ lấy giá trị của thằng option trong foreach
            //     // var _token = $('input[name="_token"]').val();
            //     var $result = '';

            //     if(action == 'city'){
            //         result = 'district';
            //     } else {
            //         result = 'wards';
            //     }
            //     $.ajax({
            //         url : '/checkout/selectAddress',
            //         type: 'post',
            //         data: {action:action, ma_id:ma_id},
            //         success: function(data){
            //             $('#'+ result).html(data);
            //         }
            //     });
            // });
            $(".city").change(function(){
                var id = $(".city").val();
                    function loadData(){
                        axios
                            .get('/checkout/district/' + id)
                            .then((res) => {
                                var data = res.data.data;
                                console.log(data);
                                var html = '';
                                html += '<option value="">Quận / Huyện</option>';
                                $.each(data, function(key, value) {
                                    var id_dis = value.maqh;
                                    html += '<option value="'+ id_dis +'">';
                                    html += value.name_quanhuyen;
                                    html += '</option>';
                                });
                                $('#formDistrict select').html(html);
                                });
                    }
                    loadData();
            });
            $(".district").change(function(){
                var id_dis1 = $(".district").val();
                console.log(id_dis1);
                    function loadData(){
                        axios
                            .get('/checkout/wards/' + id_dis1)
                            .then((res) => {
                                var data = res.data.data;
                                console.log(data);
                                var html = '';
                                html += '<option value="">Xã / Phường</option>';
                                $.each(data, function(key, value) {
                                    var id_wa = value.xaid;
                                    html += '<option value="'+ id_wa +'">';
                                    html += value.name_xaphuong;
                                    html += '</option>';
                                });
                                $('#formWards select').html(html);
                                });
                    }
                    loadData();
            });

            $('#add_address').click(function(){
                var payload = {
                    'user_id' : $('#user_id').val(),
                    'City'    : $('#city').val(),
                    'district': $('#district').val(),
                    'details_add': $('#details_add').val(),
                    'fullname': $('#fullname').val(),
                    'phone'   : $('#phone').val(),
                    'wards'   : $('#wards').val(),
                };
                $.ajax({
                        url : '/checkout/data',
                        type: 'post',
                        data: payload,
                        success: function($xxx){
                                toastr.success("Updated product successfully!");
                        },
                        error: function($errors){
                            var listErrors = $errors.responseJSON.errors;
                            $.each(listErrors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        }
                 });
            });
        })
    </script>
@endsection


