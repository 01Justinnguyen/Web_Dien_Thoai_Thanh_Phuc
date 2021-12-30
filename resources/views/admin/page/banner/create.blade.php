@extends('admin.share.master')
@section('content')
    <div class="row match-height">
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Banner</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label class="form-label" for="basicInput">Main Banner</label>
                                    <div class="input-group">
                                        <input id="banner" name="banner" placeholder="Example image below 770x475px"  class="form-control" >
                                        <a data-input="banner" data-preview="holder-image" class="lfm btn btn-light"> Choose </a>
                                    </div>
                                    <img id="holder-image" class="card-img-top" style="width:481.25px; height:296.875px; margin-top:30px">
                                    </div>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                    <script>
                                          $('.lfm').filemanager('banner');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input text in banner</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <br>
                            <br>
                            <br>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Name Product</label>
                                <input type="text" id="name" class="form-control" placeholder="eg. Chamcham Galaxy S9 | S9+" >
                            </div>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Start price</label>
                                <input type="text" id="price" class="form-control" placeholder="eg. $824.00" >
                            </div>

                            <div class="row">
                                <label class="form-label" for="basicInput">Sale offer</label>
                                <input type="text" id="sale" class="form-control" placeholder="eg. -20% Off" >
                            </div>
                            <div class="row">
                                <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <button type="button" id="createBanner" class="btn btn-outline-success round waves-effect">Button</button>
    </div>

<br>

<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Sub Banner</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-xl-6 col-md-6 col-12">
                            <label class="form-label" for="basicInput">Is_view_1</label>
                        <select class="form-control" id="is_view_1" required="">
                            <option value="">Choose...</option>
                            <option value=1>Visible</option>
                            <option value=0>Disable</option>
                        </select>
                        </div>
                        <div class="form-group col-xl-6 col-md-6 col-12">
                            <label class="form-label" for="basicInput">Is_view_2</label>
                        <select class="form-control" id="is_view_2" required="">
                            <option value="">Choose...</option>
                            <option value=1>Visible</option>
                            <option value=0>Disable</option>
                        </select>
                        </div>
                        <div class="form-group col-xl-6 col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                <label class="form-label" for="basicInput">Small Banner 1</label>
                                <div class="input-group">
                                    <input id="smallBanner" name="smallBanner" class="form-control" required="">
                                    <a data-input="smallBanner" data-preview="holder-small1" class="lfm btn btn-light waves-effect waves-float waves-light"> Choose </a>
                                </div>
                                <img id="holder-small1" class="card-img-top" style="width:x; height:300px; margin-top:30px">
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                <script>
                                      $('.lfm').filemanager('banner');
                                </script>
                            </div>
                            </div>
                        <div class="form-group col-xl-6 col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-12">
                            <label class="form-label" for="basicInput">Small Banner 2</label>
                            <div class="input-group">
                                <input id="smallBanner2" name="smallBanner2" class="form-control" required="">
                                <a data-input="smallBanner2" data-preview="holder-banner2" class="lfm btn btn-light waves-effect waves-float waves-light"> Choose </a>
                            </div>
                            <img id="holder-banner2" class="card-img-top" style="width:500px; height:300px; margin-top:30px">
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                            <script>
                                  $('.lfm').filemanager('banner');
                            </script>
                        </div>
                        </div>

                        <div class="form-group col-xl-7 col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                <label class="form-label" for="basicInput">Sub Banner</label>
                                <div class="input-group">
                                    <input id="subBanner" name="subBanner" class="form-control" required="">
                                    <a data-input="subBanner" data-preview="holder-sub" class="lfm btn btn-light waves-effect waves-float waves-light"> Choose </a>
                                </div>
                                <img id="holder-sub" class="card-img-top" style="width:600px; height:200px; margin-top:30px">
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                <script>
                                      $('.lfm').filemanager('banner');
                                </script>
                            </div>
                        </div>
                        <div class="form-group col-xl-5 col-md-6 col-12">
                            <label class="form-label" for="basicInput">Is_view_3</label>
                        <select class="form-control" id="is_view_3" required="">
                            <option value="">Choose...</option>
                            <option value=1>Visible</option>
                            <option value=0>Disable</option>
                        </select>
                        </div>

                            <div class="row" style="margin-top: 20px;">
                            <div class="col-4">
                            <button type="button" id="createSub" class="btn btn-outline-success round waves-effect">Button</button>
                            </div>
                        </div>
                    </div>
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

            $("#createBanner").click(function(){

                var payload = {
                    'main_banner_1'              :   $("#banner").val(),
                    'name_product'               :   $("#name").val(),
                    'start_price'                :   $("#price").val(),
                    'sale_offer'                 :   $("#sale").val(),
                    'is_view'                    :   $("#is_view").val(),

                };
                $.ajax({
                    url : '/admin/banner/createMain',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("Created banner successfully!");
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
            $("#createSub").click(function(){

        var payload = {
            'small_banner_1'              :   $("#smallBanner").val(),
            'small_banner_2'              :   $("#smallBanner2").val(),
            'sub_banner'                  :   $("#subBanner").val(),
            'is_view_1'                   :   $("#is_view_1").val(),
            'is_view_2'                   :   $("#is_view_2").val(),
            'is_view_sub'                 :   $("#is_view_3").val(),


        };
        $.ajax({
            url : '/admin/banner/createSub',
            type: 'post',
            data: payload,
            success: function($xxx){
                if($xxx.status == true){
                    toastr.success("Created banner successfully!");
                }
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
