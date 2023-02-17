<div class="modal-content">
    <div class="card-content">
        <h4>Add shift</h4>
        <div class="live-preview">
            <form action="{{ isset($shift) ? route(Session::get('guard').'.shift.update', $shift->id) : route(Session::get('guard').'.shift.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($shift))
                @method('patch')
                @endif
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-12">
                        <input type="text" class="form-control property_id" id="property_id" name="property_id" value="{{ isset($shift) ? $shift->property_id : $property_id }}" hidden>
                        <div class="input-group col s12">
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ isset($shift) ? $shift->start_time : old('start_time') }}" placeholder="Start Time">
                            <label class="active" for="start_time">{{__('shift.start_time')}}</label>
                        </div>
                        <div class="col-xxl-3 col-md-12">
                        <div class="input-group col s12">
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ isset($shift) ? $shift->end_time : old('end_time') }}" placeholder="End Time">
                            <label class="active" for="end_time">{{__('shift.end_time')}}</label>
                        </div>
                    </div>
                    <div class="row col s12 mt-2">
                        <div class="input-group col s12">
                            <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($shift) ? 'Update' : 'Submit' }}</button>
                        </div>
                    </div>
                </div>

                <!--end col-->
        </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('route.manage')}}</h4>
 <table class="table table-nowrap container" id="example">
     <thead>
         <tr>
             <th scope="col">{{__('shift.start_time')}}</th>
             <th scope="col">{{__('shift.end_time')}}</th>
             <th scope="col">{{__('shift.is_active')}}</th>
             <th scope="col">Action</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($shifts as $data)
         <tr>
             <td>{{ $data->start_time??'' }}</td>
             <td>{{ $data->end_time??'' }}</td>
             <td>
                 <div class="switch">
                     <label>
                         <input type="checkbox" value="{{$data->id}}" data-url="{{route('customer.shift.active-shift',$data->id) }}" class="is_active" id="is_active" {{ $data->is_active==0?'':'checked'   }}>
                         <span class="lever"></span>
                     </label>
                 </div>
             </td>
             <td>
                 <div class="dropdown">
                     <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="ri-more-2-fill"></i>
                     </a>
                     @php $bid=Crypt::encrypt($data->id); @endphp
                     <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                         <li><a id="pop" class="dropdown-item" data-url="{{route(Helper::getGuard().'.shift.edit',$bid)}}">
                                 <i class="material-icons light-blue-text text-darken-4">edit</i>
                             </a></li>
                         <li><a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                 <i class="material-icons danger red-text text-accent-4">delete</i>
                             </a>
                         </li>
                         <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.shift.destroy', $bid) }}" method="post" style="display: none;">
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