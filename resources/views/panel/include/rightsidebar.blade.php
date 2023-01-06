<aside id="right-sidebar-nav">
    <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
        <div class="row">
            <div class="slide-out-right-title">
                <div class="col s12 border-bottom-1 pb-0 pt-1">
                    <div class="row">
                        <div class="col s2 pr-0 center">
                            <i class="material-icons vertical-text-middle"><a href="#"
                                    class="sidenav-close">clear</a></i>
                        </div>
                        <div class="col s10 pl-0">
                            <ul class="tabs">
                                <li class="tab col s4 p-0">
                                    <a href="#messages" class="active">
                                        <span>Messages</span>
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
                </div>
                <div id="activity" class="col s12">
                    <div class="activity">
                        @include('activity.systemlog')
                        @include('activity.applicationlog')
                        @include('activity.serverlog  ')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide Out Chat -->
    <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat" id="singlechat">
    </ul>
</aside>