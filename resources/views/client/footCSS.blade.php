<!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="/client/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="/client/js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="/client/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="/client/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="/client/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="/client/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="/client/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="/client/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="/client/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="/client/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="/client/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="/client/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="/client/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="/client/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="/client/js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="/client/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="/client/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="/client/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="/client/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="/client/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="/client/js/main.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61e02577b84f7301d32ad5b0/1fp9p4p2u';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
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



    <!--End of Tawk.to Script-->
