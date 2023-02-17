@extends('layout.auth')
@section('title','Login')
@section('content-area')
<div id="" class="row" >
    <div class="col s12 m6 l8 " id="login-page" >
        <img src="{{asset('app-assets/images/sgt/login.png')}}" alt="" class="responsive-img">
    </div>
    <div class="col s12 m6 l4  border-radius-6  bg-opacity-8" style="height: 100vh; position:relative;">
       
    <div style="width:90%;position:absolute;top:15%;">
            <form  method="post" action="{{route('auth.'.$guard.'-login')}}">
                <div class="row">
                    <div class="input-field col s12 center-align">
                        <img src="{{asset('app-assets/images/sgt/logo.png')}}" alt="" class="" style="height:60px">
                        
                    </div>
                </div>
                <h5 class="ml-4">{{__('auth.welcome_sgt')}}</h5>
                <p class="ml-4">{{__('auth.please_signing')}} 
                    @if($guard=='customer')
                    <span class="chip gradient-45deg-purple-amber " style="color:#ffff">{{__('auth.customer')}}</span>
                    @else
                    <span class="chip gradient-45deg-purple-amber " style="color:#ffff">{{__('auth.admin')}}</span>
                    @endif
                </p>
                    @csrf
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="username" type="text" name="username">
                        <label for="username" class="center-align">Username</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-1">
                        <p>
                            <label>
                                <input type="checkbox"  name="remember"/>
                                <span>Remember Me</span>
                            </label>
                        </p>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit"
                            class="btn waves-effect waves-light border-round gradient-45deg-indigo-light-blue col s12">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        @if($guard=='customer')
                        <p class="margin medium-small"><a href="{{route('auth.admin')}}">Admin Login</a></p>
                        @else
                        <p class="margin medium-small"><a href="{{route('auth.customer')}}">Customer Login</a></p>
                        @endif
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a
                                href="user-forgot-password.html">Forgot password ?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection