@extends('layout.panel')
@section('title', 'Manage Checkpoint')
@section('breadcrumb-title', 'Manage Checkpoint')
@section('breadcrumb-backpage', 'Manage Checkpoint')
@section('breadcrumb-currentpage', 'Manage Checkpoint')
@section('breadcrumb-menu')
<div class="col s2 m6 l6"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger addCheckpoint" data-url="{{route(Helper::getGuard().'.property.show-checkpoint',$property_id)}}"><span class="hide-on-small-onl">Add Checkpoint</span></a>
              
            </div>
@endsection
@section('content-area')
<div class="section">
    <div id="address-map-container" style="width:100%;height:400px; ">
        <div style="width: 100%; height: 100%" id="address-map"></div>
    </div>
</div>
   <div class="container">
   <div class="modal-content">
        <h5>{{__('checkpoint.manage')}}</h5>
                <div class="card border-radius-6">
        <div class="card-content">

        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('checkpoint.sr_no')}}</th>
                    <th scope="col">{{__('checkpoint.name')}}</th>
                    <th scope="col">{{__('checkpoint.file')}}</th>
                    <th scope="col">{{__('checkpoint.color')}}</th>
                    <th scope="col">{{__('checkpoint.desc')}}</th>
                    <th scope="col">{{__('checkpoint.is_active')}}</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkpoints as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $data->name??'' }}</td>
                    <td> <img src="{{ asset($data->file) }}" height="50px"alt="" class="square" /></td>
                    <td>{{ $data->color??'' }}</td>
                    <td>{{ $data->desc??'' }}</td>
                    <td>
                    <div class="input-group">
                                    <select class="browser-default status" id="" data="{{ $data->id }}"
                                        name="status">
                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}" {{ $data->status_id }}
                                                @selected($data->status_id == $st->id)>{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                    </div>
                    </td>
                    <td>
                        <div class="dropdown" >
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($data->id); @endphp
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item addCheckpoint" data-url="{{route(Session::get('guard').'.checkpoint.edit',$bid)}}">
                                        <i class="material-icons light-blue-text text-darken-4">edit</i>
                                    </a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                        <i class="material-icons danger red-text text-accent-4">delete</i>
                                    </a>
                                </li>
                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route(Helper::getGuard().'.checkpoint.destroy', $bid) }}" method="post"
                                    style="display: none;">
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
        </div>
                </div>
    </div>
   </div>
   <div id="modal1" class="modal modal-fixed-footer">
    
   </div>

@endsection
@section('script-area')
<script src="{{asset('app-assets/js/mapInput.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script>
       $(document).ready(function() {
     var a= $('input#address').characterCounter();
     console.log(a);
    });
</script>
<script>
    $(document).ready(function(){
    
    $('.modal').modal();
    $('#modal1').modal('open');
    $('#modal1').modal('close')
  });
</script>
<script>
    $(document).ready(function(){
    $(document).on('click','.addCheckpoint',function(){
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            success: function(data) {
                console.log(data);
                $('#modal1').html(data);
                $('#modal1').modal('open');
            }
        });
    });
  });
    </script>
@endsection