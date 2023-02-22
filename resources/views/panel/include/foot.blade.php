 <!-- BEGIN VENDOR JS-->
  <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN THEME  JS-->
  <script src="{{asset('app-assets/js/plugins.js')}}"></script>
 <script src="{{asset('app-assets/js/search.js')}}"></script>
 <script src="{{asset('app-assets/js/custom/custom-script.js')}}"></script>
 <script src="{{asset('app-assets/js/scripts/customizer.js')}}"></script>
 <script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/extra-components-sweetalert.js')}}"></script>
<script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-select2.js')}}"></script>
{{-- <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.js')}}"></script> --}}
 <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.js')}}"></script>
  <script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>

  <script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>

  <script src="{{asset('app-assets/js/scripts/advance-ui-modals.js')}}"></script>
 <script src="{{asset('app-assets/js/style.js')}}"></script>
  <script>
       $(document).on('click',".toggle-fullscreen",function () {
      toggleFullScreen();
   });
   function toggleFullScreen() {
      if (
         (document.fullScreenElement && document.fullScreenElement !== null) ||
         (!document.mozFullScreen && !document.webkitIsFullScreen)
      ) {
         if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
         } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
         } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
         } else if (document.documentElement.msRequestFullscreen) {
            if (document.msFullscreenElement) {
               document.msExitFullscreen();
            } else {
               document.documentElement.msRequestFullscreen();
            }
         }
      } else {
         if (document.cancelFullScreen) {
            document.cancelFullScreen();
         } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
         } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
         }
      }
   }
  </script>

  <!-- END THEME  JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->

  {{-- Data Table Js cdn --}}
  <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>

<script src="{{asset('app-assets/js/scripts/form-elements.js')}}"></script>
<script>
   $(document).ready(function() {
$('#change_password_modal').click(function(){
   var url = $(this).data("url");
   $('#modal1').modal('open');
});
});
  </script>
<script>
    $('.is_active').on('click', function() {
        swal({
    title: "Are you sure?",
    text: "Want to change status !",
    icon: 'warning',
    dangerMode: true,
    buttons: {
      cancel: 'No, Please!',
      delete: 'Yes, Change It'
    }
  }).then(function (willDelete) {
    if (willDelete) {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_limit').attr('disabled', 'true');
            },
            success: function() {

                $('.is_limit').removeAttr('disabled')

            }
        });
    } else {
      swal("Your Previous Status is safe", {
        title: 'Cancelled',
        icon: "error",
      });
      location.reload(true);
    }
  });
       
    });
</script>
