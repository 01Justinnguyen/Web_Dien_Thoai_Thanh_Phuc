@extends('admin.share.master')
@section('content')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Products</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Name</th>
                                <th>Price_root</th>
                                <th>Price_sale</th>
                                <th>Code_product</th>
                                <th>Category_id</th>
                                <th>Color</th>
                                <th>Version</th>
                                <th>Is_view</th>
                                <th>Status</th>
                                <th>feature</th>
                                <th>Quantity</th>
                                <th>Image_product</th>
                                <th>Info_product</th>
                                <th>Description</th>
                                <th>Details</th>
                                <th>Reviews</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $color = ['No Color', 'White', 'Red', 'Blue', 'Black', 'Green', 'Yellow'];
                                $version = ['Null','64GB', '128GB', '256GB', '512GB','1TB'];
                                $status = ['Available','Out of stock', 'Coming soon'];
                            @endphp
                            @foreach ($products as $key => $value)
                                <tr class="text-center text-nowrap">
                                    <td style="width:30px">{{$key+1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{ number_format($value->price_root, 0, ',', '.')}} đ</td>
                                    <td>{{ number_format($value->price_sell, 0, ',', '.') }} đ</td>
                                    <td>{{$value->code_product}}</td>
                                    <td>{{$value->nameCate}}</td>
                                    <td {{$value->color}}> {{$color[ $value->color]}}</td>
                                    <td {{$value->select_version}}>{{$version[$value->select_version]}}</td>
                                    <td>
                                        <button type="button" class="btn {{$value->is_view == 1 ? 'btn-outline-success' : ' btn-outline-danger'}} round waves-effect view" title="Click here to change status" data-id="{{ $value->id }}" type="button">{{ $value->is_view == 1 ? 'Visible' : 'Disable' }}</button>
                                    </td>
                                    <td> {{$status[$value->status]}}</td>
                                    <td>{{ ($value->feature) ? 'New Arrival' : 'Bestseller' }}</td>
                                    <td>{{$value->qty}}</td>
                                    <td><img src="{{$value->image_product}}" style="width:100px; height:100px" alt=""></td>
                                    <td>{!! $value->info_product !!}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{!!$value->details!!}</td>
                                    <td>{!!$value->reviews!!}</td>
                                    <td>
                                        <button data-edit={{$value->id}} type="button" class="btn btn-outline-success round waves-effect callEdit" type="button" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</button>
                                        <button data-delete={{$value->id}} type="button" class="btn btn-outline-danger round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#deleteProduct">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- modal delete --}}
    <div class="modal fade" id="deleteProduct">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h1 class="text-center mb-1" id="addNewCardTitle">Notification</h1>
                    <input type="hidden" id="product_id">
                    <p class="text-center"> Are you sure to delete this category?</p>
                        <div class="col-12 text-center">
                            <button  type="submit" id="delete_product" class="btn btn-warning me-1 mt-1 waves-effect waves-float waves-light">Delete</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal" aria-label="Close">
                                Cancel
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal edit product --}}
<div class="modal fade" id="editProduct" >
    <div class="modal-dialog modal-dialog-centered modal-xl" data-select2-id="84" >
        <div class="modal-content" data-select2-id="83" >
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5" data-select2-id="82" >
                <div class="text-center mb-2">
                    <input type="hidden" id="category_edit">
                    <h1 class="mb-1">Edit Category</h1>
                </div>
                <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control credit-card-mask" placeholder="" id="name">
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control credit-card-mask" placeholder="" id="slug">
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Category_Id</label>
                                        <select class="form-control" id="category_id" required="">
                                            <option value=0> Root </option>
                                            {{-- @foreach ($category as $value)
                                            <option value={{$value->id}}> {{$value->name}} </option>
                                            @endforeach --}}
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
                                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
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
                                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
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
                                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Is_view</label>
                                            <select class="form-control" id="is_view" required="">
                                                <option value="">Choose...</option>
                                                <option value=1>Visible</option>
                                                <option value=0>Disable</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                            <label class="form-label" for="basicInput">Status</label>
                                            <select id="status" class="form-control" required="">
                                                <option>Choose...</option>
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
                                                <option>Choose...</option>
                                                <option value="1">New Arrival</option>
                                                <option value="0">Bestseller</option>
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
                                            <img id="holderbanner" class="img-thumbnail mt-1" style="width:333px; height:300px" >
                                          </div>
                                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                          <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                          <script>
                                                $('.lfm').filemanager('banner');
                                          </script>
                                          <div class="col-xl-8 col-md-3 col-sm-12 mb-2 mt-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#info_product" role="tab"><i data-feather='clipboard'></i>Infor Product</a></li>
                                                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#descrpition" role="tab"><i data-feather='edit'></i>Descrpition</a></li>
                                                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#detail" role="tab"><i data-feather='align-justify'></i>Details</a></li>
                                                <li class="nav-item"><a class="nav-link"data-bs-toggle="pill" href="#review" role="tab"><i data-feather='thumbs-up'></i>Review</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade" id="info_product" role="tabpanel">
                                                    <textarea id="ckeditorInfoproduct" cols="30" class="form-control" rows="10"></textarea>
                                                </div>
                                                <div class="tab-pane fade active show file-text"  id="description" role="tabpanel">
                                                    <textarea id="ckeditorDescription" cols="30" class="form-control" rows="10"></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="detail" role="tabpanel">
                                                    <textarea  id="ckeditorDetail" cols="30" class="form-control" rows="10"></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="review" role="tabpanel">
                                                    <textarea  id="ckeditorReview" cols="30" class="form-control" rows="10"></textarea>
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
                                            CKEDITOR.replace('ckeditorDetail', options);
                                            CKEDITOR.replace('ckeditorReview', options);
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" id="updateCategory" class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
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
            var row ;
            $(".callDelete").click(function() {
                var id = $(this).data('delete');
                // console.log(id);
                row = $(this);
                $("#product_id").val(id);
            });

            $("#delete_product").click(function(){
            var id = $("#product_id").val();
            $.ajax({
                url: '/admin/products/delete/' + id,
                type: 'get',
                success: function($data) {
                    toastr.success('Delete one product successfully!', 'Success');
                    $(row).closest('tr').remove();
                    $('#deleteProduct').modal('hide');
                }
            });
        });
        $(".view").click(function() {
            var text = $(this);
            var idX = $(this).data('id');
            var payload = {
                'id': idX,
            };
            $.ajax({
                url: '{{ Route('change.View') }}',
                type: 'post',
                data: payload,
                success: function($data) {
                    if ($data.status == false) {
                    toastr.warning('Please do not interfere with the system!');
                    } else {
                        toastr.success('You have changed status successfully!!!');
                        if ($data.is_view == 1) {
                            text.removeClass('btn-outline-danger');
                            text.addClass('btn-outline-success');
                            text.html('Visible');
                        } else {
                            text.removeClass('btn-outline-success');
                            text.addClass('btn-outline-danger');
                            text.html('Disable');
                        }
                    }
                },
            });
        });
        $(".callEdit").click(function(e){
            var id = $(this).data('edit');
            console.log(id);
            $("#product_edit").val(id);
            e.preventDefault();
                $.ajax({
                    url: '/admin/product/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#name').val(response.data.name);
                        $('#slug').val(response.data.slug);
                        $('#price_root').val(response.data.price_root);
                        $('#price_sale').val(response.data.price_sell);
                        $('#code_product').val(response.data.code_product);
                        $('#category_id').val(response.data.category_id);
                        $('#color').val(response.data.color);
                        $('#version').val(response.data.version);
                        $('#is_view').val(response.data.is_view);
                        $('#status').val(response.data.status);
                        $('#feature').val(response.data.feature);
                        $('#info_product').val(response.data.info_product);
                        $('#quantity').val(response.data.qty);
                        $('#details').val(response.data.details);
                        $('#description').val(response.data.description);
                        $('#reviews').val(response.data.reviews);
                        $('#image_product').val(response.data.image_product)
                        // var src= $('#banner').val(response.data.banner);
                        // $('#holderbanner').val(src);
                    }
                });
        });
    });
</script>
@endsection
