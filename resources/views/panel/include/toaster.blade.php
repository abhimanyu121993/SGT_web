

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@if($errors->any())
@foreach($errors->all() as $error)
<script>
    Toastify({
   text: "{{ $error}}",
   duration: 3000,
   newWindow: true,
   close: true,
   gravity: "top", // `top` or `bottom`
   position: "right", // `left`, `center` or `right`
   stopOnFocus: true, // Prevents dismissing of toast on hover
   style: {
     background: "linear-gradient(to right, #e53935, #ef5350)",
   },
   onClick: function(){} // Callback after click
 }).showToast();
 </script>
 @endforeach
 @endif