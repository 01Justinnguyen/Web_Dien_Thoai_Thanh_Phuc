@extends('admin.share.master')
@section('content')

 {{-- *****BẢNG BANNER CHÍNH***** --}}
<div class="table-responsive">
    <table id="datatable2" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>STT</th>
                <th class="text-center">Name Product</th>
                <th class="text-center">Brands</th>
                <th class="text-center">Total QTY</th>
                <th class="text-center">Sold QTY</th>
                <th class="text-center">Remaining QTY</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($data as $key => $value )
            <tr class="text-center">
                <td>{{$key+1}}</td>
                <td> {{$value->name}}</td>
                <td> {{$value->brand->name}}</td>
                <td> {{$value->qty}}</td>
                <td> Đã bán</td>
                <td> Còn lại</td>
                <td>
                    <button type="button" class="btn btn-primary waves-effect waves-float waves-light callModal" data-bs-toggle="modal" data-bs-target="#addNewCard">
                        Delete
                    </button>
                    <button type="button" class="btn btn-danger callEdit" data-bs-toggle="modal" data-bs-target="#editBanner">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
