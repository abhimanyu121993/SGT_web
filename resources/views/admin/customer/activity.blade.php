@extends('layout.panel')
@section('title', 'Customer Activity')
@section('breadcrumb')

@endsection
@section('content-area')
    <div class="row mt-3">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="">
                        <h5>Activity log</h5>
                        <div id="profile-card" class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="../../../app-assets/images/avatar/avatar-7.png" alt="user bg" />
                            </div>
                            <div class="card-content">


                                <img src="../../../app-assets/images/avatar/avatar-7.png" alt=""
                                    class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2" />
                                <a
                                    class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                                    <i class="material-icons">edit</i>
                                </a>
                                <h5 class="card-title activator grey-text text-darken-4">Andrew Franklin Dube</h5>
                                <p><span>IP Address</span>168.225.1651</p>
                                <p><span>Device Type</span>Android</p>
                                <p><span>Email</span> yourmail@domain.com</p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Andrew Franklin Dube<i
                                        class="material-icons right">close</i>
                                </span>
                                <div class="row">
                                    <div class="col s4">
                                        <p>IP Address</p>
                                    </div>
                                    <div class="col s4">
                                        <p>168.225.1651</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <p>DeviceType</p>
                                    </div>
                                    <div class="col s4">
                                        <p>Android</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <p>DeviceType</p>
                                    </div>
                                    <div class="col s4">
                                        <p>Nougat.7.02</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <p>Email</p>
                                    </div>
                                    <div class="col s4">
                                        <p> yourmail@domain.com</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <p>Date</p>
                                    </div>
                                    <div class="col s4">
                                        <p> 10 feb 2023</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <p>Time</p>
                                    </div>
                                    <div class="col s4">
                                        <p> 10 :00pm</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-area')

@endsection
