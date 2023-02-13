@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb-title', 'Property')
@section('breadcrumb-backpage', 'Property')
@section('breadcrumb-currentpage', 'Manage Property')
@section('link-area')

@endsection
@section('content-area')
<div class="card">

    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Property</h4>

    </div>

</div>

<div class="card">
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

                        <a class='dropdown-trigger breadcrumbs-btn right btn' href='#' data-target='property-id{{$property->id}}'>Action</a>
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
                            <li tabindex="0"><a href="{{route(Session::get('guard').'.property.show-checkpoint',$property->id)}}">Checkpoint
                                </a></li>
                            <li tabindex="0"><a href="{{route(Session::get('guard').'.route.index')}}">Route
                                </a></li>
                        </ul>
                  </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script-area')
@endsection