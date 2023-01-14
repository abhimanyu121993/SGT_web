<script>
@if(Session::has('success'))
swal({
    title: 'Success',
    icon: 'success',
    text:"{{Session::get('success')}}",
  });
@elseif(Session::has('warning'))
swal({
    title: 'Warning',
    icon: 'warning',
    text:"{{Session::get('warning')}}",
  });
@elseif(Session::has('error'))
swal({
    title: 'OPP\'s',
    icon: 'error',
    text:"{{Session::get('error')}}",
  });
@elseif(Session::has('info'))
swal({
    title: 'Info',
    icon: 'info',
    text:"{{Session::get('info')}}",
  });
@endif

</script>