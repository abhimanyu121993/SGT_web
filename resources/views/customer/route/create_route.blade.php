
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">


<div class="modal-content">
     <div class="card-content">
        <h4 class="ghjhgjh" style="color:black !important;">Create Route</h4>

        <hr style="top: 46px;">
         <div class="live-preview">
             <form action="{{ isset($route) ? route(Session::get('guard').'.route.update', $route->id) : route(Session::get('guard').'.route.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @if (isset($route))
                 @method('patch')
                 @endif
                 <div class="row gy-4">
                     <div class="col-xxl-3 col-md-12">
                         <input type="text" class="form-control property_id" id="property_id" name="property_id" value="{{ isset($route) ? $route->property_id : $property_id }}" hidden>
                         <div class="input-field col s12">
                             <input type="text" class="form-control" id="name" name="name" value="{{ isset($route) ? $route->name : old('name') }}">
                             <label class="active" for="name">{{__('route.name')}}<span style="color:red;">*</span></label>
                         </div>
                          

                         <div class="input-field col s12">
                             <input type="number" class="form-control" id="time" name="time" value="{{ isset($route) ? $route->complition_time : old('complition_time') }}">
                             <label class="active" for="time">{{__('route.time')}}<span style="color:red;">*</span></label>
                         </div>

                         <!--end col-->
                     </div>
                     <div class="row col s12">
                        
                        <p style="color:black;"><b>Checkpoints</b><span style="color:red;">*</span>(drag)</p>

 <div class="app-todo">
  
    <div class="app-wrapper">


          <ul class="collection1 todo-collection">
            <li class=" todo-items">

              <div class="list-content">
              
                 <div class="list-desc">
              <span class = "number-alex">1.</span><i class="material-icons icon-move">more_vert</i>
                 <a class="waves-effect waves-light btn jj"><span class="hide-on-small-onl">checkpoint 1</span></a>

                      <a class="waves-effect waves-light btn jj" ><span class="hide-on-small-onl">10 minutes</span></a>


                    <div class="delete-task"><i class="material-icons">delete</i></div>
                 </div>

              </div>
             
            </li>
            <li class="todo-items">
              
             
              <div class="list-content">
              
                 <div class="list-desc">
              <span class = "number-alex">2.</span><i class="material-icons icon-move">more_vert</i>
                 <a class="waves-effect waves-light btn jj"> <span class="hide-on-small-onl">checkpoint 1</span> </a>

                      <a class="waves-effect waves-light btn jj"> <span class="hide-on-small-onl">10 minutes</span> </a>


                    <div class="delete-task"><i class="material-icons">delete</i></div>
                 </div>

              </div>
              
                
             
            </li>


            <li class="todo-items">
              
             
              <div class="list-content">
              
                 <div class="list-desc">
                 <span class = "number-alex">3.</span><i class="material-icons icon-move">more_vert</i>
                 <a class="waves-effect waves-light btn jj"><span class="hide-on-small-onl">checkpoint 1</span></a>

                      <a class="waves-effect waves-light btn jj" ><span class="hide-on-small-onl">10 minutes</span></a>


                    <div class="delete-task"><i class="material-icons">delete</i></div>
                 </div>

              </div>
              
                
             
            </li>

            <li class="todo-items">
              
             
              <div class="list-content">
              
                 <div class="list-desc">
              <span class = "number-alex">4.</span><i class="material-icons icon-move">more_vert</i>
                 <a class="waves-effect waves-light btn jj" >checkpoint 1</a>

                      <a class="waves-effect waves-light btn jj" >10 minutes</a>


                    <div class="delete-task"><i class="material-icons">delete</i></div>
                 </div>

              </div>
             
            </li>
          </ul>

          <hr>


             <a class="waves-effect waves-light btn ww" style="background-color: white;
                   color: black;">Cancel</a>&nbsp;&nbsp;

                      <a class="waves-effect waves-light btn ww" style="background-color: white;
                color: black;">Save</a>


    </div>
    </div>




                     </div>
                 </div>

                 <!--end col-->
         </div>
         </form>
     </div>
 

 </div>

 <script src="{{asset('/app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('/app-assets/vendors/sortable/jquery-sortable-min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/select2/select2.full.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('/app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('/app-assets/js/search.js')}}"></script>
    <script src="{{asset('/app-assets/js/custom/custom-script.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/customizer.js')}}"></script> 
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('/app-assets/js/scripts/app-todo.js')}}"></script>



 <script>
    $('.is_active').on('click', function() {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {

                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script>