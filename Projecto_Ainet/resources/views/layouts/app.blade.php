<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if(!Auth::guest())
                        <ul class="nav navbar-nav">
                            <li class="dropdown" style="margin-left: 5%;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Requests <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('requests.create') }}">
                                            Add Request
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('requests.index') }}">
                                            List Requests
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('userRequests') }}">
                                            Your Requests
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchRequests') }}">
                                            Search Requests
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                    @if(!Auth::guest())
                        <ul class="nav navbar-nav">
                            <li class="dropdown" style="margin-left: 5%;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Departments <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('departments.create') }}">
                                            Add Department
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('departments.index') }}">
                                            List Department
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    @if(!Auth::guest())
                        <ul class="nav navbar-nav">
                            <li class="dropdown" style="margin-left: 5%;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Printers <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('printers.create') }}">
                                            Add Printer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('printers.index') }}">
                                            List Printers
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <img alt="User Pic" src="{{Storage::disk('public')->url('profiles/'.Auth::user()->profile_photo)}}" class="img-circle img-responsive pull-left" style="width:25px; height: 25px;">
                                    &nbsp; {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile', Auth::user()->id) }}">
                                            Profile
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
