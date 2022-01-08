@extends('admin.share.master')
@section('content')
<section id="input-mask-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product</h4>
                </div>
                <div class="card-body">
                     <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">

                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control credit-card-mask" placeholder="" name="name" id="name">
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control credit-card-mask" placeholder="" id="slug" name="slug">
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                    <label class="form-label" for="basicInput">Category_Id</label>
                                <select name="category_id" class="form-control" id="category_id" required="">
                                    <option value=0>Choose...</option>
                                    @foreach ($category as $value)
                                        <option value={{$value->id}}> {{$value->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                    <label class="form-label" for="basicInput">Brand_id</label>
                                <select name="brand_id" class="form-control" id="brand_id" required="">
                                    <option value=0>Choose...</option>
                                    @foreach ($brand as $value)
                                        <option value={{$value->id}}> {{$value->name}} </option>
                                    @endforeach
                                </select>
                             </div>
                            <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                <label class="form-label">Code Product</label>
                                <input type="text" class="form-control credit-card-mask" placeholder="" id="code_product" name="code_product">
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">Quantity</label>
                                <input type="number" class="form-control credit-card-mask" placeholder="" id="qty" name="qty">
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                <label class="form-label">Price root</label>
                                <input type="number" class="form-control credit-card-mask" placeholder="" id="price_root" name="price_root">
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                <label class="form-label">Price sale</label>
                                <input type="number" class="form-control credit-card-mask" placeholder="" id="price_sell" name="price_sell">
                            </div>

                            <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">color</label>
                                <select class="form-control" id="color" required="">
                                        <option value="0">Choose...</option>
                                        <option value="0">No Color</option>
                                        <option value="1">White</option>
                                        <option value="2">Red</option>
                                        <option value="3">Blue</option>
                                        <option value="4">Black</option>
                                        <option value="5">Green</option>
                                        <option value="6">Yellow</option>
                                        <option value="7">Brown</option>
                                        <option value="8">Navy Blue</option>
                                        <option value="9">Pink</option>
                                        <option value="10">Gray</option>
                                        <option value="11">Orange</option>
                                </select>
                            </div>

                            <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">Is_view</label>
                                <select name="is_view" class="form-control" id="is_view" required="">
                                    <option value="0">Choose...</option>
                                    <option value=1>Visible</option>
                                    <option value=0>Disable</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">Status</label>
                                <select name="status" id="status" class="form-control" required="">
                                    <option value="0">Choose...</option>
                                    {{-- hàng có sẵn --}}
                                    <option value="0">Available</option>
                                    {{-- hết hàng --}}
                                    <option value="1">Out of stock</option>
                                    {{-- sắp ra mắt --}}
                                    <option value="2">Comming soon</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">Feature</label>
                                <select name="feature" id="feature" class="form-control" required="">
                                    <option value="0">Choose...</option>
                                    <option value="1">Bestseller</option>
                                    <option value="0">New Arrival</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">Select Version</label>
                                <select class="form-control" id="select_version" required="">
                                        <option value="0">Choose...</option>
                                        <option value="0">Null</option>
                                        <option value="1">64 GB</option>
                                        <option value="2">128 GB</option>
                                        <option value="3">256 GB</option>
                                        <option value="4">512 GB</option>
                                        <option value="5">1 TB</option>
                                </select>
                            </div>

                            <div class="col-xl-4 col-md-3 col-sm-12 mb-2">
                                <label class="form-label" for="basicInput">Image</label>
                                <div class="input-group">
                                <input name="image_product" id="image_product" class="form-control" required>
                                <a id="lfm" data-input="image_product" data-preview="holderbanner" class="lfm btn btn-light">
                                    Choose
                                </a>
                                </div>
                                <img id="holderbanner" class="img-thumbnail mt-1" style="width:405px; height:300px" >
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                            <script>
                                    $('.lfm').filemanager('banner');
                            </script>
                            <div class="col-xl-8 col-md-3 col-sm-12 mb-2 mt-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#info_product" role="tab"><i class="fa fa-edge"></i>Info Product</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#description" role="tab"><i class="icofont icofont-man-in-glasses"></i>Description</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#details" role="tab"><i class="icofont icofont-contacts"></i>Details</a></li>
                                    <li class="nav-item"><a class="nav-link"data-bs-toggle="pill" href="#reviews" role="tab"><i class="icofont icofont-contacts"></i>Reviews</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="info_product" role="tabpanel">
                                        <textarea name="info_product" id="ckeditorInfoproduct" cols="30" class="form-control" rows="10"></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="description" role="tabpanel">
                                        <textarea name="description" id="ckeditorDescription" cols="30" class="form-control" rows="10"></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="details" role="tabpanel">
                                        <textarea name="details" id="ckeditorDetails" cols="30" class="form-control" rows="10"></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <textarea name="reviews" id="ckeditorReviews" cols="30" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>

                                <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                                <script>
                                    var options = {
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                    };
                                </script>
                                <script>
                                    CKEDITOR.replace('ckeditorInfoproduct', options);
                                    CKEDITOR.replace('ckeditorDescription', options);
                                    CKEDITOR.replace('ckeditorDetails', options);
                                    CKEDITOR.replace('ckeditorReviews', options);
                                </script>
                            </div>
                            <div class="">
                                <button id="createProduct" style="float: right" type="button" class="btn btn-outline-success round waves-effect">Create Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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
        $("#name").blur(function(){
                $("#slug").val(toSlug($("#name").val()));
            });

            function toSlug(str) {
                str = str.toLowerCase();
                str = str
                    .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                    .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
                str = str.replace(/[đĐ]/g, 'd');
                str = str.replace(/([^0-9a-z-\s])/g, '');
                str = str.replace(/(\s+)/g, '-');
                str = str.replace(/-+/g, '-');
                str = str.replace(/^-+|-+$/g, '');
                return str;
            }
            $("#createProduct").click(function(){

                var payload = {
                    'name'          :   $("#name").val(),
                    'slug'          :   $("#slug").val(),
                    'category_id'   :   $("#category_id").val(),
                    'brand_id'      :   $("#brand_id").val(),
                    'code_product'  :   $("#code_product").val(),
                    'qty'           :   $("#qty").val(),
                    'price_root'    :   $("#price_root").val(),
                    'price_sell'    :   $("#price_sell").val(),
                    'color'         :   $("#color").val(),
                    'select_version':   $("#select_version").val(),
                    'is_view'       :   $("#is_view").val(),
                    'status'        :   $("#status").val(),
                    'feature'       :   $("#feature").val(),
                    'image_product' :   $("#image_product").val(),
                    'info_product'  :   CKEDITOR.instances["ckeditorInfoproduct"].getData(),
                    'description'   :   CKEDITOR.instances["ckeditorDescription"].getData(),
                    'details'       :   CKEDITOR.instances["ckeditorDetails"].getData(),
                    'reviews'       :   CKEDITOR.instances["ckeditorReviews"].getData(),
                };
                $.ajax({
                    url : '/admin/products/create',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("Created product successfully!!!");
                        }
                        // location.reload();
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














