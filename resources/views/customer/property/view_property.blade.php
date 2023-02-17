@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb-title', 'Property')
@section('breadcrumb-backpage', 'Property')
@section('breadcrumb-currentpage', 'Manage Property')
@section('link-area')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-contacts.css">
@endsection
@section('content-area')
<div class="card-content">
    <div id="work-collections" class="seaction">
        <div class="row">
            <div class="col s12 m12 xl4">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Total Guards</span>
                        <p>
                            Guards in this property.
                        </p>
                        <span class="card-title">15</span>

                    </div>
                    <div class="card-action">
                        <div id="project-line-1"></div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 xl4">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Missed Shifts</span>
                        <p>
                            Shift missed in this property.
                        </p>
                        <span class="card-title">3</span>
                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 xl4">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Total Reports</span>
                        <p>
                            Incident Reported.
                        </p>
                        <span class="card-title">100</span>

                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-content">
    <div id="work-collections" class="seaction">
        <div class="row">
            <div class="col s12 m12 xl5">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Missed Shifts</span>
                        <p>
                            Shift missed in this property.
                        </p>
                        <span class="card-title">3</span>

                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 xl7">
                <div class="card">
                <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('property.guards_on_duty')}}</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('security_guard.name')}}</th>
                    <th scope="col"></th>
                    <th scope="col">{{__('security_guard.name')}}</th>
                    <th scope="col">{{__('security_guard.property')}}</th>
                    <th scope="col">{{__('security_guard.date')}}</th>
                    <th scope="col">{{__('security_guard.time')}}</th>
                    <th scope="col">{{__('security_guard.route')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td> <img src="" height="50px"alt="" class="circle" /></td>
                    <td>uguigol</td>
                    <td><td>
                    <td>464</td>
                    <td>jhiuhou</td>

                            <td>
                            

                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
                </div>
            </div>

        </div>
    </div>
</div>
 <!-- BEGIN: Page Main-->

        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- Add new contact popup -->
                    <div class="contact-overlay"></div>
                    <div style="bottom: 54px;" class="fixed-action-btn direction-top">
                        <a class="btn-floating btn-large primary-text gradient-shadow contact-sidebar-trigger" href="#modal1">
                            <i class="material-icons">person_add</i>
                        </a>
                    </div>
                    <!-- Add new contact popup Ends-->

                    
                    <!-- Sidebar Area Starts -->
                    <div class="sidebar-left sidebar-fixed">
                        <div class="sidebar">
                            <div class="sidebar-content">
                                <div id="sidebar-list" class="sidebar-menu list-group position-relative animate fadeLeft delay-1">
                                    <div class="sidebar-list-padding app-sidebar sidenav" id="contact-sidenav">
                                        <ul class=" display-grid">
                                        <div class="input-field add-new-file mt-0">
                                        <!-- Add File Button -->
                                        <button class="btn btn-block waves-effect waves-light">
                                        Add New Shift
                                        </button>
                                    </div>          
                                    
                                    <li class="sidebar-title">Filters</li>
                                            <li class="active"><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2">
                                                        perm_identity </i> All
                                                    Contact</a></li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> history </i> Frequent</a>
                                            </li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> star_border </i> Starred
                                                    Contacts</a></li>
                                            <li class="sidebar-title">Options</li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> keyboard_arrow_down </i>
                                                    Import</a></li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> keyboard_arrow_up </i>
                                                    Export</a></li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> print </i> Print</a></li>
                                            <li class="sidebar-title">Department</li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="purple-text material-icons small-icons mr-2">
                                                        fiber_manual_record </i> Engineering</a></li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="amber-text material-icons small-icons mr-2">
                                                        fiber_manual_record </i> Sales</a></li>
                                            <li><a href="javascript:void(0)" class="text-sub"><i class="light-green-text material-icons small-icons mr-2">
                                                        fiber_manual_record </i> Support</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" data-target="contact-sidenav" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Area Ends -->

                    <!-- Content Area Starts -->
                    <div class="content-area content-right">
                        <div class="app-wrapper">
                            <div class="datatable-search">
                                <i class="material-icons mr-2 search-icon">search</i>
                                <input type="text" placeholder="Search Contact" class="app-filter" id="global_filter">
                            </div>
                            <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
                                <div class="card-content p-0">
                                    <table id="data-table-contact" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="background-image-none center-align">
                                                    <label>
                                                        <input type="checkbox" onClick="toggle(this)" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th>User</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Favorite</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar"></span></td>
                                                <td>John</td>
                                                <td>john@domain.com</td>
                                                <td>202-555-0119</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-2.png" alt="avatar"></span></td>
                                                <td>Rodolfo</td>
                                                <td>rodo@domain.com</td>
                                                <td>202-555-0125</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-3.png" alt="avatar"></span></td>
                                                <td>Marco</td>
                                                <td>marco@domain.com</td>
                                                <td>202-555-0177</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-4.png" alt="avatar"></span></td>
                                                <td>Joshua</td>
                                                <td>jos@domain.com</td>
                                                <td>202-555-0126</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-4.png" alt="avatar"></span></td>
                                                <td>Gene</td>
                                                <td>gene@domain.com</td>
                                                <td>202-555-0130</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-5.png" alt="avatar"></span></td>
                                                <td>Oscar</td>
                                                <td>oscar@domain.com</td>
                                                <td>+1-202-555-0119</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-6.png" alt="avatar"></span></td>
                                                <td>William</td>
                                                <td>will@domain.com</td>
                                                <td>+1-202-555-0125</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar"></span></td>
                                                <td>Dorian</td>
                                                <td>dori@domain.com</td>
                                                <td>202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-8.png" alt="avatar"></span></td>
                                                <td>Lester</td>
                                                <td>les@domain.com</td>
                                                <td>+1-202-555-0177</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-9.png" alt="avatar"></span></td>
                                                <td>Charles</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0126</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar"></span></td>
                                                <td>William</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0130</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-11.png" alt="avatar"></span></td>
                                                <td>John</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-12.png" alt="avatar"></span></td>
                                                <td>John</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-13.png" alt="avatar"></span></td>
                                                <td>John</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-14.png" alt="avatar"></span></td>
                                                <td>Jake</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-15.png" alt="avatar"></span></td>
                                                <td>Jake</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-16.png" alt="avatar"></span></td>
                                                <td>Heather</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-17.png" alt="avatar"></span></td>
                                                <td>Joanna</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar"></span></td>
                                                <td>Joanna</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-2.png" alt="avatar"></span></td>
                                                <td>Cassandra</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-3.png" alt="avatar"></span></td>
                                                <td>Dolores</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-4.png" alt="avatar"></span></td>
                                                <td>Susan</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-5.png" alt="avatar"></span></td>
                                                <td>Susan</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-6.png" alt="avatar"></span></td>
                                                <td>Kathleen</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar"></span></td>
                                                <td>Chief</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-8.png" alt="avatar"></span></td>
                                                <td>Walter</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-9.png" alt="avatar"></span></td>
                                                <td>Walter</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-10.png" alt="avatar"></span></td>
                                                <td>Kathleen</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                            <tr>
                                                <td class="center-align contact-checkbox">
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" name="foo" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-11.png" alt="avatar"></span></td>
                                                <td>Terry</td>
                                                <td>name@domain.com</td>
                                                <td>+1-202-555-0112</td>
                                                <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                                                <td><span><i class="material-icons delete">delete_outline</i></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Area Ends -->

                    <!--  Contact sidebar -->
                    <div class="contact-compose-sidebar">
                        <div class="card quill-wrapper">
                            <div class="card-content pt-0">
                                <div class="card-header display-flex pb-2">
                                    <h3 class="card-title contact-title-label">Create New Contact</h3>
                                    <div class="close close-icon">
                                        <i class="material-icons">close</i>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <!-- form start -->
                                <form class="edit-contact-item mb-5 mt-5">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> perm_identity </i>
                                            <input id="first_name" type="text" class="validate">
                                            <label for="first_name">First Name</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> perm_identity </i>
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> business </i>
                                            <input id="company" type="text" class="validate">
                                            <label for="company">Company</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> business_center </i>
                                            <input id="business" type="text" class="validate">
                                            <label for="business">Job Title</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> email </i>
                                            <input id="email" type="email" class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> call </i>
                                            <input id="phone" type="text" class="validate">
                                            <label for="phone">Phone</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> note </i>
                                            <input id="notes" type="text" class="validate">
                                            <label for="notes">Notes</label>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-action pl-0 pr-0 right-align">
                                    <button class="btn-small waves-effect waves-light add-contact">
                                        <span>Add Contact</span>
                                    </button>
                                    <button class="btn-small waves-effect waves-light update-contact display-none">
                                        <span>Update Contact</span>
                                    </button>
                                </div>
                                <!-- form start end-->
                            </div>
                        </div>
                    </div><!-- START RIGHT SIDEBAR NAV -->
                    <aside id="right-sidebar-nav">
                        <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
                            <div class="row">
                                <div class="slide-out-right-title">
                                    <div class="col s12 border-bottom-1 pb-0 pt-1">
                                        <div class="row">
                                            <div class="col s2 pr-0 center">
                                                <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                                            </div>
                                            <div class="col s10 pl-0">
                                                <ul class="tabs">
                                                    <li class="tab col s4 p-0">
                                                        <a href="#messages" class="active">
                                                            <span>Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab col s4 p-0">
                                                        <a href="#settings">
                                                            <span>Settings</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab col s4 p-0">
                                                        <a href="#activity">
                                                            <span>Activity</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-out-right-body row pl-3">
                                    <div id="messages" class="col s12 pb-0">
                                        <div class="collection border-none mb-0">
                                            <input class="header-search-input mt-4 mb-2" type="text" name="Search" placeholder="Search Messages" />
                                            <ul class="collection right-sidebar-chat p-0 mb-0">
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Elizabeth Elliott</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">5.00 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Mary Adams</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.14 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-2.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Caleb Richards</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.14 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-3.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Caleb Richards</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Keny !</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">9.00 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-4.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">June Lane</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Ohh God</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.14 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-5.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Edward Fletcher</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Love you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">5.15 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-6.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Crystal Bates</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can we</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">8.00 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Nathan Watts</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Great!</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">9.53 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-8.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Willard Wood</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Do it</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.20 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Ronnie Ellis</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Got that</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">5.20 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-9.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Daniel Russell</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">12.00 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-10.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Sarah Graves</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Okay you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">11.14 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-11.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Andrew Hoffman</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can do</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">7.30 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-12.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Camila Lynch</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Leave it</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">2.00 PM</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="settings" class="col s12">
                                        <p class="setting-header mt-8 mb-3 ml-5 font-weight-900">GENERAL SETTINGS</p>
                                        <ul class="collection border-none">
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Notifications</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input checked type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show recent activity</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show recent activity</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show Task statistics</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show your emails</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Email Notifications</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input checked type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <p class="setting-header mt-7 mb-3 ml-5 font-weight-900">SYSTEM SETTINGS</p>
                                        <ul class="collection border-none">
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>System Logs</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Error Reporting</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Applications Logs</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input checked type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Backup Servers</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Audit Logs</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="activity" class="col s12">
                                        <div class="activity">
                                            <p class="mt-5 mb-0 ml-5 font-weight-900">SYSTEM LOGS</p>
                                            <ul class="widget-timeline mb-0">
                                                <li class="timeline-items timeline-icon-green active">
                                                    <div class="timeline-time">Today</div>
                                                    <h6 class="timeline-title">Homepage mockup design</h6>
                                                    <p class="timeline-text">Melissa liked your activity.</p>
                                                    <div class="timeline-content orange-text">Important</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-cyan active">
                                                    <div class="timeline-time">10 min</div>
                                                    <h6 class="timeline-title">Melissa liked your activity Drinks.</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content green-text">Resolved</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-red active">
                                                    <div class="timeline-time">30 mins</div>
                                                    <h6 class="timeline-title">12 new users registered</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content">
                                                        <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Registration.doc
                                                    </div>
                                                </li>
                                                <li class="timeline-items timeline-icon-indigo active">
                                                    <div class="timeline-time">2 Hrs</div>
                                                    <h6 class="timeline-title">Tina is attending your activity</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content">
                                                        <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Activity.doc
                                                    </div>
                                                </li>
                                                <li class="timeline-items timeline-icon-orange">
                                                    <div class="timeline-time">5 hrs</div>
                                                    <h6 class="timeline-title">Josh is now following you</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content red-text">Pending</div>
                                                </li>
                                            </ul>
                                            <p class="mt-5 mb-0 ml-5 font-weight-900">APPLICATIONS LOGS</p>
                                            <ul class="widget-timeline mb-0">
                                                <li class="timeline-items timeline-icon-green active">
                                                    <div class="timeline-time">Just now</div>
                                                    <h6 class="timeline-title">New order received urgent</h6>
                                                    <p class="timeline-text">Melissa liked your activity.</p>
                                                    <div class="timeline-content orange-text">Important</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-cyan active">
                                                    <div class="timeline-time">05 min</div>
                                                    <h6 class="timeline-title">System shutdown.</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content blue-text">Urgent</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-red">
                                                    <div class="timeline-time">20 mins</div>
                                                    <h6 class="timeline-title">Database overloaded 89%</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content">
                                                        <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Database-log.doc
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="mt-5 mb-0 ml-5 font-weight-900">SERVER LOGS</p>
                                            <ul class="widget-timeline mb-0">
                                                <li class="timeline-items timeline-icon-green active">
                                                    <div class="timeline-time">10 min</div>
                                                    <h6 class="timeline-title">System error</h6>
                                                    <p class="timeline-text">Melissa liked your activity.</p>
                                                    <div class="timeline-content red-text">Error</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-cyan">
                                                    <div class="timeline-time">1 min</div>
                                                    <h6 class="timeline-title">Production server down.</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content blue-text">Urgent</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide Out Chat -->
                        <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
                            <li class="center-align pt-2 pb-2 sidenav-close chat-head">
                                <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
                            </li>
                            <li class="chat-body">
                                <ul class="collection">
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">hello!</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">How can we help? We're here for you!</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">I am looking for the best admin template.?</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Materialize admin is the responsive materializecss admin template.</p>
                                        </div>
                                    </li>

                                    <li class="collection-item display-grid width-100 center-align">
                                        <p>8:20 a.m.</p>
                                    </li>

                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">Ohh! very nice</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Thank you.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">How can I purchase it?</p>
                                        </div>
                                    </li>

                                    <li class="collection-item display-grid width-100 center-align">
                                        <p>9:00 a.m.</p>
                                    </li>

                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">From ThemeForest.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Only $24</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">Ohh! Thank you.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">I will purchase it for sure.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Great, Feel free to get in touch on</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">https://pixinvent.ticksy.com/</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="center-align chat-footer">
                                <form class="col s12" onsubmit="slideOutChat()" action="javascript:void(0);">
                                    <div class="input-field">
                                        <input id="icon_prefix" type="text" class="search" />
                                        <label for="icon_prefix">Type here..</label>
                                        <a onclick="slideOutChat()"><i class="material-icons prefix">send</i></a>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </aside>
                    <!-- END RIGHT SIDEBAR NAV -->
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
 
    <!-- END: Page Main-->

@endsection
@section('script-area')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/app-contacts.js')}}"></script>

    <script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
@endsection