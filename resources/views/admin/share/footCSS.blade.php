 <!-- BEGIN: Vendor JS-->
 <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
 <!-- BEGIN Vendor JS-->
 <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
 <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
 <!-- BEGIN: Page Vendor JS-->
 <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
 <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
 <!-- END: Page Vendor JS-->
 <!-- BEGIN: Theme JS-->
 <script src="../../../app-assets/js/core/app-menu.js"></script>
 <script src="../../../app-assets/js/core/app.js"></script>
 <script>
     $(window).on('load', function() {
         if (feather) {
             feather.replace({
                 width: 14,
                 height: 14
             });
         }
     })
 </script>
 @jquery
 @toastr_js
 @toastr_render
 <script>
     @if(count($errors) > 0)
         @foreach($errors->all() as $error)
             toastr.error("{{$error}}");
         @endforeach
         @endif
 </script>
