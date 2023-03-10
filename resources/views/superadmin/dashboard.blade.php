@extends('layout.panel')
@section('title','Dashboard')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Dashboard</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard
                    </li>
                </ol>
            </div>
            <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Settings</span><i class="material-icons right">arrow_drop_down</i></a>
                <ul class="dropdown-content" id="dropdown1" tabindex="0">
                    <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span class="new badge red">2</span></a></li>
                    <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
                    <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li tabindex="0"><a class="grey-text text-darken-2" href="user-login.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content-area')
<div class="section">
    <div class="card">
        <div class="card-content">
            <p class="caption mb-0">
                Sample blank page for getting start!! Created and designed by Google, Material
                Design is a design
                language that combines the classic principles of successful design along with
                innovation and
                technology.
            </p>
        </div>
    </div>
</div><!-- START RIGHT SIDEBAR NAV -->
@endsection