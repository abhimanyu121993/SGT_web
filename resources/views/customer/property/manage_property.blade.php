@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb-title', 'Property')
@section('breadcrumb-backpage', 'Property')
@section('breadcrumb-currentpage', 'Manage Property')
@section('breadcrumb-menu')
<div class="col s2 m6 l6"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-triggert" href="{{route(Helper::getGuard().'.property.create')}}"><span class="hide-on-small-onl">{{__('property.add_property')}}</span></a> 
            </div>
@endsection
@section('content-area')
<div class="card-content">
    <div id="work-collections" class="seaction">
        <div class="row">
            @foreach ($properties as $property)
            <div class="col s12 m6 l4">
                                <div class="card small">
                                    <div class="card-image">
                                        <img src="../../../app-assets/images/gallery/23.png" alt="sample" />
                                    </div>
                                    <div class="card-content">
                                    <span class="card-title">{{ $property->name ?? '' }}</span>
                                        <p>
                                            I am a very simple card. I am good at containing small bits of information.
                                        </p>
                                    </div>
                                      @php $pid=Crypt::encrypt($property->id); @endphp

                                    <div class="card-action"><a href="{{ route(Helper::getGuard().'.checkpoint.show',$pid) }}">{{__('property.qr_map')}}</a> <a href="{{ route(Helper::getGuard().'.property.show',$pid) }}">{{__('property.view_property')}}</a></div>
                                </div>
                            </div>
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