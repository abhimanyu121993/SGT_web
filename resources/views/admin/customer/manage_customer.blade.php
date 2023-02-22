@extends('layout.panel')
@section('title', 'Customer')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Customer</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Customer</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Customer
                    </li>
                </ol>
            </div>         
        </div>
    </div>
</div>
@endsection
@section('link-area')

@endsection
@section('content-area')

{{-- 
 <div class="card">

    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Customer</h4>
    </div>

</div>

<div class="card">
    <div class="card-content">
    <table id="page-length-option" class="display nowrap" style="width:100%">
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
                    <th>{{__('customer.company_name')}}</th>
                    <th>{{__('customer.federal_ein')}}</th>
                    <th>{{__('customer.bsis_number')}}</th>
                    <th>Action</th>

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
                    <td>{{$data->customer_profile->city->name??''}}</td>
                    <td>{{$data->customer_profile->currency->code??''}}</td>
                    <td>{{$data->customer_profile->company_name??''}}</td>
                    <td>{{$data->customer_profile->federal_ein??''}}</td>
                    <td>{{$data->customer_profile->bsis_number??''}}</td>
                    <th></th>
                </tr>
                @endforeach
</tbody>
        </table>
    </div>
</div>  --}}

@foreach($customers as $data)

<div class="row">
        <div class="col s4">
        <div id="profile-card" class="card animate fadeRight">
            <div class="card-image waves-effect waves-block waves-light">
            <img src="../../../app-assets/images/avatar/avatar-7.png" class="me-75 bg-light-danger" style="height:fit-content" />
                </div>
            <div class="card-content">
                <img src="{{!empty($data->customer_subscribe->subscription->icon)?asset($data->customer_subscribe->subscription->icon):asset($data->customer_subscribe->subscription->img)}}" alt=""
                    class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2" />
                <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                    <i class="material-icons">visibility</i>
                </a>
                <h5 class="card-title activator grey-text text-darken-4">{{$data->name??''}}</h5>
                <p><i class="material-icons profile-card-i">perm_phone_msg</i> {{$data->customer_profile->mobileno??''}}</p>
                <p><i class="material-icons profile-card-i">email</i> {{$data->email??''}}</p>
                <p><i class="material-icons profile-card-i">room</i>{{$data->customer_profile->address??''}}</p>
                Active
                        <div class="switch">
                            <label>
                                <input type="checkbox" value="{{$data->id}}" data-url="{{route('admin.customer.active-customer',$data->id) }}" class="is_active" id="is_active"  {{ $data->isactive==0?'':'checked'   }} >
                                <span class="lever"></span>
                            </label>
                        </div>
                        
            <a href="{{route(Session::get('guard').'.customer.customer-has-permission',Crypt::encrypt($data->id))}}"class="waves-effect waves-light btn-small right mb-5"><i class="material-icons left">cloud</i>{{__('customer.all_permissions')}}</a>
            </div>
            
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{ $data->name??'' }} <i class="material-icons right">close</i>
                </span>
                <p><i class="material-icons">people</i>&nbsp;{{$data->customer_profile->company_name??''}}</p>
                <p><i class="material-icons">layers</i>Federal EIN {{$data->customer_profile->federal_ein??''}}</p>
                <p><i class="material-icons">lens</i>BSIS No {{$data->customer_profile->bsis_number??''}}</p>
            </div>
        </div>
    </div>
   
    @endforeach
</div>
@endsection
@section('script-area')
<script src="{{ asset('app-assets/js/scripts/ui-chips.js')}}"></script>
<script>
    $('.is_active').on('click', function() {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {

                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script>
@endsection
