@extends('admin.share.master')
@section('content')
<div class="table-responsive">
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Name Brand</th>
                <th class="text-center">Banner</th>
                <th class="text-center">Icon</th>
                <th class="text-center">Is_View</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value )
            <tr class="text-center">
                <td style="width:30px"> {{$key+1}} </td>
                <td> {{$value->name}}</td>
                <td><img  id="bannerEdit" style="width:100px; height:100px" src="{{$value->banner}}"></td>
                <td><img  id="IconEdit" style="width:100px; height:100px" src="{{$value->icon}}"></td>
                <td>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input is_view" data-id="{{ $value->id }}" {{ $value->is_view ? 'checked' : '' }}>
                    </div>
                </td>
                <td>
                    <button data-id={{$value->id}} type="button" class="btn btn-primary waves-effect waves-float waves-light callModal" data-bs-toggle="modal" data-bs-target="#addNewCard">
                        Delete
                    </button>
                    <button type="button" data-edit="{{$value->id}}" class="btn btn-danger callEdit" data-bs-toggle="modal" data-bs-target="#editCategory">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="modal fade" id="editCategory">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
        <div class="modal-content" data-select2-id="83">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                <div class="text-center mb-2">
                    <input type="hidden" id="category_edit">
                    <h1 class="mb-1">Edit Category</h1>
                </div>
                <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Name Category</label>
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Slug Category</label>
                                                    <input type="text" name="slug" id="slug" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="form-group col-xl-6 col-md-6 col-12">
                                                <label class="form-label" for="basicInput">Parent_id</label>
                                                <select class="form-control" id="parent_id" name="parent_id" required="">
                                                    <option value="0"> Root </option>
                                                    @foreach ($categories as $value)
                                                        <option value={{$value->id}}>{{$value->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="form-group col-xl-6 col-md-6 col-12">
                                                <label class="form-label" for="basicInput">Banner</label>
                                                <div class="input-group">
                                                    <input name="banner" id="banner" class="form-control" required>
                                                    <a data-input="banner" data-preview="holderbanner" class="lfm btn btn-light">
                                                    Choose
                                                    </a>
                                                </div>
                                                <img id="holderbanner" class="img-thumbnail" data-onload="loadImage()" data-def-dd="photo" name="photo" >
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


<div class="modal fade" id="addNewCard">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Notification</h1>
                <input type="hidden" id="brand_id">
                <p> Are you sure to delete this category?</p>
                    <div class="col-12 text-center">
                        <button type="submit" id="delete_only" class="btn btn-danger me-1 mt-1 waves-effect waves-float waves-light">Delete Only</button>
                        <button type="submit" id="delete_all" class="btn btn-warning me-1 mt-1 waves-effect waves-float waves-light">Delete All</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
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
    $(".is_view").on('change', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/admin/brand/update-is-view/' + id,
            type: 'get',
            success: function($data) {
                toastr.success('You change is-view successfuly!', 'Success')
            }
        });
    });
    var row ;
    $(".callModal").click(function() {
        var id = $(this).data('id');
        console.log(id);
        row = $(this);
        $("#category_id").val(id);
    });
    $("#delete_only").click(function(){
        var id = $("#category_id").val();
        $.ajax({
            url: '/admin/categories/delete_only/' + id,
            type: 'get',
            success: function($data) {
                toastr.success('Delete one category successfully!', 'Success');
                $(row).closest('tr').remove();
                $('#addNewCard').modal('hide');
            }
        });
    });
    $("#delete_all").click(function(){
        var id = $("#brand_id").val();
        $.ajax({
            url: '/admin/brand/delete_all/' + id,
            type: 'get',
            success: function($data) {
              toastr.success('Delete category successfully!', 'Success');
              location.reload();
            }
        });
    });

    $(".callEdit").click(function(e){
                var id = $(this).data('edit');
                console.log(id);
                $("#category_edit").val(id);
                e.preventDefault();
                $.ajax({
                    url: '/admin/categories/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        console.log(response);
                        $('#name').val(response.data.name);
                        $('#slug').val(response.data.slug);
                        $('#parent_id').val(response.data.parent_id);
                        var src= $('#banner').val(response.data.banner);
                        $('#holderbanner').val(src);
                    }
                });

                $("#updateCategory").click(function(){
                    var payload1 = {
                    'name'              :   $('#name').val(),
                    'slug'              :   $("#slug").val(),
                    'parent_id'         :   $("#parent_id").val(),
                    'banner'            :    $('#banner').val(),
                };
                    $.ajax({
                        url : '/admin/categories/update/' + id,
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

    table.on('click', '.callEdit', function() {


        $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    console.log(data);

    var src = $('#banneredit').attr('src');
    var parent = data[2];
    console.log(src);
    console.log(parent);

    $('#name').val(data[1]);
    $('#banner').val(src);
    $('#holderbanner').attr('src', $tr.find('img').attr('src'));

    $('#editForm').attr('action', '/admin/category/update/' + data[0]);
    $('#editCategory ').modal('show');
    });


    });
</script>
@endsection
