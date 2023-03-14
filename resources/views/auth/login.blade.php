@extends('layout.auth')
@section('title','Login')
@section('content-area')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div id="" class="row" >
    <div class="col s12 m6 l8 " id="login-page" >
        <img src="{{asset('app-assets/images/sgt/login.png')}}" alt="" class="responsive-img">
    </div>
    <div class="col s12 m6 l4  border-radius-6  bg-opacity-8" style="height: 100vh; position:relative;">
       
    <div style="width:90%;position:absolute;top:15%;">

            <form  method="post" action="{{route('auth.'.$guard.'-login')}}">
                <div class="row" style="margin-bottom:20%;">
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
                <div class="row margin" style="margin-top:-50px !important;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="username" type="text" name="username">
                        <label for="username" class="center-align">Email Address</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        
<input type="password" id="password" name="password"/>


                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="    margin-top: -37px;
    margin-left: 89%;"></span>


                      
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

                        
                         <p style="float:right; margin-top: -9%;">
                            <label>
                                
                                <a href="#">Forgot Password?</a>
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

<script>

$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

})

    </script>

@endsection