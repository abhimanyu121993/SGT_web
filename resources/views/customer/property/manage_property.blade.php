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
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Postcode</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Lattitude</th>
                    <th>Longitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <th>{{ $loop->index+1 }}</th>
                    <td>{{ $property->name ?? '' }}</td>
                    <td>{{ $property->postcode ?? '' }}</td>
                    <td>{{ $property->country ?? '' }}</td>
                    <td>{{ $property->state ?? '' }}</td>
                    <td>{{ $property->city ?? '' }}</td>
                    <td>{{ $property->address ?? '' }}</td>
                    <td>{{ $property->lattitude ?? '' }}</td>
                    <td>{{ $property->longitude ?? '' }}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($property->id); @endphp
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item"
                                        href="{{route(Session::get('guard').'.property.edit',$bid)}}">Edit</a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                </li>

                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route(Session::get('guard').'.property.destroy', $bid) }}" method="post"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script-area')

@endsection
