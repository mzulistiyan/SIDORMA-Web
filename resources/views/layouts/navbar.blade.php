<div class="page-main-header">
    <div class="main-header-right">
        <div class="main-header-left text-center">
            <div class="logo-wrapper">
                <h3 href="index.html">SIDORMA</h3>
            </div>
        </div>

        <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar"> </i></div>
        <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
                <li>
                    <form class="form-inline search-form" action="#" method="get">
                        <div class="form-group">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search Mahasiswa">
                                    <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading{{asset('PocoDashboard')}}.</span></div><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form>
                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="onhover-dropdown"><img class="img-fluid img-shadow-warning" src="{{asset('PocoDashboard')}}/assets/images/dashboard/pc.png" alt="">
                    <ul class="onhover-show-div droplet-dropdown">
                        <li class="gradient-primary text-center">
                            <h5 class="f-w-700">Dashboard</h5><span>Lorem Ipsum Dolar Sitamet</span>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-sm-4 col-6 droplet-main"><i data-feather="users"></i><span class="d-block"><a href="{{route('mahasiswa.index')}}">Mahasiswa</a></span></div>
                                <div class="col-sm-4 col-6 droplet-main"><i data-feather="users"></i><span class="d-block"><a href="{{route('sr.index')}}">Senior Resident</a></span></div>
                                <div class="col-sm-4 col-6 droplet-main"><i data-feather="home"></i><span class="d-block"><a href="{{route('gedung.index')}}">Gedung</a></span></div>
                                <div class="col-sm-4 col-6 droplet-main"><i data-feather="file-text"></i><span class="d-block"><a href="{{route('absensi.index')}}">Absensi</a></span></div>
                                <div class="col-sm-4 col-6 droplet-main"><i data-feather="file-text"></i><span class="d-block">Report Absensi</span></div>
                                <div class="col-sm-4 col-6 droplet-main"><i data-feather="file-text"></i><span class="d-block">Report Gedung</span></div>
                            </div>
                        </li>

                    </ul>
                </li>

                <li class="onhover-dropdown"><img class="img-fluid img-shadow-warning" src="{{asset('PocoDashboard')}}/assets/images/dashboard/notification.png" alt="">
                    <ul class="onhover-show-div notification-dropdown">
                        <li class="gradient-primary">
                            <h5 class="f-w-700">Notifications</h5><span>You have 6 unread messages</span>
                        </li>
                        <li>
                            <div class="media">
                                <div class="notification-icons bg-success mr-3"><i class="mt-0" data-feather="thumbs-up"></i></div>
                                <div class="media-body">
                                    <h6>Someone Likes Your Posts</h6>
                                    <p class="mb-0"> 2 Hours Ago</p>
                                </div>
                            </div>
                        </li>
                        <li class="pt-0">
                            <div class="media">
                                <div class="notification-icons bg-info mr-3"><i class="mt-0" data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <h6>3 New Comments</h6>
                                    <p class="mb-0"> 1 Hours Ago</p>
                                </div>
                            </div>
                        </li>
                        <li class="bg-light txt-dark"><a href="#">All </a> notification</li>
                    </ul>
                </li>
                <li class="onhover-dropdown"> <span class="media user-header"><img class="img-fluid" src="{{asset('PocoDashboard')}}/assets/images/dashboard/user.png" alt=""></span>
                    <ul class="onhover-show-div profile-dropdown">
                        <li class="gradient-primary">
                            <h5 class="f-w-600 mb-0">Elana Saint</h5><span>Web Designer</span>
                        </li>
                        <li><i data-feather="user" > </i> <a href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">Profile</a></li>
                        <li><i data-feather="message-square"> </i>Inbox</li>
                        <li><i data-feather="file-text"> </i>Taskboard</li>
                        <li><i data-feather="settings"> </i>Settings </li>
                        
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
        <script id="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><i class="pe-7s-home"></i></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
        <script id="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                </script>
    </div>
</div>