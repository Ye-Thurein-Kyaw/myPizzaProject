<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('admin/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li >
                            <a class="js-arrow" href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Home Page
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category#list')}}">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{ route('product#list')}}">
                                <i class="fa-sharp fa-solid fa-pizza-slice"></i>Product</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->


        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap d-flex flex-row-reverse">

                    <div class="header-button">

                        <div class="account-wrap ">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    @if (Auth::user()->image ==  null )
                                        <img src="{{ asset('image/default-user.png')}}" alt="">
                                    @else
                                        <img src="{{ asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                    @endif

                                </div>
                                <div class="content">
                                    <a class="js-acc-btn text-decoration-none" href="#">{{ Auth::user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                @if (Auth::user()->image ==  null )
                                                    @if (Auth::user()->gender == 'male')
                                                        <img src="{{ asset('image/maleDefault.png')}}" alt="">
                                                    @else
                                                        <img src="{{ asset('image/download.png')}}" alt="">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#" class="text-decoration-none">{{ Auth::user()->name}}</a>
                                            </h5>
                                            <span class="email">{{ Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body ">
                                        <div class="account-dropdown__item ">
                                            <a href="{{ route('admin#accountProfile')}}" class="text-decoration-none">
                                                <i class="zmdi zmdi-account"></i>  Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body ">
                                        <div class="account-dropdown__item ">
                                            <a href="{{ route('admin#list')}}" class="text-decoration-none">
                                                <i class="fa-solid fa-users"></i>  Admin List</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body ">
                                        <div class="account-dropdown__item ">
                                            <a href="{{ route('admin#changePasswordPage')}}" class="text-decoration-none">
                                                <i class="fa-solid fa-key"></i>  Change Password</a>
                                        </div>
                                    </div>

                                    <div class="account-dropdown__footer">
                                        <form action="{{route('logout')}}" class="d-flex justify-content-center" method="POST">
                                            @csrf
                                            <button class="btn bg-primary text-white col-10 mb-2">
                                                <i class="zmdi zmdi-power"></i>  Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

            @yield('content')

         <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
