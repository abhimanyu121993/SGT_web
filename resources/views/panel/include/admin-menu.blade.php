<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
data-menu="menu-navigation" data-collapsible="menu-accordion">
<li class=" {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }} bold">
    <a class="waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }}"
        href="{{ route(Session::get('guard') . '.dashboard') }}">
        <i class="material-icons">settings_input_svideo</i><span class="menu-title"
            data-i18n="Pages">{{ __('sidebar.dashboard') }}</span>
    </a>
</li>
<li class=" {{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'active open' : '' }} bold ">
    <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'active' : '' }} "
        href="JavaScript:void(0)"><i class="material-icons">lock_open</i><span class="menu-title"
            data-i18n="Authentication">{{ __('sidebar.role_permission') }} </span></a>
    <div class="collapsible-body"
        style="{{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'display:block' : '' }}">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li
                class="{{ strpos(Route::currentRouteName(), 'role-permission.role') !== false ? 'active' : '' }}  bold">
                <a href="{{ route(Session::get('guard') . '.role-permission.role.index') }}"><i
                        class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                        data-i18n="Login">{{ __('sidebar.role') }}</span></a>
            </li>
            <li
                class="{{ strpos(Route::currentRouteName(), 'role-permission.permission') !== false ? 'active' : '' }} bold">
                <a href="{{ route(Session::get('guard') . '.role-permission.permission.index') }}"><i
                        class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                        data-i18n="Register">{{ __('sidebar.permission') }}</span></a>
            </li>
            @if (Auth::guard('admin')->user()->hasPermissionTo('permission_read', 'admin') )
                <li
                    class="{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.role-has-permission') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Register">{{ __('sidebar.role-has-permission') }}</span></a>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->hasPermissionTo('customer-has-permission', 'admin'))
                <li
                    class="{{ strpos(Route::currentRouteName(), 'role-permission.customer-has-permission') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.customer-has-permission') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.customer-has-permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Register">{{ __('sidebar.customer-has-permission') }}</span></a>
                </li>
            @endif
        </ul>
       
    </div>
</li>

</ul>
<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"  data-menu="menu-navigation" data-collapsible="menu-accordion">
    <li class=" {{(strpos(Route::currentRouteName(),'dashboard')!==false)?'active':''}} bold">
        <a class="waves-effect waves-cyan {{(strpos(Route::currentRouteName(),'dashboard')!==false)?'active':''}}" href="{{route(Session::get('guard').'.dashboard')}}">
            <i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Pages">{{__('sidebar.dashboard')}}</span>
        </a>
    </li>
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
    <li class=" {{(strpos(Route::currentRouteName(),'subscription')!==false)?'active open':''}} bold ">
        <a class="collapsible-header waves-effect waves-cyan {{(strpos(Route::currentRouteName(),'subscription')!==false)?'active':''}} " href="JavaScript:void(0)"><i class="material-icons">lock_open</i><span class="menu-title" data-i18n="Authentication">{{__('sidebar.subscription')}} </span></a>
        <div class="collapsible-body" style="{{(strpos(Route::currentRouteName(),'subscription')!==false)?'display:block':''}}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="{{(strpos(Route::currentRouteName(),'subscription.create')!==false)?'active':''}}  bold"><a href="{{ route(Session::get('guard').'.subscription.subscription.index') }}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'subscription.index')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Login">{{__('sidebar.create')}}</span></a>
              </li>
              <li class="{{(strpos(Route::currentRouteName(),'subscription.manage')!==false)?'active':''}} bold"><a href="{{route(Session::get('guard').'.subscription.subscription.create')}}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'subscription.create')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Register">{{__('sidebar.manage')}}</span></a>
            </ul>
        </div>
    </li>
    <li class=" {{(strpos(Route::currentRouteName(),'user')!==false)?'active open':''}} bold ">
        <a class="collapsible-header waves-effect waves-cyan {{(strpos(Route::currentRouteName(),'user')!==false)?'active':''}} " href="JavaScript:void(0)"><i class="material-icons">lock_user</i><span class="menu-title" data-i18n="Authentication">{{__('sidebar.user')}} </span></a>
        <div class="collapsible-body" style="{{(strpos(Route::currentRouteName(),'user')!==false)?'display:block':''}}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="{{(strpos(Route::currentRouteName(),'user.create')!==false)?'active':''}}  bold"><a href="{{ route(Session::get('guard').'.user.user.index') }}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'user.index')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Login">{{__('sidebar.create')}}</span></a>
              </li>
              <li class="{{(strpos(Route::currentRouteName(),'user.manage')!==false)?'active':''}} bold"><a href="{{route(Session::get('guard').'.user.user.create')}}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),'user.create')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Register">{{__('sidebar.manage')}}</span></a>
            </ul>
        </div>
    </li>
    <li class=" {{(strpos(Route::currentRouteName(),Session::get('guard').'.customer')!==false)?'active open':''}} bold ">
        <a class="collapsible-header waves-effect waves-cyan {{(strpos(Route::currentRouteName(),Session::get('guard').'.customer')!==false)?'active':''}} " href="JavaScript:void(0)"><i class="material-icons">people</i><span class="menu-title" data-i18n="Authentication">{{__('sidebar.customer')}} </span></a>
        <div class="collapsible-body" style="{{(strpos(Route::currentRouteName(),'customer')!==false)?'display:block':''}}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="{{(strpos(Route::currentRouteName(),Session::get('guard').'.customer.create')!==false)?'active':''}}  bold"><a href="{{ route(Session::get('guard').'.customer.create') }}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),Session::get('guard').'.customer.create')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Register Customer">{{__('sidebar.register_customer')}}</span></a>
              </li>
              <li class="{{(strpos(Route::currentRouteName(),'admin.customer.index')!==false)?'active':''}} bold"><a href="{{route(Session::get('guard').'.customer.index')}}" ><i class="material-icons">{{(strpos(Route::currentRouteName(),Session::get('guard').'.customer.index')!==false)?'radio_button_checked':'radio_button_unchecked'}}</i><span data-i18n="Manage">{{__('sidebar.manage_customer')}}</span></a>
              </li>
            </ul>
        </div>
    </li>
</ul>