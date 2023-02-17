<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
data-menu="menu-navigation" data-collapsible="menu-accordion">
<li class=" {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }} bold">
    <a class="waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }}"
        href="{{ route(Session::get('guard') . '.dashboard') }}">
        <i class="material-icons">settings_input_svideo</i><span class="menu-title"
            data-i18n="Pages">{{ __('sidebar.dashboard') }}</span>
    </a>
</li>
@if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('role', Session::get('guard')))
<li class=" {{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'active open' : '' }} bold ">
    <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'active' : '' }} "
        href="JavaScript:void(0)"><i class="material-icons">lock_open</i><span class="menu-title"
            data-i18n="Authentication">{{ __('sidebar.role_permission') }} </span></a>
    <div class="collapsible-body"
        style="{{ strpos(Route::currentRouteName(), 'role-permission') !== false ? 'display:block' : '' }}">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('role', Session::get('guard')))
            <li class="{{ strpos(Route::currentRouteName(), 'role-permission.role') !== false ? 'active' : '' }}  bold">
                <a href="{{ route(Session::get('guard') . '.role-permission.role.index') }}"><i
                        class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                        data-i18n="Login">{{ __('sidebar.role') }}</span></a>
            </li>
            @endif
            @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('permission', Session::get('guard')))
            <li class="{{ strpos(Route::currentRouteName(), 'role-permission.permission') !== false ? 'active' : '' }} bold">
                <a href="{{ route(Session::get('guard') . '.role-permission.permission.index') }}"><i
                        class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                        data-i18n="Register">{{ __('sidebar.permission') }}</span></a>
            </li>
            @endif
            @if (Auth::guard('customer')->user()->hasPermissionTo('permission_edit', 'customer'))
                <li
                    class="{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.role-has-permission') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Register">{{ __('sidebar.role-has-permission') }}</span></a>
                </li>
            @endif
        </ul>
    </div>
</li>
@endif
{{-- Property Menu --}}
@if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('property', Session::get('guard')))
<li class=" {{ strpos(Route::currentRouteName(), 'property') !== false ? 'active open' : '' }} bold ">
    <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'property') !== false ? 'active' : '' }} "
        href="JavaScript:void(0)"><i class="material-icons">home</i><span class="menu-title"
            data-i18n="Authentication">{{ __('sidebar.property') }} </span></a>
    <div class="collapsible-body"
        style="{{ strpos(Route::currentRouteName(), 'property') !== false ? 'display:block' : '' }}">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('property_create', Session::get('guard')))
            <li class="{{ strpos(Route::currentRouteName(), 'property.create') !== false ? 'active' : '' }}  bold">
                <a href="{{ route(Session::get('guard') . '.property.create') }}"><i
                        class="material-icons">{{ strpos(Route::currentRouteName(), 'property.create') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                        data-i18n="Login">{{ __('sidebar.create') }}</span></a>
            </li>
            @endif
            @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('property_read', Session::get('guard')))
            <li class="{{ strpos(Route::currentRouteName(), 'property') !== false ? 'active' : '' }} bold">
                <a href="{{ route(Session::get('guard') . '.property.index') }}"><i class="material-icons">{{ strpos(Route::currentRouteName(), 'property.index') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i>
                    <span data-i18n="Register">{{ __('sidebar.manage') }}</span></a>
            </li>
            @endif
        </ul>
    </div>
</li>
@endif
{{-- User Menu --}}
@if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user', Session::get('guard')))
<li class=" {{ strpos(Route::currentRouteName(), 'user') !== false ? 'active open' : '' }} bold ">
    <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'user') !== false ? 'active' : '' }} "
        href="JavaScript:void(0)"><i class="material-icons">person</i><span class="menu-title"
            data-i18n="Authentication">{{ __('sidebar.staff') }} </span></a>
    <div class="collapsible-body"
        style="{{ strpos(Route::currentRouteName(), 'user') !== false ? 'display:block' : '' }}">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            @if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_create', Session::get('guard')))
            <li class="{{ strpos(Route::currentRouteName(), 'user') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.user.index') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'user.index') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Register">{{ __('sidebar.create') }}</span></a>
            </li>  
            @endif
            @if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_read', Session::get('guard')))
            <li class="{{ strpos(Route::currentRouteName(), 'user') !== false ? 'active' : '' }}  bold">
                    <a href="{{ route(Session::get('guard') . '.user.create') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'user.create') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Login">{{ __('sidebar.manage') }}</span></a>
            </li>
            @endif
            
        </ul>
    </div>
</li>
@endif

{{-- Security Guard Menu --}}

    @if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('task', Session::get('guard')))
<li class=" {{ strpos(Route::currentRouteName(), 'task') !== false ? 'active open' : '' }} bold ">
    <a class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'task') !== false ? 'active' : '' }} "
        href="JavaScript:void(0)"><i class="material-icons">today</i><span class="menu-title"
            data-i18n="Authentication">{{ __('sidebar.task') }} </span></a>
    <div class="collapsible-body"
        style="{{ strpos(Route::currentRouteName(), 'task') !== false ? 'display:block' : '' }}">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        @if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('task_create', Session::get('guard')))

            <li class="{{ strpos(Route::currentRouteName(), 'task') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.task.index') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'task.index') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Register">{{ __('sidebar.register_task') }}</span></a>
            </li>  
            @endif
            @if(Auth::guard(Session::get('guard'))->user()->hasPermissionTo('task_read', Session::get('guard')))

            <li class="{{ strpos(Route::currentRouteName(), 'task') !== false ? 'active' : '' }}  bold">
                    <a href="{{ route(Session::get('guard') . '.task.create') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'task.create') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Login">{{ __('sidebar.manage_task') }}</span></a>
            </li>
            @endif

        </ul>
    </div>
</li>
@endif
<li class=" {{ strpos(Route::currentRouteName(), 'secuirty-guard') !== false ? 'active open' : '' }} bold ">
    <a  class="collapsible-header waves-effect waves-cyan {{ strpos(Route::currentRouteName(), 'secuirty-guard') !== false ? 'active' : '' }} " href="{{ route(Session::get('guard') . '.secuirty-guard.create') }}"><i class="material-icons">people</i><span class="menu-title" data-i18n="File Manager">{{__('security_guard.security_guard')}}</span></a>

</ul>
