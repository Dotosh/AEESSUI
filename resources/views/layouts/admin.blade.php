<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- =======================================================
      Theme Name: AEESSUI
      Theme URL: https://aeessui.edu.ng
      Author: Oluwatunmise Israel DADA
      Author URL: https://
    ======================================================= -->

    <title>AEESSUI Admin</title>

    <!-- Bootstrap CSS CDN https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css-->
    <link rel="stylesheet" href="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css')}}" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style4.css')}}">
    <link href="{{asset('css/adminmaster/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/adminmaster/customstyle.css')}}">

    <!-- Font Awesome JS url('https://use.fontawesome.com/releases/v5.0.13/js/solid.js', https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js-->
    <script defer src="{{asset('js/adminmaster/solid.js')}}" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="{{asset('js/adminmaster/fontawesome.js')}}" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('js/adminmaster/bootstrap.min.js')}}">



</head>

<body>

@yield('body')

<div class="header text-right">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.html">Admin Pane</a></h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Admin</h3>
            <strong>AD</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    My Account
                </a>
                <ul class="collapse list-unstyled" id="accountSubmenu">
                    <li>
                        <a href="#">Profile</a>
                    </li>
                    <li>
                        <a href="#">LogOut</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-home"></i>
                    Users
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{route('users.index')}}">All Users</a>
                    </li>
                    <li>
                        <a href="{{route('users.create')}}">Create Users</a>
                    </li>
                </ul>
            </li>



            <li>
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    About
                </a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-image"></i>
                    Portfolio
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-question"></i>
                    FAQ
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    Contact
                </a>
            </li>


        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="{{url('https://bootstrapious.com/tutorial/files/sidebar.zip')}}" class="download">Download source</a>
            </li>
            <li>
                <a href="{{url('https://bootstrapious.com/p/bootstrap-sidebar')}}" class="article">Back to article</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">

            @yield('content')


        </div>




        {{--<h2>Collapsible Sidebar Using Bootstrap 4</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}

        {{--<div class="line"></div>--}}

        {{--<h2>Lorem Ipsum Dolor</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}

        {{--<div class="line"></div>--}}

        {{--<h2>Lorem Ipsum Dolor</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}

        {{--<div class="line"></div>--}}

        {{--<h3>Lorem Ipsum Dolor</h3>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
    </div>
</div>


<footer>
    <div class="container">

        <div class="copy text-center">
            Copyright AEESSUI, 2019 <br>
            <a href='#'>Dev: Outshine</a>
        </div>

    </div>
</footer>


<!--https://code.jquery.com/jquery.js-->

<!-- jQuery CDN - Slim version (=without AJAX) -->
{{--<script src="{{url('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<!-- Popper.JS -->
{{--<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js')}}" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>--}}
<!-- Bootstrap JS -->
{{--<script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js')}}" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>--}}


<script src="{{asset('js/adminmaster/jquery.js')}}"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="{{asset('js/adminmaster/jquery-3.3.1.slim.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- Popper.JS -->
<script src="{{asset('js/adminmaster/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('js/adminmaster/bootstrap.min.js')}}"></script>
<!-- Our Custom JS -->
<script src="{{asset('js/adminmaster/custom.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>

</html>


