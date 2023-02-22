@extends('layout.panel')
@section('title', 'User')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Staff</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Staff</a>
                    </li>
                    <li class="breadcrumb-item active">Add Staff
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content-area')


<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form action="{{ isset($user) ? route(Session::get('guard').'.user.update', $user->id) : route(Session::get('guard').'.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($user))
                    @method('patch')
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-field col s4">
                                <label class="active" for="name">{{__('user.fname')}}</label>
                                <input type="text" class="form-control" id="fname" name="first_name" value="{{ isset($user) ? $user->first_name : '' }}">
                            </div>
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="lname" name="last_name" value="{{ isset($user) ? $user->last_name : '' }}">
                                <label class="active" for="lname">{{__('user.lname')}}</label>
                            </div>
                            <div class="input-field col s4">
                                <select class="" id="gender" name="gender">
                                    @if(!isset($user))
                                    <option selected disabled>--Select Gender--</option>
                                    @endif
                                    <option value="M" @isset($user) @selected($user->gender=='M') @else @selected(old('gender')=='M') @endisset>Male</option>
                                    <option value="F" @isset($user) @selected($user->gender=='F') @else @selected(old('gender')=='F') @endisset >Female</option>
                                    <option value="O" @isset($user) @selected($user->gender=='O') @else @selected(old('gender')=='O') @endisset>Other</option>
                                </select>
                            </div>
                            <div class="input-field col s4">
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ isset($user) ? $user->dob : '' }}">
                                <label class="active" for="dob">{{__('user.dob')}}</label>
                            </div>
                            <div class="input-field col s4">
                                <label class="active" for="email">{{__('user.email')}}</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
                            </div>

                            <div class="input-field col s4">
                                <label class="active" for="mobile">{{__('user.mobile')}}</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ isset($user) ? ($user->user_detail->mobileno??'') : '' }}">


                            </div>
                            @if(!isset($user))
                            <div class="input-field col s4">
                                <input type="password" class="form-control" id="password" name="password" value="{{ isset($user) ? $user->password : '' }}">
                                <label class="active" for="password">{{__('user.password')}}</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="cpassword" name="cpassword" value="{{ isset($user) ? $user->password : '' }}">
                                <label class="active" for="cpassword">{{__('user.cpassword')}}</label>
                            </div>
                            @endif
                            <div class="input-field col s4">
                                <span class="active" for="cpassword">{{__('user.role')}}</span>
                                <select class="select2-theme browser-default" id="select2-theme" name="role_id">
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}" @isset($user)@selected($user->roles->first()->name==$role->name) @endisset>{{Helper::role_name($role->name)}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="row col s12 mt-2">
                            <div class="input-group col s4">
                                <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($user) ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>

                    <!--end col-->
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