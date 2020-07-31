<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RentZone</title>
    <link rel="icon" href="{{asset('public/img/favicon.ico')}}" type="image/ico" sizes="16x16">

    <!-- Styles -->
    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    <!-- <nav class="rent-zone-nav navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('public/img/logo-black.png')}}" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">{!! trans('home.rent_a_car_menu') !!}</a></li>
                    <li><a href="{{route('rent-a-bike.search-bike')}}"> {!! trans('home.rent_a_bike_menu') !!}</a></li>
                    <li><a href="{{route('rent-a-moto.search-moto')}}"> {!! trans('home.rent_a_moto_menu') !!}</a></li>
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {!! trans('home.language') !!} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/settings/lang/en">{!! trans('home.english') !!}</a></li>
                            <li><a href="/settings/lang/de">{!! trans('home.german') !!}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <header>
        <div class="topHeader">
            <!-- <div class="topHleft" style="float: right;">
                <ul>
                    <li class="hasDropEd" id="containsLoginDDB">
                        <div class="dropDownEd">
                            <form action="" method="post" id="login" onsubmit="return false;">

                                <input type="text" placeholder="WRITE (Email \ ID number)" name="username" id="loginUsername"/>
                                <input type="password" placeholder="Password" name="password"  id="loginPassword"/>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#forGotPassLogn" style="display: inline-block;">forgot password?</a>

                                <div class="clearfix"></div>

                                <input type="submit" class="redishButtonRound" value="Login"/>
                                <input type="button" onclick="document.location.href=''" class="grayishButton" value="Register"/>

                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <a href="javascript:void(0);"><img src=" {{asset('public/img/icons/man.png')}}" alt="User" height="20" width="20"/> User Login</a>
                    </li>
                </ul>
            </div> -->
            <div class="topHleft" style="float: left;">
                <ul>
                    <li>
                        <a href="tel:+966 11 4617138"> <img src="{{asset('public/img/noIcon.png')}}" alt="No." height="12" width="10"/> +966 11 4617138</a>
                    </li>
                </ul>
            </div>

            <!-- <div class="topLang">
                <span>Select <br/>Language</span>
                <a href="javascript:void(0);" id="arb|" class="changeLanguage" title="Change Site Language">   العربية            </a>
            </div> -->

            <div class="clearfix"></div>
        </div>

        <div class="logoMenuTop">
            <nav class="navbar">
                <div class="container maxWidth1330">
                    <div class="navbar-header">
                        <div class="navbar-brand" style = "padding:0 !important;">
                            <a href="/"><img src="{{asset('public/img/logo.jpg')}}" alt="Logo" width="120" height="50" /></a>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse menuRight" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <a href="javascript:void(0);" class="hasDropEdSecondary">MENU</a>
                        </li>

                        <li class="hasDropEd">
                            <a href="javascript:void(0);">
                                <button type="button" class="menuIconT">
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
    <div class="auth-content">
        @yield('content')
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/script.js')}}"></script>
@yield('footer')
</body>
</html>
