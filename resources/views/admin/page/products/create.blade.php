@extends('admin.share.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Product</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Name</label>
                            <input id="name" type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="helpInputTop">Slug</label>
                            <input id="slug" type="text" class="form-control" id="helpInputTop">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="disabledInput">Price_Root</label>
                            <input id="price_root" type="text" class="form-control" id="disabledInput" disabled="">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="disabledInput">Price_Sell</label>
                            <input id="price_sell" type="number" class="form-control" id="disabledInput" disabled="">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="disabledInput">Code_Product</label>
                            <input id="code_product" type="number" class="form-control" id="disabledInput" disabled="">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="disabledInput">Quantity</label>
                            <input id="quantity" type="number" class="form-control" id="disabledInput" disabled="">
                        </div>
                    </div>
                    <div class="form-group col-xl-2 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Is_View</label>
                        <select id="is_view" class="form-control" required="">
                            <option>Choose...</option>
                            <option value="1">Visible</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-2 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Status</label>
                        <select id="status" class="form-control" required="">
                            <option>Choose...</option>
                            {{-- hàng có sẵn --}}
                            <option value="1">Available</option>
                            {{-- hết hàng --}}
                            <option value="2">Out of stock</option>
                            {{-- sắp ra mắt --}}
                            <option value="3">Comming soon</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-2 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Feature</label>
                        <select id="feature" class="form-control" required="">
                            <option>Choose...</option>
                            <option value="1">New Arrival</option>
                            <option value="0">Bestseller</option>
                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Category_Id</label>
                        <select class="form-control" id="parent_id" required="">
                            <option value=0> Root </option>
                            {{-- @foreach ($categories as $value)
                            <option value={{$value->id}}> {{$value->name}} </option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group col-xl-4 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Image_product</label>
                          <div class="input-group">
                            <input id="image_product" class="form-control" required>
                            <a data-input="banner" data-preview="holder-icon" class="lfm btn btn-light">
                              Choose
                            </a>
                          </div>
                          <img id="holder-icon" class="img-thumbnail">
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                        <script>
                              $('.lfm').filemanager('banner');
                        </script>
                    <div class="form-group col-xl-4 col-md-6 col-12">
                        <label class="form-label" for="basicInput">COLOR</label>
                        <select class="form-control" id="parent_id" required="">
                            <option value=0> Root </option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="disabledInput">Infor_Product </label>
                            <textarea class="form-control" id="info_product" rows="3" placeholder="Textarea"></textarea>
                        </div>
                    </div>

                    <div class="form-group col-xl-12 col-md-6 col-12">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#descrpition" role="tab"><i class="icofont icofont-attachment"></i>Descrpition</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#detail" role="tab"><i class="icofont icofont-ebook"></i>Details</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#information" role="tab"><i class="icofont icofont-contacts"></i>Information</a></li>
                            <li class="nav-item"><a class="nav-link"data-bs-toggle="pill" href="#review" role="tab"><i class="icofont icofont-contacts"></i>Review</a></li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div class="tab-pane fade active show file-text"  id="description" role="tabpanel">
                                <textarea id="ckeditorDescription" cols="30" class="form-control" rows="10"></textarea>
                            </div>
                            <div class="tab-pane fade" id="detail" role="tabpanel">
                                <textarea  id="ckediorDetail" cols="30" class="form-control" rows="10"></textarea>
                            </div>
                            <div class="tab-pane fade" id="information" role="tabpanel">
                                <textarea  id="ckeditorInformation" cols="30" class="form-control" rows="10"></textarea>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel">
                                <textarea  id="ckeditorReview" cols="30" class="form-control" rows="10"></textarea>
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
                        CKEDITOR.replace('ckeditorDescription', options);
                        CKEDITOR.replace('ckediorDetail', options);
                        CKEDITOR.replace('ckeditorInformation', options);
                        CKEDITOR.replace('ckeditorReview', options);
                    </script>
                   <div class="row text-nowrap" style="float: right; margin-top: 30px">
                       <div class="col-4">
                       <button id="createcategory" type="button" class="btn btn-outline-success round waves-effect">Create Category</button>
                       </div>
                   </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
