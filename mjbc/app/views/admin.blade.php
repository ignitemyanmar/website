<!DOCTYPE html>
 <html lang="en"> 
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>MJBC	| Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    {{HTML::script('/src/tinymce.min.js')}}
    {{HTML::style('../css/customstyle.css')}}
    {{HTML::style('../../../assets/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('../../../assets/bootstrap/css/bootstrap-responsive.min.css')}}
    {{HTML::style('../../../assets/font-awesome/css/font-awesome.css')}}
    {{HTML::style('../../../assets/css/style.css')}}
    {{HTML::style('../../../assets/css/style_responsive.css')}}
    <link href="../../../assets/css/style_default.css" rel="stylesheet" id="style_color" />
    {{HTML::style('../../../css/font.css')}}
    {{HTML::style('../../../assets/css/metro.css')}}
    {{HTML::style('../../../css/dashboard.css')}}
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    {{HTML::script('../../../assets/js/jquery-1.8.3.min.js')}}
    <!-- {{HTML::script('../../../src/jquery.ui.js')}} -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
                <a class="brand" href="/">
                <img src="assets/img/logo1.png" alt="logo" />
                <!-- <img src="assets/img/logo.png" alt="logo" /> -->
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="assets/img/menu-toggler.png" alt="" />
                </a>          
                <!-- END RESPONSIVE MENU TOGGLER -->                
                <!-- BEGIN TOP NAVIGATION MENU -->                  
                <ul class="nav pull-right">
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- <li class="dropdown" id="header_inbox_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-envelope-alt"></i>
                        <span class="badge">1</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <li>
                                <p>You have 1 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                <span class="photo"><img src="./assets/img/avatar2.jpg" alt="" /></span>
                                <span class="subject">
                                <span class="from">From Cuatomers</span>
                                <span class="time">10:00 AM</span>
                                </span>
                                <span class="message">
                                Message for bus ticket...
                                </span>  
                                </a>
                            </li>
                            
                            <li class="external">
                                <a href="#">See all messages <i class="m-icon-swapright"></i></a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img alt="" src="assets/img/avatar1_small.jpg" /> -->
                        <span class="username">@if(Auth::check()) {{ Auth::user()->name }} @endif</span>
                        <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                            <li class="divider"></li>
                            <li><a href="/users-logout"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->    
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar nav-collapse collapse">
            <!-- BEGIN SIDEBAR MENU --> 
            <?php $currentroute=Route::getCurrentRoute()->getPath();
              $currentroute=substr($currentroute,0,3);
            ?>
            <ul>
                <li>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler hidden-phone"></div>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                </li>
                <li>
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <form class="sidebar-search">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..." />               
                            <input type="button" class="submit" value=" " />
                        </div>
                    </form>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
                
                <!-- <li @if($currentroute=='das') class="start active" @else class="start" @endif>
                    <a href="/dashboard">
                    <i class="icon-home"></i> 
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    </a>
                </li> -->
                
                <li @if($currentroute=='banner') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Banner</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/banner-create">Add New Banner</a></li>
                        <li ><a href="/banner">Banner List</a></li>
                    </ul>
                </li>

                <li @if($currentroute=='seminartype') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Seminar Type</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/seminartypecreate">Add New Seminar Type</a></li>
                        <li ><a href="/seminartypelist">Seminar Type List</a></li>
                    </ul>
                </li>
                
                <!-- <li @if($currentroute=='co') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Consultancy</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/consultancycreate">Add New Consultancy</a></li>
                        <li ><a href="/consultancylist">Consultancy List</a></li>
                    </ul>
                </li> -->

                <!-- <li @if($currentroute=='dow') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Download TimeTable</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/downloadtimetablecreate">Add New Download TimeTable</a></li>
                        <li ><a href="/downloadtimetablelist">Download TimeTable List</a></li>
                    </ul>
                </li> -->

                <li @if($currentroute=='faq') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">FAQ</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/faqcreate">Add New FAQ</a></li>
                        <li ><a href="/faqlist">FAQ List</a></li>
                    </ul>
                </li>
                
                <li @if($currentroute=='con') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Contact Us</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/contactuscreate">Add New Contact Us</a></li>
                        <li ><a href="/contactuslist">Contact Us List</a></li>
                    </ul>
                </li>

                <li @if($currentroute=='abo') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">About Us</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/aboutuscreate">Add New About Us</a></li>
                        <li ><a href="/aboutuslist">About Us List</a></li>
                    </ul>
                </li>
                
                
                <!-- <li @if($currentroute=='lang') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Language</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="languagecreate">Add New Language</a></li>
                        <li ><a href="/languagelist">Language List</a></li>
                    </ul>
                </li> -->
                <!-- <li @if($currentroute=='e_s') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Executive Search</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="e_searchcreate">Add New Executive Search</a></li>
                        <li ><a href="/e_searchlist">Executive Search List</a></li>
                    </ul>
                </li>
 -->
                <li @if($currentroute=='new') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">News & Events</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/news_events-create">Add News & Events</a></li>
                        <li ><a href="/news_events">News & Events List</a></li>
                    </ul>
                </li>

                <li @if($currentroute=='sem') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Seminar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="seminarcreate">Add New Seminar</a></li>
                        <li ><a href="/seminarlist">Seminar List</a></li>
                    </ul>
                </li>
                <!-- <li @if($currentroute=='lan') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title"> Language Seminar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="languageseminarcreate">Add New Language Seminar</a></li>
                        <li ><a href="/languageseminarlist">Language Seminar List</a></li>
                    </ul>
                </li> -->
                <li @if($currentroute=='tim') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title"> Time Table</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="timetablecreate">Add New TimeTable</a></li>
                        <li ><a href="/timetablelist">TimeTable List</a></li>
                    </ul>
                </li>
                
                <!-- <li @if($currentroute=='stu') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Student Register</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/studentregister">New Student Register</a></li>
                        <li ><a href="/studentlist">Student List</a></li>
                    </ul>
                </li> -->

                 <li @if($currentroute=='enr') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">Enroll List</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/enroll">Enroll List</a></li>
                    </ul>
                </li>
                

                <li @if($currentroute=='use') class="has-sub active" @else class="has-sub" @endif>
                    <a href="javascript:;">
                    <i class="icon-th-list"></i> 
                    <span class="title">User</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li ><a href="/usercreate">Add New User</a></li>
                        <li ><a href="/userlist">User List</a></li>
                    </ul>
                </li>
                
                
                
                
                
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
        @yield('content')
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        2014 &copy; MJBC Website.
        <div class="span pull-right">
            <span class="go-top"><i class="icon-angle-up"></i></span>
        </div>
    </div>
    
    
    {{HTML::script('../../../assets/breakpoints/breakpoints.js')}}
    {{HTML::script('../../../assets/jquery-slimscroll/jquery.slimscroll.min.js')}}
    {{HTML::script('../../../assets/bootstrap/js/bootstrap.min.js')}}
    {{HTML::script('../../../assets/js/jquery.blockui.js')}}
    {{HTML::script('../../../assets/js/jquery.cookie.js')}}
    {{HTML::script('../../../assets/flot/jquery.flot.js')}}
    {{HTML::script('../../../assets/flot/jquery.flot.resize.js')}}
    {{HTML::script('../../../assets/js/app.js')}}   
    <script>
        jQuery(document).ready(function() { 
            App.init(); // init the rest of plugins and elements
        });
    </script>   
    
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
