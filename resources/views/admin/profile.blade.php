@extends('layout.panel')
@section('title', 'Admin Profile')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Admin Profile</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Profile
                    </li>
                </ol>
            </div>       
        </div>
    </div>
</div>
@endsection
@section('link-area')

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content-area')

    <div class="section users-edit">
        <div class="card">
            <div class="card-content">
                <!-- <div class="card-body"> -->
                <ul class="tabs mb-2 row">
                    <li class="tab">
                        <a class="display-flex align-items-center active" id="account-tab" href="#account">
                            <i class="material-icons mr-1">person_outline</i><span>Account</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="display-flex align-items-center" id="information-tab" href="#information">
                            <i class="material-icons mr-2">error_outline</i><span>Information</span>
                        </a>
                    </li>
                </ul>
                <div class="divider mb-3"></div>
                <form action="{{ route('admin.profile.update', Auth::guard(Session::get('guard'))->user()->id) }}" method="post"  enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <input type="file" name="profile" id="fileid" hidden>
                    <div class="row">
                        <div class="col s12" id="account">
                            <!-- users edit media object start -->
                            <div class="media display-flex align-items-center mb-2">
                                <a class="mr-2" href="#">
                                    <img src="{{ asset('storage/'.$user->admin_profile->pic) }}" alt="users avatar"
                                        class="z-depth-4 circle" height="64" width="64">
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading mt-0">{{ $user->admin_profile->full_name ?? '' }}</h5>
                                    <div class="user-edit-btns display-flex">
                                        <a href="javascript:void(0)" class="btn-small indigo" id="buttonid" >Change</a>
                                        <a href="#" class="btn-small btn-light-pink">Reset</a>
                                    </div>
                                </div>
                            </div>
                                <div class="col s4 input-field right">
                                    <p>Account created On</p>
                                       <h6>{{ $user->admin_profile->created_at->format('d-M-Y H:i:s a')?? '' }}</h6>
                                    </div>
                            </div>
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <div class="row">
                                <div class="col s12 m6">
                               
                                    <div class="row">

                                        <div class="col s12 input-field">
                                            <input id="first_name" name="first_name" type="text" class="validate"
                                                value="{{ $user->admin_profile->first_name ?? '' }}"
                                                data-error=".errorTxt1">
                                            <label for="first_name">First Name</label>
                                            <small class="errorTxt1"></small>
                                        </div>

                                        <div class="col s12 input-field">
                                            <input id="email" name="email" type="email" class="validate"
                                                value="{{ $user->admin_profile->email ?? '' }}" data-error=".errorTxt3"
                                                >
                                            <label for="email">E-mail</label>
                                            <small class="errorTxt3"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12 input-field">
                                            <input id="last_name" name="last_name" type="text" class="validate"
                                                value="{{ $user->admin_profile->last_name ?? '' }}" data-error=".errorTxt2">
                                            <label for="last_name">Last Name</label>
                                            <small class="errorTxt2"></small>
                                        </div>
                                        <div class="col s12 input-field">
                                            <input id="mobileno" name="mobileno" type="number"
                                                value="{{ $user->admin_profile->mobileno ?? '' }}" class="validate">
                                            <label for="mobileno">Mobile No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- users edit account form ends -->
                        </div>
                        <div class="col s12" id="information">
                            <!-- users edit Info form start -->
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12">
                                            <h6 class="mb-4"><i class="material-icons mr-1">person_outline</i>Personal
                                                Info</h6>
                                        </div>
                                        <div class="row s12 input-field">

                                            <div class="col">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col">
                                                <label>
                                                    <input class="validate" type="radio" name="gender" value="M" @isset($user->admin_profile)@checked($user->admin_profile->gender=='M')@endisset>
                                                    <span>Male</span>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <label>
                                                    <input class="validate" type="radio" name="gender" value="F" @isset($user->admin_profile)@checked($user->admin_profile->gender=='F')@endisset >
                                                    <span>Female</span>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <label>
                                                    <input class="validate" type="radio" name="gender" value="O" @isset($user->admin_profile)@checked($user->admin_profile->gender=='O')@endisset>
                                                    <span>Other</span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col s12 input-field">
                                            <select class="select2 browser-default" name="country" id="country">
                                                <option value="" selected disabled>--Select Country--</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @isset($user->admin_profile)@selected($user->admin_profile->country== $country->id) @endisset>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <label>Country</label>
                                        </div>
                                        <div class="col s12 input-field">
                                            <select class="select2 browser-default" name="state" id="state">
                                                @isset($user->admin_profile)
                                                @foreach (Helper::getStateByCountry($user->admin_profile->country) as $st)
                                                    <option value="{{$st->id}}" @selected($st->id==$user->admin_profile->state)>{{$st->name}}</option>
                                                @endforeach
                                                @else
                                                <option value="" selected disabled>--Select State--</option>
                                                @endisset

                                            </select>
                                            <label>State</label>
                                        </div>
                                        <div class="col s12 input-field">
                                            <select class="select2 browser-default" id="city" name="city">
                                                @isset($user->admin_profile)
                                                @foreach (Helper::getCitiesByState($user->admin_profile->state) as $city)
                                                    <option value="{{$city->id}}" @selected($city->id==$user->admin_profile->city)>{{$city->name}}</option>
                                                @endforeach
                                                @else
                                                <option value="" selected disabled>--Select City--</option>
                                                @endisset
                                            </select>
                                            <label>City</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12">
                                            <h6 class="mb-4"><i class="material-icons mr-1">person_outline</i>Personal
                                                Info</h6>
                                        </div>
                                        <div class="col s12 input-field">
                                            <input id="datepicker" name="dob" type="text" class="birthdate-picker datepicker" value="{{ $user->admin_profile->dob ?? '' }}" placeholder="Pick a birthday"
                                                data-error=".errorTxt4">
                                            <label for="datepicker">Birth date</label>
                                            <small class="errorTxt4"></small>
                                        </div>

                                        <div class="col s12 input-field">
                                            <select class="select2 browser-default" name="timezone" id="timezone">
                                              @isset($user->admin_profile)
                                                @foreach ($timezones as $timezone)
                                                    <option value="{{ $timezone->id }}" @selected($timezone->id==$user->admin_profile->timezone)>{{ $timezone->timezone ?? '' }}
                                                    </option>
                                                @endforeach
                                                @else
                                                <option value="" selected disabled>--Select Timezone--</option>
                                                @endisset
                                            </select>
                                            <label>Timezone</label>
                                        </div>

                                        <div class="col s12 input-field">
                                            <input id="address" name="address" type="text" value="{{ $user->admin_profile->address ?? '' }}" class="validate"
                                                data-error=".errorTxt5">
                                            <label for="address">Address</label>
                                            <small class="errorTxt5"></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col s-12">
                            <div class="col s12 display-flex justify-content-end mt-5">
                                <input type="submit" class="btn indigo" value="Save changes" />
                            </div>
                        </div>
                    </div>
                </form>
                <!-- users edit Info form ends -->
            </div>
        </div>
        <!-- </div> -->
    </div>
    </div>
    </div>
@endsection
@section('script-area')

    <script src="{{ asset('app-assets/js/scripts/form-file-uploads.js') }}"></script>
    <script>
        document.getElementById('buttonid').addEventListener('click', openDialog);

        function openDialog() {
        document.getElementById('fileid').click();
        }
    </script>
@endsection
