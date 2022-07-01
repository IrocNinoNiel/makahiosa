<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <style>
        .img-nav{
            border-radius: 50%;
            /* width:30px;
            height: 40px; */
            padding: 5px 10px 5px 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        @guest
        @else
            <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-5">
                <div class="container-fluid">
                    <a class="navbar-brand bg-white rounded-circle" href="#">
                        <img src="{{asset('images/MagkahiOSA Logo (1).png')}}" width="50" height="40" alt="">
                    </a>
                    <a class="navbar-brand item" href="#">
                        <img class="rounded-circle" src="{{asset('images/106669644_122402626202775_248362239959887121_n.jpg')}}" width="50" height="40" alt="">

                    </a>
                    <a class="navbar-brand bg-white img-nav" href="#">
                        <!-- <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt=""> -->
                        <i class="fa fa-bell m-auto"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                @if (!Auth::user()->is_admin)
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        <div class="form-inline links">
                            <a class="nav-link font-weight-bold text-dark" href="{{ route('home') }}"><span>Home</span></a>|
                            <a class="nav-link font-weight-bold text-dark" href="{{ route('timeline') }}"><span>TIMELINE</span> </a>|
                            <a class="nav-link font-weight-bold text-dark" href="{{ route('user.index') }}">ORGANIZATION</a>|
                            <a class="nav-link font-weight-bold text-dark" href="{{ route('sarflist') }}">SARF</a>|
                            <a class="nav-link btn bg-white rounded-pill ml-3 font-weight-bold contact-button" href="#">Contact Us</a>

                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        <div class="form-inline links">
                            <div class="my-2 my-lg-0">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('college.index') }}">College Management <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Organization Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('user.create')}}">Register</a>
                                            <a class="dropdown-item" href="{{ route('user.index') }}">Show</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Event Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('applist') }}">Show Application List</a>
                                            <a class="dropdown-item" href="{{ route('eventlist') }}">Show Event List</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('timeline')}}">Timeline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('organization') }}">Social</a>
                                    </li>
                            </div>
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                @endif
                
                </div>
            </nav>
        @endguest

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
