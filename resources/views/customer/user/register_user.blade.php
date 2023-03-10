@extends('layout.panel')
@section('title', 'Staff')
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
                <form
                    action="{{ isset($customer) ? route(Session::get('guard').'.user.update', $customer->id) : route(Session::get('guard').'.user.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($customer))
                    @method('patch')
                    @endif
                   
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                        
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="fname" name="first_name"
                                    value="{{ isset($customer) ? $customer->first_name : old('first_name') }}"
                                   >
                                <label class="active" for="name">{{__('user.fname')}}</label>

                            </div>
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="lname" name="last_name"
                                    value="{{ isset($customer) ? $customer->last_name : old('last_name') }}"
                                    >
                                <label class="active" for="lname">{{__('user.lname')}}</label>
                            </div>
                            <div class="input-field col s4">
                                <select id="gender" name="gender">
                                @if(!isset($customer))
                                    <option selected disabled>--Select Gender--</option>
                                    @endif                                 
                                    <option value="M" @isset($customer) @selected($customer->gender=='M') @else @selected(old('gender')=='M') @endisset>Male</option>
                                    <option value="F" @isset($customer) @selected($customer->gender=='F') @else @selected(old('gender')=='F') @endisset >Female</option>
                                    <option value="O" @isset($customer) @selected($customer->gender=='O') @else @selected(old('gender')=='O') @endisset>Other</option>
                                </select>
                                <span class="active" for="gender">{{__('security_guard.gender')}}</span>
                            </div>
                            <div class="input-field col s4">
                                <label class="active" for="dob">{{__('user.dob')}}</label>
                                <input   type="text" class="datepicker form-control" id="dob" name="dob" value="{{ isset($customer) ? $customer->dob : '' }}">
                            </div>
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ isset($customer) ? $customer->email : old('email') }}"
                                    >
                                <label class="active" for="email">{{__('user.email')}}</label>

                            </div>
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="{{ isset($customer) ? ($customer->user_detail->mobileno??'') : old('mobile') }}"
                                    >
                                <label class="active" for="mobile">{{__('user.mobile')}}</label>

                            </div>
                            @if(!isset($customer))             
                            <div class="input-field col s4">
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ isset($customer) ? $customer->password : '' }}"
                                    >
                                <label class="active" for="password">{{__('user.password')}}</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="cpassword" name="cpassword"
                                    value="{{ isset($customer) ? $customer->password : '' }}"
                                   >
                                <label class="active" for="cpassword">{{__('user.cpassword')}}</label>
                            </div>
                            @endif
                            <div class="input-field col s4">
                                        <select class="select2-theme browser-default" id="select2-theme" name="role_id">
                                          @foreach ($roles as $role)
                                              <option value="{{$role->id}}"@isset($customer)@selected($customer->roles->first()->name==$role->name) @endisset>{{Helper::role_name($role->name)}}</option>
                                          @endforeach
                                        </select>
                                <span class="active" for="cpassword">{{__('user.role')}}</span>

                                      </div>
                                </div>
                            <div class="row col s12 mt-2">
                                <div class="input-field col s4">
                                    <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($customer) ? 'Update' : 'Submit' }}</button>
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