@jquery
@toastr_js
@toastr_render
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{$error}}");
        @endforeach
        @endif
</script>
<script>
    $(document).ready(function(){
        $('#loginButton').click(function(e){
            var email        = $("#emailLogin").val();
            var password     = $("#passwordLogin").val();

            var data = {
                'email'       : email,
                'password'    : password,

        };
        $.ajax({
                url : '/login',
                type: 'post',
                data: data,
                success: function($data){
                    if($data.status == 0){
                        toastr.error($data.message);
                    } else if($data.status == 1) {
                        toastr.warning($data.message);
                    } else {
                        toastr.success($data.message);
                    }
                    setTimeout(function(){location.reload()}, 1500);
                },
                error: function($errors){
                    var listErrors = $errors.responseJSON.errors;
                    $.each(listErrors, function(key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });
        $('#registerButton').click(function(e){
        var email        = $("#email_register").val();
        var password     = $("#password_register").val();
        var re_password  = $("#re_password_register").val();
        var fullname     = $("#fullname_register").val();
        var data = {
            'email'       : email,
            'password'    : password,
            're_password' : re_password,
            'name'        : fullname,
    };
    $.ajax({
            url : '/register',
            type: 'post',
            data: data,
            success: function($xxx){
                toastr.success('Đã tạo mới tài khoản thành công');
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
