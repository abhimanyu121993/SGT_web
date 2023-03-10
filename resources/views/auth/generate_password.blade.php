@extends('layout.auth')
@section('title','Password')
@section('content-area')
<div id="" class="row" >
    <div class="col s12 m6 l8 " id="login-page" >
        <img src="{{asset('app-assets/images/sgt/login.png')}}" alt="" class="responsive-img">
    </div>
    <div class="col s12 m6 l4  border-radius-6  bg-opacity-8" style="height: 100vh; position:relative;">
       
    <div style="width:90%;position:absolute;top:15%;">
            <form  method="post" action="{{$return}}">
                <div class="row">
                    <div class="input-field col s12 center-align">
                        <img src="{{asset('app-assets/images/sgt/logo.png')}}" alt="" class="" style="height:60px">
                        
                    </div>
                </div>
                <h5 class="ml-4">{{__('auth.welcome_sgt')}}</h5>
                <p class="ml-4">{{__('auth.please_signing')}} 
                </p>
                    @csrf
                    {{-- <a href="{{route('auth.customer')}}" class="btn ml-4 {{$guard=='customer'?'theme-active':'theme-text'}}" >{{__('auth.customer')}}</a>
                    <a  href="{{route('auth.admin')}}" class="btn ml-4 {{$guard=='admin'?'theme-active':'theme-text'}}" >{{__('auth.admin')}}</a> --}}
                    <br><br>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password" name="password">
                       
                        <label for="password">{{ __('auth.password') }}</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="cnpassword" type="password" name="cnpassword">
                       
                        <label for="cnpassword">{{ __('auth.confirm_password') }}</label>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="col s12 m12 l12 ml-2 mt-1">
                        <p>
                            <label>
                                <input type="checkbox"  name="remember"/>
                                <span>{{ __('auth.remember') }}</span>
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
                        <p class="margin  medium-small"><a
                                href="user-forgot-password.html">Forgot password ?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection