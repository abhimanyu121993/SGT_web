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
</aside>
