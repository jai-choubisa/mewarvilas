<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>MewarVilas - Admin</title>

        <meta name="description" content="MewarVilas - Admin Backend developed by Choubisa Technologies">
        <meta name="author" content="Choubisa Technologies">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ URL::asset("_assets/img/favicons/favicon.png") }}">

        <link rel="icon" type="image/png" href="{{ URL::asset("css/mystyle.css") }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ URL::asset("_assets/img/favicons/favicon-32x32.png") }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ URL::asset("_assets/img/favicons/favicon-96x96.png") }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ URL::asset("_assets/img/favicons/favicon-160x160.png") }}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{ URL::asset("_assets/img/favicons/favicon-192x192.png") }}" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-57x57.png") }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-60x60.png") }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-72x72.png") }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-76x76.png") }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-114x114.png") }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-120x120.png") }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-144x144.png") }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-152x152.png") }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset("_assets/img/favicons/apple-touch-icon-180x180.png") }}">
        <!-- END Icons -->


        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ URL::asset('_assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ URL::asset('_assets/js/plugins/slick/slick.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('_assets/js/plugins/slick/slick-theme.min.css')}}">

        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="{{ URL::asset('_assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{ URL::asset('_assets/css/oneui.css')}}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="_assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available Classes:

            'enable-cookies'             Remembers active color theme between pages (when set through color theme list)

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Overlay Scroll Container -->
                <div id="side-overlay-scroll">
                    <!-- Side Header -->
                    <div class="side-header side-content">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <span>
                            <img class="img-avatar img-avatar32" src="{{ URL::asset("_assets/img/favicons/favicon.png") }}" alt="">
                            <span class="font-w600 push-10-l">MewarVilas Admin</span>
                        </span>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content remove-padding-t">
                        <!-- Notifications -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                    </li>
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Recent Activity</h3>
                            </div>
                            <div class="block-content">
                                <!-- Activity List -->
                                <ul class="list list-activity">
                                    <li>
                                        <i class="si si-wallet text-success"></i>
                                        <div class="font-w600">New sale ($15)</div>
                                        <div><a href="javascript:void(0)">Admin Template</a></div>
                                        <div><small class="text-muted">3 min ago</small></div>
                                    </li>
                                    <li>
                                        <i class="si si-pencil text-info"></i>
                                        <div class="font-w600">You edited the file</div>
                                        <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
                                        <div><small class="text-muted">15 min ago</small></div>
                                    </li>
                                    <li>
                                        <i class="si si-close text-danger"></i>
                                        <div class="font-w600">Project deleted</div>
                                        <div><a href="javascript:void(0)">Line Icon Set</a></div>
                                        <div><small class="text-muted">4 hours ago</small></div>
                                    </li>
                                    <li>
                                        <i class="si si-wrench text-warning"></i>
                                        <div class="font-w600">Core v2.5 is available</div>
                                        <div><a href="javascript:void(0)">Update now</a></div>
                                        <div><small class="text-muted">6 hours ago</small></div>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <small><a href="javascript:void(0)">Load More..</a></small>
                                </div>
                                <!-- END Activity List -->
                            </div>
                        </div>
                        <!-- END Notifications -->

                        <!-- Quick Settings -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Quick Settings</h3>
                            </div>
                            <div class="block-content">
                                <!-- Quick Settings Form -->
                                <form class="form-bordered" action="index.html" method="post" onsubmit="return false;">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <div class="font-s13 font-w600">Online Status</div>
                                                <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                            </div>
                                            <div class="col-xs-4 text-right">
                                                <label class="css-input switch switch-sm switch-primary push-10-t">
                                                    <input type="checkbox"><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <div class="font-s13 font-w600">Auto Updates</div>
                                                <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                            </div>
                                            <div class="col-xs-4 text-right">
                                                <label class="css-input switch switch-sm switch-primary push-10-t">
                                                    <input type="checkbox"><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <div class="font-s13 font-w600">Notifications</div>
                                                <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                            </div>
                                            <div class="col-xs-4 text-right">
                                                <label class="css-input switch switch-sm switch-primary push-10-t">
                                                    <input type="checkbox" checked><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <div class="font-s13 font-w600">API Access</div>
                                                <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                            </div>
                                            <div class="col-xs-4 text-right">
                                                <label class="css-input switch switch-sm switch-primary push-10-t">
                                                    <input type="checkbox" checked><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Quick Settings Form -->
                            </div>
                        </div>
                        <!-- END Quick Settings -->
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            
                            <a class="h5 text-white" href="{{ URL::asset('/') }}">
                                <img src="{{ URL::asset('_assets/img/logo.png') }}" alt="Mewarvilas Admin" title="MewarVilas Admin" />
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <a href="#"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::asset('admin/restaurant-orders') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Orders</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Users </span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Restaurant Users</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurant-users') }}">Manage</a>
                                        </li>
                                        <li>
                                            <a href="#">Message</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Customer Users</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/customer-users') }}">Manage</a>
                                        </li>
                                        <li>
                                            <a href="#">Message</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Restaurants </span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Restaurant</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/create') }}">Create</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Menu</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/menus') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/menus/create') }}">Create</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Deals</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/deals') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/deals/create') }}">Create</a>
                                        </li>                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Facilities</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/rfacilities') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/rfacilities/create') }}">Create</a>
                                        </li>                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Cuisines</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/rcuisines') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/rcuisines/create') }}">Create</a>
                                        </li>                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Images</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/restaurant_images') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/restaurant_images/create') }}">Create</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Events</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/events') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/events/create') }}">Create</a>
                                        </li>
                                       
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Map Location</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/maps') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/maps/create') }}">Create</a>
                                        </li>
                                       
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Facilities Types</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/facilities') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/facilities/create') }}">Create</a>
                                        </li>                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Cuisines Types</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/cuisines') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/cuisines/create') }}">Create</a>
                                        </li>                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Timings</span></a>
                                    <ul>
                                         <li>
                                            <a href="{{ URL::asset('admin/restaurants/timings') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/restaurants/timings/create') }}">Create</a>
                                        </li>
                                       
                                       
                                    </ul>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Location</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Country</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/countries') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/countries/create') }}">Create</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">State</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/states') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/states/create') }}">Create</a>
                                        </li>
                                                                   
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">City</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::asset('admin/cities') }}">Show</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::asset('admin/cities/create') }}">Create</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                <img src="{{ URL::asset("_assets/img/favicons/favicon.png") }}" alt="Avatar">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Profile</li>
                                <li>
                                    <a tabindex="-1" href="#">
                                        <i class="si si-envelope-open pull-right"></i>
                                        <span class="badge badge-primary pull-right">3</span>Inbox
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="#">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                <li>
                                    <a tabindex="-1" href="{{ URL::asset("logout") }}">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                            <i class="fa fa-tasks"></i>
                        </button>
                    </li>
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @if(Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right">
                    Developed by <a class="font-w600" href="http://www.choubisatech.com" target="_blank">Choubisa Technologies</a>
                </div>
                <div class="pull-left">
                    <a class="font-w600" href="http://www.mewarvilas.com" target="_blank">MewarVilas</a> &copy; 2015-16
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="{{ URL::asset("_assets/js/core/jquery.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/bootstrap.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/jquery.slimscroll.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/jquery.scrollLock.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/jquery.appear.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/jquery.countTo.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/jquery.placeholder.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/core/js.cookie.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/app.js") }}"></script>

        <!-- Page Plugins -->
        <script src="{{ URL::asset("_assets/js/plugins/slick/slick.min.js") }}"></script>
        <script src="{{ URL::asset("_assets/js/plugins/chartjs/Chart.min.js") }}"></script>

         <!-- Page JS Plugins -->
        <script src="{{ URL::asset("_assets/js/plugins/datatables/jquery.dataTables.min.js") }}"></script>

        <!-- Page JS Code -->
        <script src="{{ URL::asset("_assets/js/pages/base_tables_datatables.js") }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ URL::asset("_assets/js/plugins/jquery-validation/jquery.validate.min.js") }}"></script>

        <!-- Page JS Code -->
        <script src="{{ URL::asset("_assets/js/pages/base_forms_validation.js") }}"></script>

        <script src="{{ URL::asset("_assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js") }}"></script>

        <script>
            $(function () {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers(['datepicker','slick']);
            });
            
        </script>
        <!-- Page JS Code -->
        <script src="{{ URL::asset("_assets/js/pages/base_pages_dashboard.js") }}"></script>



    </body>
</html>