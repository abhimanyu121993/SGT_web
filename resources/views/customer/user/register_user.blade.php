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
                    action="{{ isset($user) ? route(Session::get('guard').'.user.update', $user->id) : route(Session::get('guard').'.user.store') }}"
                    method="POST" enctype="multipart/form-data">
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
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="fname" name="fname"
                                    value="{{ isset($user) ? $user->first_name : '' }}"
                                    placeholder="First Name">
                                <label class="active" for="name">{{__('user.fname')}}</label>

                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="lname" name="lname"
                                    value="{{ isset($user) ? $user->last_name : '' }}"
                                    placeholder="Last Name">
                                <label class="active" for="lname">{{__('user.lname')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ isset($user) ? $user->email : '' }}"
                                    placeholder="Email">
                                <label class="active" for="email">{{__('user.email')}}</label>

                            </div>
                            @if(!isset($user))             
                            <div class="input-group col s4">
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ isset($user) ? $user->password : '' }}"
                                    placeholder="password">
                                <label class="active" for="password">{{__('user.password')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="cpassword" name="cpassword"
                                    value="{{ isset($user) ? $user->password : '' }}"
                                    placeholder="Confirm Password">
                                <label class="active" for="cpassword">{{__('user.cpassword')}}</label>
                            </div>
                            @endif
                            <div class="input-field col s4">
                                        <select class="select2-theme browser-default" id="select2-theme" name="role_id">
                                          @foreach ($roles as $role)
                                              <option value="{{$role->id}}"@isset($user)@selected($user->roles->first()->name==$role->name) @endisset>{{$role->role_name}}</option>
                                          @endforeach
                                        </select>
                                <span class="active" for="cpassword">{{__('user.role')}}</span>

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