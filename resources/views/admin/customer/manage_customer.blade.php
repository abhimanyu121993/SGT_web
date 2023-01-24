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
    </div>

</div>

<div class="card">
    <div class="card-content">
        <table id="scroll-dynamic" class="display">
            <thead>
                <tr>
                    <th>{{__('customer.sr_no')}}</th>
                    <th>{{__('customer.name')}}</th>
                    <th>{{__('customer.email')}}</th>
                    <th>{{__('customer.mobile')}}</th>
                    <th>{{__('customer.membership_plan')}}</th>
                    <th>{{__('customer.address')}}</th>
                    <th>{{__('customer.city')}}</th>
                    <th>{{__('customer.currency')}}</th>
                    <th>{{__('customer.country')}}</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($customers as $data)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$data->name??''}}</th>
                    <th>{{$data->email??''}}</th>
                    <th>{{$data->customer_profile->mobileno??''}}</th>
                    <th>{{$data->customer_profile->membership_plan??''}}</th>
                    <th>{{$data->customer_profile->address??''}}</th>
                    <th>{{$data->customer_profile->city->name??''}}</th>
                    <th>{{$data->customer_profile->currency->code??''}}</th>
                    <th>{{$data->customer_profile->currency->country??''}}</th>
                    <th></th>
                </tr>   
                @endforeach
</tbody>
        </table>
    </div>
</div>
@endsection
@section('script-area')

@endsection
