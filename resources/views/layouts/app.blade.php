<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <div class="container mt-md-5 mb-md-5 p-md-2 bg-white elevation-1 rounded">
            <div class="elevation-1"  style="border-radius:20px 20px 0px 0px ">
                <nav class="navbar navbar-expand-lg navbar-dark bg-theme"  style="border-radius:20px 20px 0px 0px ">
                    <a class="navbar-brand" href="/">{{__('ECHOES')}}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{url()->current()==url('/')?'active':''}}">
                                <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{Request::segment(1)=='customers'?'active':''}}">
                                <a class="nav-link " href="/customers">Customers</a>
                            </li>
                            <li class="nav-item {{Request::segment(1)=='employees'?'active':''}}">
                                <a class="nav-link" href="/employees">Employees</a>
                            </li>
                            <li class="nav-item {{Request::segment(1)=='events'?'active':''}}">
                                <a class="nav-link" href="/events">Events</a>
                            </li>
                            <li class="nav-item {{Request::segment(1)=='feedback'?'active':''}}">
                                <a class="nav-link" href="/feedback">Feedback</a>
                            </li>
                            <li class="nav-item {{Request::segment(1)=='help'?'active':''}}">
                                <a class="nav-link" href="/help">Help Center</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        </ul>
                    </div>
                </nav>
                <nav  aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{url('/')}}>Home</a></li>
                        @if(url()->current()!=url('/'))
                            <li class="breadcrumb-item <?= empty(Request::segment(2)) ?'active':''?>">
                                @if(!empty(Request::segment(2)))
                                    <a href="{{url(Request::segment(1))}}">{{ucfirst(Request::segment(1))}}</a>
                                @else
                                    {{$title}}
                                @endif
                            </li>
                            @if(!empty(Request::segment(2)))
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                            @endif
                        @endif
                    </ol>
                </nav>
            </div>

            <div class="p-2">
                <div class="content" style="min-height: 50vh">
                    @yield('content')
                </div>

                <div class="main-footer bg-gray " style="margin-left: 0; border-radius: 0 0 20px 20px ;">
                    <div class="text-center">
                        <span class="text-center">Copyright &copy; {{date('Y')}}</span>
                    </div>

                </div>
            </div>

        </div>
        <!-- Scripts -->
    </div>
</body>

<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/jquery.js') }}" ></script>
@yield('scripts')
</html>
