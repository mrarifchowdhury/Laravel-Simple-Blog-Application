<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog Crud Example') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custome Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">


    <!-- popper Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    My Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item">
                                <a class="nav-link text-danger font-weight-bold" href="{{ url('blogs/add') }}">{{ __('Post Your Blog') }}</a>
                            </li>


                            @if (url()->current() === url('/'))
                                <li class="nav-item">
                                    <a class="nav-link text-info " href="{{ route('Dashboard') }}">{{ __('Go to Dashboard') }}</a>
                                </li>

                            @elseif (url()->current() === url('/Dashboard'))
                                <li class="nav-item">
                                    <a class="nav-link text-success " href="{{ url('/') }}">{{ __('Go Back to Home Page') }}</a>
                                </li>

                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-info " href="{{ route('Dashboard') }}">{{ __('Go to Dashboard') }}</a>
                                </li>
                            @endif
                            
                            
                            @if ( !empty($editdata) &&  url()->current() === url('/blog/'.$editdata->id.'/edit') )
                                <li class="nav-item">
                                    <a class="nav-link text-warning  " href="{{ route('allblogs') }}">{{ __('View Blogs') }}</a>
                                </li>
                            @endif

                            @if ( !empty($data) &&  url()->current() === url('/blog-details/'.$data->id) )
                                <li class="nav-item">
                                    <a class="nav-link text-warning  " href="{{ route('allblogs') }}">{{ __('Edit Blogs') }}</a>
                                </li>
                            @endif


                        
                            
                            
                            
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



<!-- Jquery Scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>


@yield('SummernoteScriptAndCss')
</body>

</html>
