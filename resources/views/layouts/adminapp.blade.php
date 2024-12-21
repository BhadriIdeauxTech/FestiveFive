<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>FESTIVE 5 -- @yield('title')</title>


    <!-- General CSS Files -->
    @include('assetslink.style')
    <!-- /END GA -->
    @if (session('failed'))
        <div id="popup-message" class="popup-message">
            {{ session('failed') }}
        </div>
    @endif

    @if (session('success'))
        <div id="popup-message" class="popup-mess">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div id="error-popup" class="error-popup">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</head>

<body> 

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- <div class="navbar-bg"></div> --> 
            <nav class="navbar navbar-expand-lg main-navbar"style="background: linear-gradient(to right, #6d3cdc, #370d92);">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li> --}}
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">
              
                  
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ url('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                            <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                            {{-- <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a> --}}
                        </div>
                    </li>
                </ul>
            </nav>
            @include('assetslink.navbar')

            <!-- Main Content -->
            @section('contentdashboard')

            @show

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Design By <a href=""></a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    @include('assetslink.script')
</body>

</html>
