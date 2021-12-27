@extends('admin.share.master')
@section('content')
<div class="row" id="table-bordered">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Product</h4>
            </div>
            </div>
            <div class="table-responsive">
                <table id="database" class="table table-bordered">
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th>STT</th>
                            <th>Name</th>
                            <th>Price Root</th>
                            <th>Price Sell</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Version</th>
                            <th>Is View</th>
                            <th>Status</th>
                            <th>Feature</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Infomation</th>
                            <th>Description</th>
                            <th>Details</th>
                            <th>Reviews</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $color = ['No Color', 'White', 'Red', 'Blue', 'Black', 'Green', 'Yellow'];
                            $version = ['Null', '64GB', '128GB', '256GB', '512GB', '1TB'];
                            $status = ['Available', 'Out of stock', 'Coming soon'];
                        @endphp
                            @foreach ($products as $key => $value)
                            <tr class="text-center text-nowrap">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ number_format($value->price_root, 0, ',', '.')}} đ</td>
                                <td>{{ number_format($value->price_sell, 0, ',', '.') }} đ</td>
                                <td>{{ $value->code_product }}</td>
                                <td>{{ $value->nameCate }}</td>
                                <td>{{$value->brand->name}}</td>
                                <td><i class="badge rounded-pill badge-light-primary me-1">{{ $color[$value->color] }}</i></td>
                                <td value="{{ $value->select_version }}" >{{ $version[$value->select_version] }}</td>
                                <td><span class="btn view {{$value->is_view == 1 ? 'btn-outline-success' : ' btn-outline-danger'}} round waves-effect" data-id="{{$value->id}}">{{ $value->is_view == 1 ? 'Visible' : 'Disable' }} </span></td>
                                <td value="{{ $value->status }}">{{ $status[$value->status] }}</td>
                                <td>{{ ($value->feature) ? 'Bestseller' :  'New Arrival' }}</td>
                                <td>{{$value->qty}}</td>
                                <td><img src="{{$value->image_product}}" style="width:100px; height:100px" alt=""></td>
                                <td>{!! $value->info_product !!}</td>
                                <td>{!! $value->description !!}</td>
                                <td>{!!$value->details!!}</td>
                                <td>{!!$value->reviews!!}</td>
                                <td>
                                    <button type="button" data-edit={{$value->id}}  class="btn btn-outline-success round waves-effect callEdit" type="button" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</button>
                                    <button data-delete={{$value->id}} type="button" class="btn btn-outline-danger round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#addNewProduct">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addNewProduct">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Notification</h1>
                <input type="hidden" id="product_id">
                <p class="text-center"> Are you sure to delete this product?</p>
                    <div class="col-12 text-center">
                        <button type="submit" id="delete" class="btn btn-danger me-1 mt-1 waves-effect waves-float waves-light">Delete</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editProduct">
    <div class="modal-dialog modal-dialog-centered modal-xl" data-select2-id="84" style="width:1000%" >
        <div class="modal-content" data-select2-id="83">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5" data-select2-id="82">
                <div class="text-center mb-2">
                    <input type="hidden" id="product_edit">
                    <h1 class="mb-1">Edit Product</h1>
                </div>
                <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control credit-card-mask" placeholder="" id="name">
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control credit-card-mask" placeholder="" id="slug">
                                        </div>
                                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Is_view</label>
                                            <select class="form-control" id="is_view" required="">
                                                <option value="">Choose...</option>
                                                <option value=1>Visible</option>
                                                <option value=0>Disable</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Category</label>
                                        <select class="form-control" id="category_id" required="">
                                                @foreach ($categories as $value)
                                                    <option value={{$value->id}}> {{$value->name}} </option>
                                                @endforeach
                                        </select>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Brand</label>
                                        <select class="form-control" id="brand_id" required="">
                                                @foreach ($brands as $value)
                                                    <option value={{$value->id}}> {{$value->name}} </option>
                                                @endforeach
                                        </select>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label">Code Product</label>
                                            <input type="text" class="form-control credit-card-mask" placeholder="" id="code_product">
                                        </div>

                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Quantity</label>
                                            <input type="number" class="form-control credit-card-mask" placeholder="" id="quantity">
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label">Price root</label>
                                            <input type="number" class="form-control credit-card-mask" placeholder="" id="price_root">
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label">Price sale</label>
                                            <input type="number" class="form-control credit-card-mask" placeholder="" id="price_sale">
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Select Version</label>
                                            <select class="form-control" id="version" required="">
                                                    <option value="">Choose...</option>
                                                    <option value="0">Null</option>
                                                    <option value="1">64 GB</option>
                                                    <option value="2">128 GB</option>
                                                    <option value="3">256 GB</option>
                                                    <option value="4">512 GB</option>
                                                    <option value="5">1 TB</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Color</label>
                                            <select class="form-control" id="color" required="">
                                                    <option value="">Choose...</option>
                                                    <option value="0">No Color</option>
                                                    <option value="1">White</option>
                                                    <option value="2">Red</option>
                                                    <option value="3">Blue</option>
                                                    <option value="4">Black</option>
                                                    <option value="5">Green</option>
                                                    <option value="6">Yellow</option>
                                            </select>
                                        </div>

                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Status</label>
                                            <select id="status" class="form-control" required="">
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
                                            <select id="feature" class="form-control" required="">
                                                <option value="0">Choose...</option>
                                                <option value="1">Bestseller</option>
                                                <option value="0">New Arrival</option>
                                            </select>
                                        </div>

                                        <div class="col-xl-4 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Image</label>
                                            <div class="input-group">
                                              <input name="image_product" id="image_product" class="form-control" required>
                                              <a id="lfm" data-input="image_product" data-preview="holderimage" class="lfm btn btn-light">
                                                Choose
                                              </a>
                                            </div>
                                            <img id="holderimage" class="img-thumbnail mt-1" style="width:333px; height:300px" >
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" id="updateProduct" class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
        var row;
        $(document).ready(function(){
            var row;
            $(".callDelete").click(function(){
                var id = $(this).data('delete');
                console.log(id);
                row = $(this);
                $("#product_id").val(id);
            });

             $("#delete").click(function(){
                var id = $("#product_id").val();
                console.log(id);
                $.ajax({
                url: '/admin/products/delete/' + id,
                type: 'get',
                success: function($data) {
                    toastr.success('Delete one category successfully!', 'Success');
                    $(row).closest('tr').remove();
                    $('#addNewProduct').modal('hide');
                        }
                    });
                });
            });
            $(".view").click(function(){
            var text = $(this);
            var idX = $(this).data('id');
            var variable = {
                'id'    : idX,
            };
            $.ajax({
                url : '{{ Route('change.View') }}',
                type: 'post',
                data: variable,
                success:function($data){
                    if($data.status == false){
                        toastr.error('Please do not intervene the system!');
                    } else {
                        toastr.success('Changed view successfully!');
                        if($data.is_view == 1){
                            text.removeClass("btn-outline-danger");
                            text.addClass("btn-outline-success");
                            text.html('Visible');
                        } else {
                            text.removeClass("btn-outline-success");
                            text.addClass("btn-outline-danger");
                            text.html('Disable');
                        }
                    }
                },
            });
        });

        $(".callEdit").click(function(e){
            var id = $(this).data('edit');
            $("#product_edit").val(id);
            e.preventDefault();
            $.ajax({
                url: '/admin/products/edit/' + id,
                type: 'get',
                success : function(response){
                        $('#name').val(response.data.name);
                        $('#slug').val(response.data.slug);
                        $('#price_root').val(response.data.price_root);
                        $('#price_sale').val(response.data.price_sell);
                        $('#code_product').val(response.data.code_product);
                        $('#category_id').val(response.data.category_id);
                        $('#brand_id').val(response.data.brand_id);
                        $('#color').val(response.data.color);
                        $('#version').val(response.data.select_version);
                        $('#is_view').val(response.data.is_view);
                        $('#status').val(response.data.status);
                        $('#feature').val(response.data.feature);
                        $('#quantity').val(response.data.qty);
                        $('#image_product').val(response.data.image_product);
                        CKEDITOR.instances['ckeditorInfoproduct'].setData(response.data.info_product);
                        CKEDITOR.instances['ckeditorDescription'].setData(response.data.description);
                        CKEDITOR.instances['ckeditorDetails'].setData(response.data.details);
                        CKEDITOR.instances['ckeditorReviews'].setData(response.data.reviews);
                }
            });

        $("#updateProduct").click(function(){
                    var payload1 = {
                    'name'          :   $("#name").val(),
                    'slug'          :   $("#slug").val(),
                    'category_id'   :   $("#category_id").val(),
                    'brand_id'      :   $("#brand_id").val(),
                    'code_product'  :   $("#code_product").val(),
                    'qty'           :   $("#quantity").val(),
                    'price_root'    :   $("#price_root").val(),
                    'price_sale'    :   $("#price_sale").val(),
                    'color'         :   $("#color").val(),
                    'version'       :   $("#version").val(),
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
                        url : '/admin/products/update/' + id,
                        type: 'post',
                        data: payload1,
                        success: function($xxx){
                            if($xxx.status == true){
                                toastr.success("Updated product successfully!");
                            }
                            location.reload();
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
    });
</script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript"></script>
<script>
    $(document).ready(function() {
    var table = $('#database').DataTable();
    table.on('click', '.callEdit', function() {
        $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    // console.log(data);
    var src = $('#image_product').attr('src');
    $('#holderimage').attr('src', $tr.find('img').attr('src'));
    var info = $('#ckeditorInfoproduct').val(data[0]);
    console.log(info);
    });
    });
</script>
@endsection
