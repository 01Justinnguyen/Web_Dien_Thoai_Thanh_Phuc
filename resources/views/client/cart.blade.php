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
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Shopping Cart Area Strat-->
        <div class="Shopping-cart-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">remove</th>
                                            <th class="li-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="li-product-price">Unit Price</th>
                                            <th class="li-product-quantity">Quantity</th>
                                            <th class="li-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <input class="button" name="update_cart" value="Update cart" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span>$130.00</span></li>
                                            <li>Total <span>$130.00</span></li>
                                        </ul>
                                        <a href="/checkout">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Shopping Cart Area End-->
    </div>
</body>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            // load data l??n tr??n view d??ng h??m n??y, h??m n??y l?? h??m t??? ?????t t??n c?? th??? ?????t t??n kh??c c??ng ???????c
            function loadData(){
                axios
                    .get('/cart/data')
                    .then((res) => {
                        var data = res.data.data;
                        var html = '';
                        // var productId = product.product_id;
                        $.each(data, function(key, value){
                            if(value.price_sell == null ){
                                var price = value.price_root;
                            } else {
                                var price = value.price_sell;
                            }
                            html += '<tr>';
                            html += '<td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>';
                            html += '<td class="li-product-thumbnail"><a href="#"><img style="width; 150px; height: 150px" src="' + value.image_product +'"></a></td>';
                            html += '<td class="li-product-name"><a href="#">' + value.name + '</a></td>';
                            html += '<td class="li-product-price"><span class="amount">'+ new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(price) +'</span></td>';
                            html += '<td class="quantity">';
                            html += '<label>Quantity</label>';
                            html += '<div class="cart-plus-minus">';
                            html += '<input data-qty="'+ value.id +'" class="cart-plus-minus-box" value="' + value.qty + '" type="text" min="1" disabled="disabled">';
                            html += '<div id="sub" class="dec qtybutton"><i class="fa fa-angle-down"></i></div>';
                            html += '<div id="add" class="inc qtybutton"><i class="fa fa-angle-up"></i></div>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td class="product-subtotal"><span class="amount">'+ new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(price * value.qty) +'</span></td>';
                            html += '</tr>';
                        });
                        $('#myTable tbody').html(html);
                        $(".qtybutton").on("click", function() {
                            var $button = $(this);
                            var oldValue = $button.parent().find("input").val();
                            if ($button.hasClass('inc')) {
                            var newVal = parseFloat(oldValue) + 1;
                            } else {
                                // Don't allow decrementing below zero
                            if (oldValue > 1) {
                                var newVal = parseFloat(oldValue) - 1;
                                } else {
                                newVal = 1;
                            }
                            }
                            $button.parent().find("input").val(newVal);

                            var id = $(this).parent().find("input").data('qty');
                            var qty = $button.parent().find("input").val();
                            var payload = {
                                'id' : id,
                                'qty': qty,
                            };
                                axios
                                    .post('/client/cart/editQty', payload)
                                    .then((res) => {
                                        if(res.data.status == true){
                                            toastr.success("Cart is updated successfully!");
                                            loadData();
                                        }else {
                                            toastr.error("Sorry,it has error somewhere!")
                                        }
                            });

                        });
                    });
            }
            loadData();
        });
    </script>

@endsection
