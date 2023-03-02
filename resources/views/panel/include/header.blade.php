
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-blue no-shadow">
            <div class="nav-wrapper">
                <!-- <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                    <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize" data-search="template-list">
                    <ul class="search-list collection display-none"></ul>
                </div> -->
                <ul class="navbar-list right">
                    {{-- <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li> --}}
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                    <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                    <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">{{ Auth::guard(Helper::getGuard())->user()->unreadNotifications->count() }}</small></i></a></li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{ asset('storage/'.Auth::guard(Helper::getGuard())->user()->user_detail->pic) }}" onerror="this.noerror=null;this.src='{{asset("app-assets/images/avatar/avatar-7.png")}}'" alt="avatar"><i></i></span></a></li>
                    <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
                </ul>
                <!-- translation-button-->
                {{-- <ul class="dropdown-content" id="translation-dropdown">
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="en"><i class="flag-icon flag-icon-gb"></i> English</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a></li>
                </ul> --}}
                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>NOTIFICATIONS<span class="new badge">{{ Auth::guard(Helper::getGuard())->user()->unreadNotifications->count() }}</span></h6>
                    </li>
                    <li class="divider"></li>
                    @foreach (Auth::guard(Helper::getGuard())->user()->unreadNotifications as $unreadnoti)
                    <li><a class="black-text" href="#!">{!!$unreadnoti->data['icon']!!} </a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">{{$unreadnoti->created_at->DiffForHumans()}}</time>
                    </li>
                    @endforeach


                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="{{ route(Session::get('guard').'.profile.edit', Auth::guard(Session::get('guard'))->user()->id ?? '') }}"><i class="material-icons">person_outline</i> Profile</a></li>
                    <li class="divider"></li>
                    <li><a class="grey-text text-darken-1" id="change_password_modal" href="#" data-url="{{route('auth.update-password', Auth::guard(Session::get('guard'))->user()->id) }}"><i class="material-icons ">lock_outline</i> Change Password</a></li>
                    <li><a class="grey-text text-darken-1" href="#"><i class="material-icons">lock_outline</i> Activity</a></li>
                    <li><a class="grey-text text-darken-1" href="{{route('auth.lock')}}"><i class="material-icons">lock_outline</i> Lock</a></li>
                    <li><a class="grey-text text-darken-1" href="{{route('auth.logout')}}"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                </ul>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                            <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>
