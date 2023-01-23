@extends('layout.panel')
@section('title', 'Customer')
@section('breadcrumb-title', 'Customer')
@section('breadcrumb-backpage', 'Customer')
@section('breadcrumb-currentpage', 'Manage Customer')
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
                    <td></td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script-area')

@endsection
