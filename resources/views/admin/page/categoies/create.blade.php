@extends('admin.share.master')
@section('content')
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Creat Category</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Name Category</label>
                                <input id="name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Slug Category</label>
                                <input id="slug" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12">
                            <label class="form-label" for="basicInput">Parent_id</label>
                            <select class="form-control" id="parent_id" required="">
                                <option value=0> Root </option>
                                @foreach ($categories as $value)
                                <option value={{$value->id}}> {{$value->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12">
                            <label class="form-label" for="basicInput">Is_View</label>
                            <select id="is_view" class="form-control" required="">
                                <option>Choose...</option>
                                <option value="1">Visible</option>
                                <option value="0">Disable</option>
                            </select>

                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12">

                            <label class="form-label" for="basicInput">Banner</label>
                              <div class="input-group">
                                <input id="banner" class="form-control" required>
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
                    </div>
                    <div class="row">
                        <div class="col-4">
                        <button id="createcategory" type="button" class="btn btn-outline-success round waves-effect">Create Category</button>
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
            $("#createcategory").click(function(){

                var payload = {
                    'name'              :   $("#name").val(),
                    'slug'              :   $("#slug").val(),
                    'parent_id'         :   $("#parent_id").val(),
                    'is_view'           :   $("#is_view").val(),
                    'banner'            :   $("#banner").val(),

                };
                $.ajax({
                    url : '/admin/createCategories/create',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("You are create product successfully!");
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

</script>
@endsection
