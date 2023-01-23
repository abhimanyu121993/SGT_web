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
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Customer</h4>
        {{$dataTable->table()}}

        {{$dataTable->scripts()}}
    </div>

</div>

@endsection
@section('script-area')

@endsection
