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
                <td>{{ empty($value->nameParent) ? 'root' : $value->nameParent }}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div class="form-check form-check-primary form-switch">
                            <input type="checkbox" class="form-check-input is_view" data-id="{{ $value->id }}" {{ $value->is_view ? 'checked' : '' }}>
                        </div>
                    </div>
                </td>
                <td><img src="{{$value->banner}}" style="width:100px;height:100px;"></td>
                <td>
                    <button type="button" class="btn btn-outline-primary waves-effect">Edit</button>
                    <button type="button" class="btn btn-outline-primary waves-effect" data-bs-toggle="modal" data-bs-target="#deleteCategory">
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
                <p class="text-center">Do you want to delete this categories?</p>

                <!-- form -->
                <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75" onsubmit="return false" novalidate="novalidate">

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Delete Only</button>
                        <button type="submit" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Delete All</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal" aria-label="Close">
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
     $(document).ready(function() {
            $(".is_view").on('change', function() {
                var id = $(this).data('id');
                // console.log('Cần thay đổi trạng thái cho id = ' + id);
                $.ajax({
                    url: '/admin/categories/update-is-view/' + id,
                    type: 'get',
                    success: function($data) {
                        toastr.success('You change is-view successfuly!', 'Success')
                    }
                });
            });
        });
</script>
@endsection
