@extends('layout.auth')
@section('title','Lock Screen')
@section('content-area')
  
        <div id="lock-screen" class="row">
            <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 forgot-card bg-opacity-8">
                <form class="login-form" method="post" action="{{route('auth.'.Session::get('guard').'-login')}}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12 center-align mt-10">
                            <img class="z-depth-4 circle responsive-img" width="100"
                                src="../../../app-assets/images/user/4.jpg" alt="">
                            <h5>{{Session::get('user')->name}}</h5>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">lock_outline</i>
                            <input type="hidden" name="username" value="{{Session::get('user')->email}}">
                            <input id="password" type="password" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button  class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="user-register.html">Register Now!</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password
                                    ?</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
