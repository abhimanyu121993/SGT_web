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
                    <li class="breadcrumb-item active">Register Customer
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

    <div class="section">
        <div class="card">
            <div class="card-content">
                <div class="live-preview">
                    <form
                        action="{{ isset($CustomerEdit) ? route(Session::get('guard') . '.customer.update', $CustomerEdit->id) : route(Session::get('guard') . '.customer.store') }}"
                        method="POST">
                        @if (isset($CustomerEdit))
                            @method('patch')
                        @endif
                        @csrf
                        <div class="row gy-4">
                            <div class="col md12">
                                Choose Membership Plan
                            </div>
                            <div class="col md12">
                                @foreach ($plans as $plan)
                                <div class="input-field col s3">
                                    <label>
                                        <input type="radio" class="form-control" id="membership_plan"
                                            name="membership_plan" value="{{$plan->id}}" @checked(isset($CustomerEdit)?$CustomerEdit->customer_subscribe->subscribe_id==$plan->id:$plan->id==old('membership_plan'))>
                                        <span>{{$plan->title}}</span>
                                    </label>
                                </div>
                                @endforeach
                                @error('membership_plan')<span class="pink-text text-accent-3">{{$message}}</span>@enderror

                            </div>
                        </div>
                        <div class="row gy-4">

                            <div class="input-field col s12">
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->company_name : old('company_name') }}"
                                    >
                                    @error('company_name')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row gy-4">

                            <div class="input-field col s6">
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->first_name : old('first_name') }}"
                                    >
                                    @error('first_name')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>

                            <div class="input-field col s6">
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->last_name : old('last_name') }}"
                                 >
                                    @error('last_name')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>
                            <div class="input-field col s6">
                                <select id="gender" name="gender">
                                @if(!isset($CustomerEdit))
                                    <option selected disabled>--Select Gender--</option>
                                    @endif                                
                                    <option value="M" @isset($CustomerEdit) @selected($CustomerEdit->gender=='M') @else @selected(old('gender')=='M') @endisset>Male</option>
                                    <option value="F" @isset($CustomerEdit) @selected($CustomerEdit->gender=='F') @else @selected(old('gender')=='F') @endisset >Female</option>
                                    <option value="O" @isset($CustomerEdit) @selected($CustomerEdit->gender=='O') @else @selected(old('gender')=='O') @endisset>Other</option>
                                </select>
                            </div>
                            <div class="input-field col s6">
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->dob : '' }}">
                                <label class="active" for="dob">{{__('customer.dob')}}</label>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">

                            <div class="input-field col s6">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->email : old('email') }}" >
                                    @error('email')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>

                            <div class="input-field col s6">
                                <input type="number" class="form-control" id="mobileno" name="mobileno"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->mobileno : old('mobileno') }}"
                                    >
                                    @error('mobileno')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>

                            <!--end col-->
                        </div>

                        <div class="row gy-4">

                            <div class="input-field col s6">
                                <input type="text" class="form-control" id="federal_ein" name="federal_ein"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->federal_ein : old('federal_ein') }}" >
                                    @error('federal_ein')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>

                            <div class="input-field col s6">
                                <input type="number" class="form-control" id="bsis_number" name="bsis_number"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->bsis_number : old('bsis_number') }}"
                                   >
                                    @error('bsis_number')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>

                            <!--end col-->
                        </div>
                        
                        <div class="row gy-4">
                            <div class="input-field col s6">
                                   <select class="select2 browser-default"  id="country" name="country">
                                        <option selected disabled>--Select Country--</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @isset($CustomerEdit) @selected($CustomerEdit->customer_profile->country_id==$country->id) @else @selected(old('country')==$country->id) @endisset>{{ $country->name }}</option>
                                        @endforeach
                                   </select>
                                   <label for="country">{{__('property.country')}}</label>
                                </div>
                                <div class="input-field col s6">
                                   <select class="select2 browser-default" id="state" name="state">
                               
                                <option value="">--Select State--</option>                                   
                                @foreach (Helper::getStateByCountry($CustomerEdit->customer_profile->country_id??old('country')) as $st)
                                   <option value="{{$st->id}}" @isset($CustomerEdit) @selected($CustomerEdit->customer_profile->state_id==$st->id) @else @selected(old('state')==$st->id) @endisset>{{$st->name}}</option>
                               @endforeach
                                   </select>
                                   <label for="state">{{__('property.state')}}</label>
                                </div>
                                <div class="input-field col s6">
                                   <select class="select2 browser-default"  id="city" name="city">
                                    <option value="">--Select City--</option>  
                                    @foreach (Helper::getCitiesByState($CustomerEdit->customer_profile->state_id??old('state')) as $ct)
                                        <option value="{{$ct->id}}" @isset($CustomerEdit) @selected($CustomerEdit->customer_profile->city_id==$ct->id) @else @selected(old('city')==$ct->id) @endisset>{{$ct->name}}</option>
                                    @endforeach
                                   </select>
                                   <label for="city">{{__('property.city')}}</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" class="form-control" id="postcode" name="pincode"
                                        value="{{ isset($CustomerEdit) ? $CustomerEdit->customer_profile->pincode : old('pincode') }}">
                                   <label for="postcode">{{__('property.pincode')}}</label>
                                </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4 mt-2">
                            <div class="input-field col s6">
                                <select class="select2 browser-default" name="timezone_id">
                                    <option value="">--Select Timezone--</option>
                                    @foreach (Helper::getTimeZone() as $timezone)
                                        <option value="{{ $timezone->id }}" @selected(isset($CustomerEdit)?$CustomerEdit->customer_profile->time_zone_id==$timezone->id:$timezone->id==old('timezone_id'))>{{ $timezone->timezone . ' / ' . $timezone->utc }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('timezone_id')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>
                            <div class="input-field col s6">
                                <select class="select2 browser-default" name="currency_id">
                                    <option value="">--Select Currency--</option>
                                    @foreach (Helper::getCurrencies() as $currency)
                                        <option value="{{ $currency->id }}" @selected(isset($CustomerEdit)?$CustomerEdit->customer_profile->currency_id==$currency->id:$currency->id==old('currency_id'))>
                                            {{ $currency->code . ' (' . $currency->symbol . ')' }}</option>
                                    @endforeach
                                </select>
                                @error('currency_id')<span class="pink-text text-accent-3">{{$message}}</span>@enderror
                            </div>

                            <!--end col-->
                        </div>
                        <div class="row gy-4 mt-2">
                            <div class="input-field col s12">
                                <textarea class="form-control" name="address" >{{isset($CustomerEdit)?$CustomerEdit->customer_profile->address:old('address')}}</textarea>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-4">
                                <button class="btn btn-primary" id="btn-btn"
                                    type="submit">{{ isset($CustomerEdit) ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>

@endsection
@section('script-area')

@endsection
