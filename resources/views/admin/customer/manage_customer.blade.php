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
                    {{-- <th>{{__('customer.city')}}</th>
                    <th>{{__('customer.currency')}}</th>
                    <th>{{__('customer.country')}}</th> --}}
                    <th>{{__('customer.company_name')}}</th>
                    <th>{{__('customer.federal_ein')}}</th>
                    <th>{{__('customer.bsis_number')}}</th>
                    {{-- <th>Action</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach($customers as $data)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <td>{{$data->name??''}}</td>
                    <td>{{$data->email??''}}</td>
                    <td>{{$data->customer_profile->mobileno??''}}</td>
                    <td>
                        <div class="chip gradient-45deg-purple-deep-orange gradient-shadow white-text">
                            {{$data->customer_subscribe->subscription->title ??''}} Plan
                        </div>
                    </td>
                    <td>{{$data->customer_profile->address??''}}</td>
                    {{-- <td>{{$data->customer_profile->city->name??''}}</td>
                    <td>{{$data->customer_profile->currency->code??''}}</td> --}}
                    <td>{{$data->customer_profile->company_name??''}}</td>
                    <td>{{$data->customer_profile->federal_ein??''}}</td>
                    <td>{{$data->customer_profile->bsis_number??''}}</td>
                    {{-- <th></th> --}}
                </tr>
                @endforeach
</tbody>
        </table>
    </div>
</div>
@endsection
@section('script-area')
<script src="{{ asset('app-assets/js/scripts/ui-chips.js')}}"></script>
@endsection
