
 <div class="modal-content">
     <div class="card-content">
        <h4>Add Route</h4>
         <div class="live-preview">
             <form action="{{ isset($route) ? route(Session::get('guard').'.route.update', $route->id) : route(Session::get('guard').'.route.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @if (isset($route))
                 @method('patch')
                 @endif
                 <div class="row gy-4">
                     <div class="col-xxl-3 col-md-12">
                         <input type="text" class="form-control property_id" id="property_id" name="property_id" value="{{ isset($route) ? $route->property_id : $property_id }}" hidden>
                         <div class="input-group col s12">
                             <input type="text" class="form-control" id="name" name="name" value="{{ isset($route) ? $route->name : old('name') }}" placeholder="Name">
                             <label class="active" for="name">{{__('route.name')}}</label>
                         </div>
                         <div class="file-field input-field col s12" id="image">
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="images">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                         <div class="input-group col s12">
                             <input type="color" class="form-control" id="color" name="color" value="{{ isset($route) ? $route->color : old('color') }}" placeholder="Color">
                             <label class="active" for="name">{{__('route.color')}}</label>
                         </div>

                         <div class="input-group col s12">
                             <input type="number" class="form-control" id="time" name="time" value="{{ isset($route) ? $route->complition_time : old('complition_time') }}" placeholder="Complition Time">
                             <label class="active" for="time">{{__('route.time')}}</label>
                         </div>
                         <div class="input-group col s12">
                             <textarea type="text" class="form-control" id="description" name="description" value="" placeholder="Write Something Here...">{{ isset($route) ? $route->desc : old('desc') }}</textarea>
                             <label class="active" for="description">{{__('route.description')}}</label>
                         </div>
                         <!--end col-->
                     </div>
                     <div class="row col s12 mt-2">
                         <div class="input-group col s12">
                             <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($route) ? 'Update' : 'Submit' }}</button>
                         </div>
                     </div>
                 </div>

                 <!--end col-->
         </div>
         </form>
     </div>
 


 <div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('route.manage')}}</h4>
 <table class="table table-nowrap container" id="example">
     <thead>
         <tr>
             <th scope="col">{{__('route.sr_no')}}</th>
             <th scope="col">{{__('route.route')}}</th>
             <th scope="col">{{__('route.time')}}</th>
             <th scope="col">{{__('route.is_active')}}</th>
             <th scope="col">{{__('route.color')}}</th>
             <th scope="col">{{__('route.description')}}</th>
             <th scope="col">Action</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($routes as $data)
         <tr>
             <th scope="row">{{ $loop->index + 1 }}</th>
             <td>{{ $data->name??'' }}</td>
             <td>{{ $data->complition_time??'' }}</td>
             <td>
                 <div class="switch">
                     <label>
                         <input type="checkbox" value="{{$data->id}}" data-url="{{route('customer.route.active-route',$data->id) }}" class="is_active" id="is_active" {{ $data->is_active==0?'':'checked'   }}>
                         <span class="lever"></span>
                     </label>
                 </div>
             </td>
             <td>{{ $data->color??'' }}</td>
             <td>{{ $data->desc??'' }}</td>

             <td>
                 <div class="dropdown">
                     <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="ri-more-2-fill"></i>
                     </a>
                     @php $bid=Crypt::encrypt($data->id); @endphp
                     <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                         <li><a id="pop" class="dropdown-item" href="{{route(Helper::getGuard().'.route.edit',$bid)}}">
                                 <i class="material-icons light-blue-text text-darken-4">edit</i>
                             </a></li>
                         <li><a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                 <i class="material-icons danger red-text text-accent-4">delete</i>
                             </a>
                         </li>
                         <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.route.destroy', $bid) }}" method="post" style="display: none;">
                             @method('DELETE')
                             @csrf
                         </form>
                     </ul>
                 </div>
             </td>
             @endforeach
         </tr>
     </tbody>
 </table>
 </div></div>
 </div>

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