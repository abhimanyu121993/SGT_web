@extends('layout.panel')
@section('title', 'Guard')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Guard Profile</span></h5>
            </div>       
        </div>
    </div>
</div>
@endsection
@section('link-area')

<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard.css">


@endsection
@section('content-area')
<div class="section users-edit">
    <div class="card">
        <div class="card-content">
            <form action="{{route(Session::get('guard').'.secuirty-guard.update', $guard->id)  }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($guard))
                @method('patch')
                @endif
                <div class="row">
                    <div class="col l8">
                        <div class="row">
                            <div class="media display-flex align-items-center mb-2">
                                <a class="mr-2" href="#">
                                    <img src="{{asset($guard->images)}}"  onerror="this.onerror=null;this.src='{{asset('app-assets/images/sgt/male.webp')}}';" alt="users avatar" class="z-depth-4 circle" height="70" width="70">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s4 input-field">
                                <input id="name" name="name" type="text" class="validate" value="{{ $guard->name ?? '' }}" data-error=".errorTxt2">
                                <label for="name">{{__('security_guard.name')}}</label>
                            </div>
                            <div class="col s4 input-field">
                                <input id="name" name="gender" type="text" class="validate" value="{{ $guard->gender ?? '' }}" data-error=".errorTxt2">
                                <label for="name">{{__('security_guard.gender')}}</label>
                            </div>

                            <div class="col s4 input-field">
                                <input id="created_at" name="created_at" type="text" class="validate" value="{{ $guard->created_at->format('d-M-Y H:i:s a') ?? '' }}" data-error=".errorTxt2" readonly>
                                <label for="created_at">{{__('security_guard.account_created_date')}}</label>
                            </div>

                            <div class="col s4 input-field">
                                <input id="job_id" type="text" class="validate" value="{{ $guard->user_id ?? '' }}" data-error=".errorTxt2" readonly>
                                <label for="job_id">{{__('security_guard.guard_job_id_card')}}</label>
                            </div>
                            <div class="col s4 input-field">
                                <input id="phone" name="phone" type="text" class="validate" value="{{ $guard->phone ?? '' }}" data-error=".errorTxt2">
                                <label for="phone">{{__('security_guard.phone')}}</label>
                            </div>
                            <div class="col s4 input-field">
                                <input id="phone" name="email" type="text" class="validate" value="{{ $guard->email ?? '' }}" data-error=".errorTxt2">
                                <label for="phone">{{__('security_guard.email')}}</label>
                            </div>
                            <h6>Address</h6>
                            <div class="col s6 input-field">
                                <input id="street" name="street" type="text" class="validate" value="{{ $guard->street ?? '' }}" data-error=".errorTxt2">
                                <label for="street">{{__('security_guard.street')}}</label>
                            </div>
                            <div class="input-group col s6">
                                <select class="select2 browser-default" id="country" name="country">
                                    <option selected disabled>--Select Country--</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @isset($guard) @selected($guard->country_id==$country->id) @else @selected(old('country_id')==$country->id) @endisset>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <span class="active" for="country">{{__('security_guard.country')}}</span>

                            </div>
                            <div class="input-group col s6">
                                <select class="select2 browser-default" id="state" name="state">
                                    <option value="">--Select State--</option>
                                    @foreach (Helper::getStateByCountry($guard->country_id??old('country_id')) as $st)
                                    <option value="{{$st->id}}" @isset($guard) @selected($guard->state_id==$st->id) @else @selected(old('state_id')==$st->id) @endisset>{{$st->name}}</option>
                                    @endforeach
                                </select>
                                <span class="active" for="state">{{__('security_guard.state')}}</span>

                            </div>
                            <div class="input-group col s6">
                                <select class="select2 browser-default" id="city" name="city">
                                    <option value="">--Select City--</option>
                                    @foreach (Helper::getCitiesByState($guard->state_id??old('state_id')) as $ct)
                                    <option value="{{$ct->id}}" @isset($guard) @selected($guard->city_id==$ct->id) @else @selected(old('city_id')==$ct->id) @endisset>{{$ct->name}}</option>
                                    @endforeach
                                </select>
                                <span class="active" for="city">{{__('security_guard.city')}}</span>

                            </div>
                            <div class="col s6 input-field">
                                            <select class="select2 browser-default" name="timezone" id="timezone">
                                            <option value="">--Select Timezone--</option>   
                                            @foreach ($timezones as $timezone)
                                                    <option value="{{ $timezone->id }}" @selected($timezone->id==$guard->time_zone_id)>{{ $timezone->timezone ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label>{{__('security_guard.timezone')}}</label>
                                        </div>

                            <div class="col s12 input-field">
                                <input id="pincode" name="pincode" type="text" class="validate" value="{{ $guard->pincode ?? '' }}" data-error=".errorTxt2">
                                <label for="pincode">{{__('security_guard.pincode')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="col s12 m6 l12 card-width  ">
                            <div class="card border-radius-6 gradient-45deg-indigo-blue pt-5">
                                <p class="#212121 grey darken-4 center-align"><img class="hide-on-med-and-down" src="{{ asset('app-assets/images/logo/sgtlogo.jpeg') }}" alt="materialize logo" height="30px" width="70" /></p>
                                <div class="card-content ">
                                    <div class="row">
                                        <div class="col s6 "><img class="hide-on-med-and-down border-radius-6" src="{{asset($guard->images)}}"  onerror="this.onerror=null;this.src='{{asset('app-assets/images/sgt/male.webp')}}';" alt="materialize logo" height="50px" width="50" /></div>
                                        <div class="col s6">{{QrCode::size(50)->generate($guard->user_id)}}</div>
                                    </div>

                                    <div style="margin-top: 0;">
                                        <p style="font-size: smaller; color:white"><strong>Name:</strong><u>John Doe</u> <br>
                                            Guard id: <u>{{$guard->user_id}}</u>

                                    </div>
                                </div>
                            </div>
                            <div class="col s-12">
                                <div class="col s12 display-flex justify-content-end mt-5">
                                    <input type="submit" class="btn indigo" value="Update" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col s12 m6 l4 card-width">
                    <div class="card border-radius-6">
                        <div class="card-content center-align">
                            <h6><b>{{__('security_guard.completed_job') }}</b></h6>
                            <p>{{__('security_guard.shift_already_completed') }}</p>
                            <h5><b>21.5k</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4 card-width">
                    <div class="card border-radius-6">
                        <div class="card-content center-align">
                            <h6><b>{{__('security_guard.shift_missed') }}</b></h6>
                            <p>{{__('security_guard.missed_shift_by_guard') }}</p>
                            <h5><b>21.5k</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4 card-width">
                    <div class="card border-radius-6">
                        <div class="card-content center-align">
                            <h6><b>{{__('security_guard.leave_approved') }}</b></h6>
                            <p>{{__('security_guard.leave_approved_during_job') }}</p>
                            <h5><b>21.5k</b></h5>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route(Session::get('guard').'.update-password')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                            <div class="col s3 input-field">
                            <input  name="guard_id" type="text" class="validate" value="{{ $guard->id ?? '' }}" data-error=".errorTxt2" hidden>
                                <input  name="email" type="text" class="validate" value="{{ $guard->email ?? '' }}" data-error=".errorTxt2" readonly>
                                <label >{{__('security_guard.login_id')}}</label>
                            </div>
                            <div class="col s3 input-field">
                            <input id="password" name="password" type="password">
                                <label id="password">{{__('security_guard.password')}}</label>
                            </div>
                            <div class="col s3 input-field">
                            <input id="cpassword" name="cpassword" type="text" >
                                <label id="cpassword">{{__('security_guard.cpassword')}}</label>
                            </div>
                                <div class="col s2 ">
                                    <input type="submit" class="btn indigo" value="{{__('security_guard.change_password')}}" />
                                </div>
                        </div>
                        </form>

                    </div>
        </div>

    </div>
</div>

@endsection
@section('script-area')
@endsection