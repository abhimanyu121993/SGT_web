<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="#"><img class="hide-on-med-and-down"
                    src="{{ asset('app-assets/images/logo/sgtlogo.jpeg') }}" alt="materialize logo" />
                <img class="show-on-medium-and-down hide-on-med-and-up"
                    src="{{ asset('app-assets/images/logo/sgtlogo.jpeg') }}" alt="materialize logo" />
                {{-- <span class="logo-text hide-on-med-and-down"></span></a> --}}
                <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
        </h1>
    </div>
    @if(Auth::guard('superadmin')->check())
    @include('panel.include.superadmin-menu')
    @elseif(Auth::guard('admin')->check())
    @include('panel.include.admin-menu')
    @elseif(Auth::guard('customer')->check())
    @include('panel.include.customer-menu')
    @endif
    <div class="navigation-background"></div><a
        class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
        href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"  data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class=" {{(strpos(Route::currentRouteName(),'dashboard')!==false)?'active':''}} bold">
            <a class="waves-effect waves-cyan {{(strpos(Route::currentRouteName(),'dashboard')!==false)?'active':''}}" href="{{route(Session::get('guard').'.dashboard')}}">
                <i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Pages">{{__('sidebar.dashboard')}}</span>
            </a>
        </li>

        {{-- Role & Permission Menu --}}
        <li class=" {{(strpos(Route::currentRouteName(),'role-permission')!==false)?'active open':''}} bold ">
            <a class="collapsible-header waves-effect waves-cyan {{(strpos(Route::currentRouteName(),'role-permission')!==false)?'active':''}} " href="JavaScript:void(0)"><i class="material-icons">lock_open</i><span class="menu-title" data-i18n="Authentication">{{__('sidebar.role_permission')}} </span></a>
            <div class="collapsible-body" style="{{(strpos(Route::currentRouteName(),'role-permission')!==false)?'display:block':''}}">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                  <li class="{{(strpos(Route::currentRouteName(),'role-permission.role')!==false)?'active':''}}  bold"><a href="{{ route(Session::get('guard').'.role-permission.role.index') }}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'role-permission.role')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Login">{{__('sidebar.role')}}</span></a>
                  </li>
                  <li class="{{(strpos(Route::currentRouteName(),'role-permission.permission')!==false)?'active':''}} bold"><a href="{{route(Session::get('guard').'.role-permission.permission.index')}}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'role-permission.permission')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Register">{{__('sidebar.permission')}}</span></a>
                  </li>
                  <li class="{{(strpos(Route::currentRouteName(),'role-permission.role-has-permission')!==false)?'active':''}} bold"><a href="{{route(Session::get('guard').'.role-permission.role-has-permission')}}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'role-permission.role-has-permission')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Register">{{__('sidebar.role-has-permission')}}</span></a>
                  </li>
                </ul>
            </div>
        </li>
        {{-- End Role & Permission Menu --}}

        {{-- Customer Menu--}}
        <li class=" {{(strpos(Route::currentRouteName(),'customer')!==false)?'active open':''}} bold ">
            <a class="collapsible-header waves-effect waves-cyan {{(strpos(Route::currentRouteName(),'customer')!==false)?'active':''}} " href="JavaScript:void(0)"><i class="material-icons">people</i><span class="menu-title" data-i18n="Authentication">{{__('sidebar.customer')}} </span></a>
            <div class="collapsible-body" style="{{(strpos(Route::currentRouteName(),'customer')!==false)?'display:block':''}}">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                  <li class="{{(strpos(Route::currentRouteName(),'customer.create')!==false)?'active':''}}  bold"><a href="{{ route(Session::get('guard').'.customer.create') }}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'customer')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Register Customer">{{__('sidebar.register_customer')}}</span></a>
                  </li>
                  <li class="{{(strpos(Route::currentRouteName(),'customer.index')!==false)?'active':''}} bold"><a href="{{route(Session::get('guard').'.customer.index')}}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'customer')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Manage">{{__('sidebar.manage_customer')}}</span></a>
                  </li>
                </ul>
            </div>
        </li>
        {{-- End Customer Menu --}}

    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
