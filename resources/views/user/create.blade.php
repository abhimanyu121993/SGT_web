@extends('layout.panel')
@section('title', 'User')
@section('breadcrumb-title', 'User')
@section('breadcrumb-backpage', 'User')
@section('breadcrumb-currentpage', 'User')
@section('content-area')

<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form
                    action="{{ isset($EditUser) ? route(Session::get('guard').'.user.update', $EditUser->id) : route(Session::get('guard').'.user.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($EditUser))
                    @method('patch')
                    @endif
                  
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="fname" name="fname"
                                    value="{{ isset($EditUser) ? $EditUser->name : '' }}"
                                    placeholder="First Name">
                                <label class="active" for="name">{{__('user.fname')}}</label>

                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="lname" name="lname"
                                    value="{{ isset($EditUser) ? $EditUser->lname : '' }}"
                                    placeholder="Last Name">
                                <label class="active" for="lname">{{__('user.lname')}}</label>

                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ isset($EditUser) ? $EditUser->email : '' }}"
                                    placeholder="Email">
                                <label class="active" for="email">{{__('user.email')}}</label>

                            </div>                           
                            <div class="input-group col s4">
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ isset($EditUser) ? $EditUser->password : '' }}"
                                    placeholder="password">
                                <label class="active" for="password">{{__('user.password')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="password" class="form-control" id="cpassword" name="cpassword"
                                    value="{{ isset($EditUser) ? $EditUser->password : '' }}"
                                    placeholder="cpassword">
                                <label class="active" for="cpassword">{{__('user.cpassword')}}</label>
                            </div>
                           
                                </div>

                            </div>
                            <div class="row col s12 mt-2">
                                <div class="input-group col s4">
                                    <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($EditUser) ? 'Update' : 'Submit' }}</button>
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