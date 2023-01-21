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
                <li
                    class="{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'active' : '' }} bold">
                    <a href="{{ route(Session::get('guard') . '.role-permission.role-has-permission') }}"><i
                            class="material-icons">{{ strpos(Route::currentRouteName(), 'role-permission.role-has-permission') !== false ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span
                            data-i18n="Register">{{ __('sidebar.role-has-permission') }}</span></a>
                </li>
              

            </ul>
        </div>
    </li>

</ul>
