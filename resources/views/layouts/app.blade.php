<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Onspotsa</title>
    <link rel="icon" href="{{asset('public/img/favicon.ico')}}" type="image/ico" sizes="16x16">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/libs/jquery-2.1.4.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    @yield('styles')
</head>
<body>
<div id="app">
    <header>
     

        <div class="logoMenuTop" style="box-shadow: 0px 5px 5px grey;">
            <nav class="navbar" style="margin-bottom: 0px;">
                <div class="container maxWidth1330">
                    <div class="navbar-header ">
                        <div class="navbar-brand col-3" style = "padding:5 !important; height: 10%">
                            <a href="/"><img src="{{asset('public/img/logo.jpg')}}" alt="Logo" width="170" height="80" /></a>
                        </div>
                    </div>
                </div>
                <div class="navbar-center col-1">
                 <h3><i style="color: gray" class="fa fa-phone fa-2x" aria-hidden="true"></i></h3   >          
                </div>
                <div class="navbar-center" style="position: absolute;top: 0;left: 43%;margin-left: -10px;padding-top: 30px;">
                    <div class="caption">
                        <h4><span style="font-family: 'Montserrat', sans-serif;color: #f06e6e" "width: 10%">Customer Support </span><br><p style="color:grey;font-family: 'Montserrat', sans-serif;letter-spacing:3px;"> 966 11 4617138</p></h4>
                    </div>        
                </div>

                <div class="collapse navbar-collapse menuRight" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <!-- <a href="javascript:void(0);" class="hasDropEdSecondary">MENU</a> -->
                            <li style="padding-top: 40px; font-size: 20px; color: gray"><a href="{{ route('login') }}"><p style="font-family: 'Montserrat', sans-serif;">Log in</p></a></li>

                            <li style="padding-top: 25px;"><a href="{{ route('register') }}"><button type="button" class="btn btn-dark btn-lg" style="font-family: 'Montserrat', sans-serif;color:white; background-color: 
                            #706c6c;">{!! trans('home.register') !!}</button></a></li>
                        </li>

                        <li class="hasDropEd ">
                            <a href="javascript:void(0);">
                                <button type="button" class="menuIconT" style="padding-top:40px;">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </a>

                            <div class="dropDownEd">
                                <button type="button" class="menuIconT" id="closeTopMenu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <ul>
                                    <li><a href="{{url('/')}}">{!! trans('home.rent_a_car_menu') !!}</a></li>
                                    <!-- Authentication Links -->
                                    @if (Auth::guest())
                                        <li><a href="{{ route('login') }}"> {!! trans('home.login') !!}</a></li>
                                        <li><a href="{{ route('register') }}"> {!! trans('home.register') !!}</a></li>
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    @if(Auth::user()->role)
                                                        @if(Auth::user()->role->name == 'client')
                                                            <a href="{{ route('user.user-profile') }}">{!! trans('home.My_Profile') !!}</a>
                                                        @endif
                                                        @if(Auth::user()->role->name == 'author')
                                                            <a href="{{ url('/admin/authors') }}/{{Auth::user()->id}}">{!! trans('home.My_Profile') !!}</a>
                                                        @endif
                                                        @if(Auth::user()->role->name == 'administrator')
                                                            <a href="{{ url('/admin/users') }}/{{Auth::user()->id}}/edit">{!! trans('home.My_Profile') !!}</a>
                                                        @endif
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                        {!! trans('home.logout') !!}
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
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
       
    </header>
    <div style="background-color: 	#FFA500;height:10px;"></div>
    @yield('content')
</div>
<script src="{{asset('js/script.js')}}"></script>
@yield('footer')
</body>
</html>
