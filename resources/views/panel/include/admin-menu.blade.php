<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
    <li class=" {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }} bold">
        <a class="waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }}" href="{{ route(Session::get('guard') . '.dashboard') }}">
            <i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="1">{{ __('sidebar.dashboard') }}</span>
        </a>
    </li>
    @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('role', Session::get('guard')) ||
    Auth::guard(Session::get('guard'))->user()->hasPermissionTo('permission', Session::get('guard')))
    <li class=" {{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'active open' : '' }} bold ">
        <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'active' : '' }} " href="JavaScript:void(0)"><i class="material-icons">lock_open</i><span class="menu-title" data-i18n="2">{{ __('sidebar.role_permission') }} </span></a>
        <div class="collapsible-body" style="{{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'display:block' : '' }}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('role_read', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), 'role-permission.role') !== false ? 'active' : '' }}  bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.role.index') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="3">{{ __('sidebar.role') }}</span></a>
                </li>
                @endif
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('permission_read', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), 'role-permission.permission') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.permission.index') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="4">{{ __('sidebar.permission') }}</span></a>
                </li>
                @endif
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('permission_edit', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.role-has-permission') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="5">{{ __('sidebar.role-has-permission') }}</span></a>
                </li>
                @endif
            </ul>
        </div>
    </li>


    @endif
    @if(Auth::guard('admin'))
    @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('subscription', Session::get('guard')))
    <li class=" {{ strpos(Route::currentRouteName(), 'subscription') !== false ? 'active open' : '' }} bold ">
        <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'subscription') !== false ? 'active' : '' }} " href="JavaScript:void(0)"><i class="material-icons">subscriptions</i><span class="menu-title" data-i18n="6">{{ __('sidebar.subscription') }} </span></a>
        <div class="collapsible-body" style="{{ strpos(Route::currentRouteName(), 'subscription') !== false ? 'display:block' : '' }}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('subscription_create', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), 'subscription.index') !== false ? 'active' : '' }}  bold">
                    <a href="{{ route(Session::get('guard') . '.subscription.index') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), 'subscription.index') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="7">{{ __('sidebar.create') }}</span></a>
                </li>
                @endif

                @if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('subscription_read',Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), 'subscription.create') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.subscription.create') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), 'subscription.create') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i>
                        <span data-i18n="8">{{ __('sidebar.manage') }}</span></a>
                </li>
                @endif
            </ul>
        </div>
    </li>
    @endif
    @endif
    @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user', Session::get('guard')))
    <li class=" {{ strpos(Route::currentRouteName(),  Session::get('guard').'.user') !== false ? 'active open' : '' }} bold ">
        <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), Session::get('guard') .'.user') !== false ? 'active' : '' }} " href="JavaScript:void(0)"><i class="material-icons">person</i><span class="menu-title" data-i18n="Authentication">{{ __('sidebar.staff') }} </span></a>
        <div class="collapsible-body" style="{{ strpos(Route::currentRouteName(),  Session::get('guard') .'.user') !== false ? 'display:block' : '' }}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_create', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(),  Session::get('guard') .'.user.index') !== false ? 'active' : '' }}  bold"><a href="{{ route(Session::get('guard') .'.user.index') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), Session::get('guard') .'.user.index') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="create user">{{ __('sidebar.add_staff') }}</span></a>
                </li>
                @endif
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_read', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), Session::get('guard') .'.user.create') !== false ? 'active' : '' }} bold"><a href="{{ route(Session::get('guard') .'.user.create') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(),Session::get('guard').'.user.create') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="Manage User">{{ __('sidebar.manage_staff') }}</span></a>
                </li>
                @endif
            </ul>
        </div>
    </li>
    @endif


    @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('customer', Session::get('guard')))
    <li class=" {{ strpos(Route::currentRouteName(), Session::get('guard') . '.customer') !== false ? 'active open' : '' }} bold ">

       


        <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), Session::get('guard') . '.customer') !== false ? 'active' : '' }} " href="JavaScript:void(0)"><i class="material-icons">people</i><span class="menu-title" data-i18n="12">{{ __('sidebar.customer') }} </span></a>
        <div class="collapsible-body" style="{{ strpos(Route::currentRouteName(), 'customer') !== false ? 'display:block' : '' }}">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_create', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), Session::get('guard') . '.customer.create') !== false ? 'active' : '' }}  bold">
                    <a href="{{ route(Session::get('guard') . '.customer.create') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), Session::get('guard') . '.customer.create') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="13 Customer">{{ __('sidebar.register_customer') }}</span></a>
                </li>
                @endif
                @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_read', Session::get('guard')))
                <li class="{{ strpos(Route::currentRouteName(), 'admin.customer.index') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.customer.index') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), Session::get('guard') . '.customer.index') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span data-i18n="14">{{ __('sidebar.manage_customer') }}</span></a>
                </li>
                @endif

            </ul>
        </div>
    </li>
    @endif
    <li class=" {{ strpos(Route::currentRouteName(), 'leave-management') !== false ? 'active open' : '' }} bold ">
        <a class="waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'leave-management') !== false ? 'active' : '' }} " href="{{ route(Session::get('guard') . '.leave-management.index') }}"><i class="material-icons">people</i><span class="menu-title">{{ __('leave.leave_management') }}</span></a>
    </li>

    <li class=" {{ strpos(Route::currentRouteName(), 'leave.create') !== false ? 'active open' : '' }} bold ">
        <a class="waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'leave.create') !== false ? 'active' : '' }} " href="{{ route(Session::get('guard') . '.leave.create') }}"><i class="material-icons">people</i><span class="menu-title">{{ __('leave.staff_leave_request') }}</span></a>
    </li>

</ul>