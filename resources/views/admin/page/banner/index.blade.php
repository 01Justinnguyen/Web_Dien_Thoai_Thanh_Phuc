@extends('admin.share.master')
@section('content')
{{-- *****BẢNG BANNER PHỤ***** --}}
<div class="table-responsive">
    <table id="datatable" class="table table-bordered">
        <thead >
            <tr>
                <th class="text-center">Small Banner 1</th>
                <th class="text-center">Is_view_1</th>
                <th class="text-center">Small Banner 2</th>
                <th class="text-center">Is_view_2</th>
                <th class="text-center">Sub Banner</th>
                <th class="text-center">Is_view_3</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listSub as $key => $value )
            <tr class="text-center">
                <td class="img1"><img style="width:100px; height:100px" src="{{$value->small_banner_1}}"></td>

                <td>
                    <span class="btn view1 {{$value->is_view_1 == 1 ? 'btn-outline-success' : ' btn-outline-danger'}} round waves-effect" data-view1="{{$value->id}}">{{ $value->is_view_1 == 1 ? 'Visible' : 'Disable' }} </span>
                </td>
                <td class="img2" ><img style="width:100px; height:100px" src="{{$value->small_banner_2}}"></td>

                <td>
                    <span class="btn view2 {{$value->is_view_2 == 1 ? 'btn-outline-success' : ' btn-outline-danger'}} round waves-effect" data-view2="{{$value->id}}">{{ $value->is_view_2 == 1 ? 'Visible' : 'Disable' }} </span>
                </td>
                <td class="sub" ><img style="width:100px; height:100px" src="{{$value->sub_banner}}"></td>

                <td>
                    <span class="btn view3 {{$value->is_view_sub == 1 ? 'btn-outline-success' : ' btn-outline-danger'}} round waves-effect" data-view3="{{$value->id}}">{{ $value->is_view_sub == 1 ? 'Visible' : 'Disable' }} </span>
                </td>
                <td>
                    <button type="button" data-sub="{{$value->id}}" class="btn btn-danger callSub" data-bs-toggle="modal" data-bs-target="#editSub">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 {{-- *****BẢNG BANNER CHÍNH***** --}}
<div class="table-responsive">
    <table id="datatable2" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>STT</th>
                <th class="text-center">Main Banner 1</th>
                <th class="text-center">Name</th>
                <th class="text-center">Start price</th>
                <th class="text-center">Offer Sale</th>
                <th class="text-center">Is_view</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listMain as $key => $value )
            <tr class="text-center">
                <td>{{$key+1}}</td>
                <td class="main"><img style="width:100px; height:100px" src="{{$value->main_banner_1}}"></td>
                <td> {{$value->name_product}}</td>
                <td> {{$value->start_price}}</td>
                <td> {{$value->sale_offer}}</td>
                <td>
                    <span class="btn view {{$value->is_view == 1 ? 'btn-outline-success' : ' btn-outline-danger'}} round waves-effect" data-id="{{$value->id}}">{{ $value->is_view == 1 ? 'Visible' : 'Disable' }} </span>
                </td>
                <td>
                    <button data-banner={{$value->id}} type="button" class="btn btn-primary waves-effect waves-float waves-light callModal" data-bs-toggle="modal" data-bs-target="#addNewCard">
                        Delete
                    </button>
                    <button type="button" data-edit="{{$value->id}}" class="btn btn-danger callEdit" data-bs-toggle="modal" data-bs-target="#editBanner">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
  {{-- ******XÓA BANNER CHÍNH****** --}}
<div class="modal fade" id="addNewCard">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Notification</h1>
                <input type="hidden" id="banner_id">
                <p> Are you sure to delete this banner?</p>
                    <div class="col-12 text-center">
                        <button type="submit" id="delete_banner" class="btn btn-danger me-1 mt-1 waves-effect waves-float waves-light">Delete</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>
{{-- ******SỬA BANNER CHÍNH****** --}}
<div class="modal fade" id="editBanner">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
        <div class="modal-content" data-select2-id="83">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                <div class="text-center mb-2">
                    <input type="hidden" id="banner_edit">
                    <h1 class="mb-1">Edit MainBanner</h1>
                </div>
                <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
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
                                                        <a data-input="banner" data-preview="holderbanner" class="lfm btn btn-light"> Choose </a>
                                                    </div>
                                                    <img id="holderbanner" class="card-img-top" style="width:340px; height:175px; margin-top:30px">
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
                                            {{-- <div class="row">
                                                <label class="form-label" for="basicInput">Is_view</label>
                                            <select class="form-control" id="is_view" required="">
                                                <option value="">Choose...</option>
                                                <option value=1>Visible</option>
                                                <option value=0>Disable</option>
                                            </select>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="button" id="updateBanner" class="btn btn-outline-success round waves-effect">Button</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- *****CHỈNH SỦA BANNER PHỤ***** --}}
<div class="modal fade" id="editSub">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
        <div class="modal-content" data-select2-id="83">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                <div class="text-center mb-2">
                    <input type="hidden" id="sub_edit">
                    <h1 class="mb-1">Edit Sub Banner</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xl-6 col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <label class="form-label" for="basicInput">Small Banner 1</label>
                                            <div class="input-group">
                                                <input id="smallBanner" name="smallBanner" class="form-control" required="">
                                                <a data-input="smallBanner" data-preview="holdersmall1" class="lfm btn btn-light waves-effect waves-float waves-light"> Choose </a>
                                            </div>
                                            <img id="holdersmall1" class="card-img-top" style="width:300px; height:150px; margin-top:30px">
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
                                            <a data-input="smallBanner2" data-preview="holdersmall2" class="lfm btn btn-light waves-effect waves-float waves-light"> Choose </a>
                                        </div>
                                        <img id="holdersmall2" class="card-img-top" style="width:300px; height:150px; margin-top:30px">
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
                                                <a data-input="subBanner" data-preview="holdersub" class="lfm btn btn-light waves-effect waves-float waves-light"> Choose </a>
                                            </div>
                                            <img id="holdersub" class="card-img-top" style="width:600px; height:200px; margin-top:30px">
                                            </div>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                            <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                            <script>
                                                  $('.lfm').filemanager('subBanner');
                                            </script>
                                        </div>
                                    </div>

                                        <div class="row" style="margin-top: 20px;">
                                        <div class="col-4">
                                        <button type="button" id="updateSub" class="btn btn-outline-success round waves-effect">Button</button>
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
$(document).ready(function() {

    $(".view").click(function(){
            var text = $(this);
            var idX = $(this).data('id');
            var variable = {
                'id'    : idX,
            };
            $.ajax({
                url : '{{ Route('change.Main') }}',
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

        $(".view1").click(function(){
            var text = $(this);
            var idX = $(this).data('view1');
            var variable = {
                'id'    : idX,
            };
            $.ajax({
                url : '{{ Route('change.Sub1') }}',
                type: 'post',
                data: variable,
                success:function($data){
                    if($data.status == false){
                        toastr.error('Please do not intervene the system!');
                    } else {
                        toastr.success('Changed view successfully!');
                        if($data.is_view_1 == 1){
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

        $(".view2").click(function(){
            var text = $(this);
            var idX = $(this).data('view2');
            var variable = {
                'id'    : idX,
            };
            $.ajax({
                url : '{{ Route('change.Sub2') }}',
                type: 'post',
                data: variable,
                success:function($data){
                    if($data.status == false){
                        toastr.error('Please do not intervene the system!');
                    } else {
                        toastr.success('Changed view successfully!');
                        if($data.is_view_2 == 1){
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

        $(".view3").click(function(){
            var text = $(this);
            var idX = $(this).data('view3');
            var variable = {
                'id'    : idX,
            };
            $.ajax({
                url : '{{ Route('change.Sub3') }}',
                type: 'post',
                data: variable,
                success:function($data){
                    if($data.status == false){
                        toastr.error('Please do not intervene the system!');
                    } else {
                        toastr.success('Changed view successfully!');
                        if($data.is_view_sub == 1){
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



    var row ;

    $(".callModal").click(function() {
        var id = $(this).data('banner');
        console.log(id);
        row = $(this);
        $("#banner_id").val(id);
    });

    $("#delete_banner").click(function(){
        var id = $("#banner_id").val();
        $.ajax({
            url: '/admin/banner/deleteMain/' + id,
            type: 'get',
            success: function($data) {
                toastr.success('Deleted banner successfully!', 'Success');
                $(row).closest('tr').remove();
                $('#addNewCard').modal('hide');
            }
        });
    });


    $(".callEdit").click(function(e){
                var id = $(this).data('edit');
                $("#banner_edit").val(id);
                e.preventDefault();
                $.ajax({
                    url: '/admin/banner/editMain/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#name').val(response.data.name_product);
                        $('#price').val(response.data.start_price);
                        $('#sale').val(response.data.sale_offer);
                        $('#banner').val(response.data.main_banner_1);
                        // $('#is_view').val(response.data.is_view);
                    }
                });


                $("#updateBanner").click(function(){
                    var payload1 = {
                    'name_product'            :   $('#name').val(),
                    'start_price'             :   $('#price').val(),
                    'sale_offer'              :   $('#sale').val(),
                    'main_banner_1'           :   $('#banner').val(),
                    // 'is_view'                 :   $('#is_view').val(),
                };
                    $.ajax({
                        url : '/admin/banner/updateMain/' + id,
                        type: 'post',
                        data: payload1,
                        success: function($xxx){
                            if($xxx.status == true){
                                toastr.success("Product create successfully!");
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
    $(".callSub").click(function(e){
            var id = $(this).data('sub');
            $("#sub_edit").val(id);
            e.preventDefault();
            $.ajax({
                url: '/admin/banner/editSub/' + id,
                type: 'get',
                success: function(response) {
                    $('#smallBanner').val(response.data.small_banner_1);
                    $('#smallBanner2').val(response.data.small_banner_2);
                    $('#subBanner').val(response.data.sub_banner);
                }
            });


            $("#updateSub").click(function(){
                var payload1 = {
                    'small_banner_1'            :   $('#smallBanner').val(),
                    'small_banner_2'            :   $('#smallBanner2').val(),
                    'sub_banner'                :   $('#subBanner').val(),
                };
                    $.ajax({
                        url : '/admin/banner/updateSub/' + id,
                        type: 'post',
                        data: payload1,
                        success: function($xxx){
                            if($xxx.status == true){
                                toastr.success("Product create successfully!");
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

    var table = $('#datatable').DataTable();

    table.on('click', '.callSub', function() {
        $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();

    $('#holdersmall1').attr('src', $tr.find('.img1 img').attr('src'));
    $('#holdersmall2').attr('src', $tr.find('.img2 img').attr('src'));
    $('#holdersub').attr('src', $tr.find('.sub img').attr('src'));

    });
    });
</script>
<script>
    $(document).ready(function() {

    var table = $('#datatable2').DataTable();

    table.on('click', '.callEdit', function() {


        $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();

    $('#holderbanner').attr('src', $tr.find('.main img').attr('src'));
    });
    });
</script>
@endsection
