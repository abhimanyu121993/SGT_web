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
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('script-area')

@endsection
