<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Abhimanyu">
    <meta name="base-url" content="{{url('/')}}">
    <title>SGT : : @yield('title')</title>
    @include('panel.include.head')
    @yield('link-area')
</head>
<!-- END: Head-->

<body
    class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns"
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('panel.include.header')
    <!-- END: Header-->
    <ul class="display-none" id="default-search-main">
        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                <h6 class="search-title">FILES</h6>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="{{ asset('app-assets/images/icon/pdf-image.png') }}"
                                width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Two new item
                                submitted</span><small class="grey-text">Marketing Manager</small></div>
                    </div>
                    <div class="status"><small class="grey-text">17kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="{{ asset('app-assets/images/icon/doc-image.png') }}"
                                width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">52 Doc file
                                Generator</span><small class="grey-text">FontEnd Developer</small></div>
                    </div>
                    <div class="status"><small class="grey-text">550kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="{{ asset('app-assets/images/icon/xls-image.png') }}"
                                width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">25 Xls File
                                Uploaded</span><small class="grey-text">Digital Marketing Manager</small></div>
                    </div>
                    <div class="status"><small class="grey-text">20kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="{{ asset('app-assets/images/icon/jpg-image.png') }}"
                                width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Anna
                                Strong</span><small class="grey-text">Web Designer</small></div>
                    </div>
                    <div class="status"><small class="grey-text">37kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                <h6 class="search-title">MEMBERS</h6>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle"
                                src="{{ asset('app-assets/images/avatar/avatar-7.png') }}" width="30"
                                alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">John
                                Doe</span><small class="grey-text">UI designer</small></div>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle"
                                src="{{ asset('app-assets/images/avatar/avatar-8.png') }}" width="30"
                                alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Michal
                                Clark</span><small class="grey-text">FontEnd Developer</small></div>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle"
                                src="{{ asset('app-assets/images/avatar/avatar-10.png') }}" width="30"
                                alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Milena
                                Gibson</span><small class="grey-text">Digital Marketing</small></div>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle"
                                src="{{ asset('app-assets/images/avatar/avatar-12.png') }}" width="30"
                                alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Anna
                                Strong</span><small class="grey-text">Web Designer</small></div>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="display-none" id="page-search-title">
        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                <h6 class="search-title">PAGES</h6>
            </a></li>
    </ul>
    <ul class="display-none" id="search-not-found">
        <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span
                    class="material-icons">error_outline</span><span class="member-info">No results found.</span></a>
        </li>
    </ul>



    <!-- BEGIN: SideNav-->
    @include('panel.include.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            @include('panel.include.breadcrumb')
            <div class="col s12">
                <div class="container">
                    @yield('content-area')
                    @include('panel.include.rightsidebar')
                    <!-- END RIGHT SIDEBAR NAV -->
                    @include('panel.include.bottom-icon')
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->


    <!-- Theme Customizer -->
    @include('panel.include.customizer')
    <!--/ Theme Customizer -->


    <!-- BEGIN: Footer-->

    <footer
        class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
        @include('panel.include.footer')
    </footer>
    @include('auth.change_password')
    <!-- END: Footer-->
    @include('panel.include.foot')
    <script>
        $(document).ready(function() {
            var chatlisturl = "{{ route('chat.list') }}";
            var singlechat = "{{ route('chat.single-chat') }}"
            $.ajax({
                url: chatlisturl,
                method: 'get',
                success: function(response) {
                    $('#messages').html(response);
                }
            });
            $.ajax({
                url: singlechat,
                method: 'post',
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#singlechat').html(response);
                }
            });
        });
    </script>
    @include('panel.include.sweetalert')
    @yield('script-area')
</body>

</html>
