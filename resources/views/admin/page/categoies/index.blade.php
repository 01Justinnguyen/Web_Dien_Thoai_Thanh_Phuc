@extends('admin.share.master')
@section('content')
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Name Category</th>
                <th>Parent Id</th>
                <th>Status</th>
                <th>Banner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listCategories as $key => $value)
            <tr class="text-center">
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>{{empty($value->nameParent) ? 'Root' : $value->nameParent}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div class="form-check form-check-primary form-switch">
                            <input type="checkbox" class="form-check-input is_view" data-id="{{ $value->id }}" {{ $value->is_view ? 'checked' : '' }}>
                        </div>
                    </div>
                </td>
                <td><img src="{{$value->banner}}" style="width:100px;height:100px;"></td>
                <td class="text-center text-nowrap">
                    <button type="button" data-id="{{$value->id}}" class="btn btn-outline-primary waves-effect callModal2" data-bs-toggle="modal" data-bs-target="#editCategory">
                        Edit
                    </button>
                    <button data-id={{$value->id}} type="button" class="btn btn-outline-primary waves-effect callModal" data-bs-toggle="modal" data-bs-target="#deleteCategory">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="deleteCategory">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Notification</h1>
                <input type="hidden" id="category_id">
                <p class="text-center">Do you want to delete this category?</p>

                <!-- form -->
                <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75" onsubmit="return false" novalidate="novalidate">

                    <div class="col-12 text-center">
                        <button type="submit" id="delete_only" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Delete Only</button>
                        <button type="submit" id="delete_all" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Delete All</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect " data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editCategory">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <input type="hidden" id="category_edit">
                    <h1 class="mb-1">Edit Category</h1>
                </div>
                <form method="POST" id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Name Category</label>
                                    <input id="name_edit" value="" type="text" class="form-control" required value="">
                                </div>
                            </div>
                            <div class="form-group col-xl-4 col-md-6 col-12">
                                <label class="form-label" for="basicInput">Parent_id</label>
                                <select id="parent_edit" class="form-control" required="">
                                    <option value="0">Root</option>
                                    @foreach ($categories as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-4 col-md-6 col-12">
                                <label class="form-label" for="basicInput">Banner</label>
                                  <div class="input-group">
                                    <input id="banner_edit" class="form-control" required value="" >
                                    <a data-input="banner_editor" data-preview="holder-icon" class="lfm btn btn-light">
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
                            <button id="createcategory" type="button" class="btn btn-outline-success round waves-effect">Edit Category</button>
                            </div>
                        </div>
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
     $(document).ready(function() {
            $(".is_view").on('change', function() {
                var id = $(this).data('id');
                console.log('Cần thay đổi trạng thái cho id = ' + id);
                $.ajax({
                    url: '/admin/categories/update-is-view/' + id,
                    type: 'get',
                    success: function($data) {
                        toastr.success('You change is-view successfuly!', 'Success')
                    }
                });
            });
            var row;
            $(".callModal").click(function(){
                var id = $(this).data('id');
                row = $(this);
                console.log(id);
                $("#category_id").val(id);
            });

            $("#delete_only").click(function(){
                var id = $("#category_id").val();
                $.ajax({
                    url: '/admin/categories/delete_only/' + id,
                    type: 'get',
                    success: function($data) {
                        toastr.success('Delete category successfuly!', 'Success');
                        $(row).closest('tr').remove();
                        $('#deleteCategory').modal('hide');
                    }
                });
            });

            $("#delete_all").click(function(){
                var id = $("#category_id").val();
                $.ajax({
                    url: '/admin/categories/delete_all/' + id,
                    type: 'get',
                    success: function($data) {
                        toastr.success('Delete category successfuly!', 'Success');
                        location.reload();
                    }
                });
            });

            // var row2;
            $(".callModal2").click(function(e){
                var id = $(this).data('id');
                console.log(id);
                $("#category_edit").val(id);
                // $('#editCategory').modal('show');
                e.preventDefault();
                $.ajax({
                    url: '/admin/categories/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        console.log(response)
                        $('#name_edit').val(response.data.name);
                        $('#parent_edit').val(response.data.parent_id);
                        $('#banner_edit').val(response.data.banner);
                    }
                });
            });

        });
</script>
@endsection
