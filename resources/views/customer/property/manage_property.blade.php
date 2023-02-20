@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>All Property</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">All Property</a>
                    </li>
                    <li class="breadcrumb-item active">All Property
                    </li>
                </ol>
            </div> 
            <div class="col s2 m6 l6 mb-2"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-triggert" href="{{route(Helper::getGuard().'.property.create')}}"><span class="hide-on-small-onl">{{__('property.add_property')}}</span></a> 
            </div>       
        </div>
    </div>
</div>
@endsection
@section('content-area')
<div class="card-content">
    <div id="work-collections" class="seaction">
        <div class="row">
            @foreach ($properties as $property)
            <div class="col s12 m6 l4">
                <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{asset($property->file)}}" onerror="this.onerror=null;this.src='{{asset('app-assets/images/gallery/23.png')}}';" alt="sample" />
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $property->name ?? '' }} <i
                        class="material-icons right">more_vert</i>
                        @php $pid=Crypt::encrypt($property->id); @endphp
                    </span>
                    <p><a href="#">{{$property->address}}</a></p>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $property->name ?? '' }}<i class="material-icons right">close</i>
                    </span>
                   <p>
                    <b>City : </b>{{$property->city_detail->name??''}} <br>
                    <b>State : </b>{{$property->state_detail->name??''}} <br>
                    <b>City : </b>{{$property->country_detail->name??''}}
                   </p>
                  </div>
          
                    <div class="card-action"><a href="{{ route(Helper::getGuard().'.checkpoint.show',$pid) }}">QR map</a> <a href="{{ route(Helper::getGuard().'.property.show',$pid) }}" style="float:right;">View </a></div>
          
          
                </div>
                
            </div>
            {{-- <div class="col s12 m6 l4">
                                <div class="card small">
                                    <div class="card-image">
                                        <img src="{{asset($property->file)}}" onerror="this.onerror=null;this.src='{{asset('app-assets/images/gallery/23.png')}}';" alt="sample" />

                                    </div>
                                    <div class="card-content">
                                    <p class="card-title">
                                        <strong>{{ $property->name ?? '' }}</strong>
                                        
                                    </p>
                                       
                                    </div>
                                      @php $pid=Crypt::encrypt($property->id); @endphp

                                    <div class="card-action"><a href="{{ route(Helper::getGuard().'.checkpoint.show',$pid) }}">{{__('property.qr_map')}}</a> <a href="{{ route(Helper::getGuard().'.property.show',$pid) }}">{{__('property.view_property')}}</a></div>
                                </div>
            </div> --}}
            @endforeach
        </div>
    </div>
</div>


{{--<div class="card">
    <div class="card-content">
        <table id="scroll-dynamic" class="display">
            <thead>
                <tr>
                    <th>{{__('property.sr_no')}}</th>
<th>{{__('property.name')}}</th>
<th>{{__('property.pincode')}}</th>
<th>{{__('property.country')}}</th>
<th>{{__('property.state')}}</th>
<th>{{__('property.city')}}</th>
<th>{{__('property.address')}}</th>
<th>{{__('property.latitude')}}</th>
<th>{{__('property.longitude')}}</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($properties as $property)
    <tr>
        <th>{{ $loop->index+1 }}</th>
        <td>{{ $property->name ?? '' }}</td>
        <td>{{ $property->postcode ?? '' }}</td>
        <td>{{ $property->country_details->name ?? '' }}</td>
        <td>{{ $property->state_details->name ?? '' }}</td>
        <td>{{ $property->city_details->name ?? '' }}</td>
        <td>{{ $property->address ?? '' }}</td>
        <td>{{ $property->lattitude ?? '' }}</td>
        <td>{{ $property->longitude ?? '' }}</td>
        <td>
            @php $bid=Crypt::encrypt($property->id); @endphp

            <a class='dropdown-trigger breadcrumbs-btn right btn' href='#'
                data-target='property-id{{$property->id}}'>Action</a>
            <!-- Dropdown Structure -->
            <div class="col s2 m6 l6">
                <ul id='property-id{{$property->id}}' class='dropdown-content'>
                    <li tabindex="0"> <a href="{{route(Session::get('guard').'.property.edit',$bid)}}">Edit</a>
                    </li>
                    <li tabindex="0"> <a href="#"
                            onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                            Delete
                        </a></li>

                    <form id="delete-form-{{ $bid }}"
                        action="{{ route(Session::get('guard').'.property.destroy', $bid) }}" method="post"
                        style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                    <li tabindex="0"><a
                            href="{{route(Session::get('guard').'.property.show-checkpoint',$property->id)}}">Checkpoint
                        </a></li>
                    <li tabindex="0"><a class="property_route" href="#"
                            data-url="{{route(Session::get('guard').'.route.show-route',$property->id)}}">Route
                        </a></li>
                </ul>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
<div id="modal1" class="modal route_modal modal-fixed-footer">
</div>--}}
@endsection
@section('script-area')

<script>
$(document).ready(function() {
    $(document).on('click', '.property_route', function() {
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            success: function(data) {
                $('#modal1').html(data);
                $('#modal1').modal('open');
            }
        });
    });
});
</script>
@endsection