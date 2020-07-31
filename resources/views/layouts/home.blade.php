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
    <!-- Styles -->
    <link href="{{asset('public/css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/all.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('public/css/libs/style.css')}}" rel="stylesheet">
    <!--Styles_add-->
    <!-- Scripts -->
    <script src="{{ asset('js/libs/jquery-2.1.4.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    
    @yield('styles')
</head>
<body class="eng homePage ">
<div  id="app">
    <header>
        <div class="topHeader">
            <div class="topHleft" style="float: right;">
                <ul>
                    <li class="hasDropEd" id="containsLoginDDB">
                        <div class="dropDownEd">
                             <form class="form-horizontal" method="POST" id="login" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <input type="text" placeholder="WRITE (Email \ ID number)" name="email" id="loginUsername"/>
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                <div class="clearfix"></div>
                                <!-- <input type="submit" class="redishButtonRound" value="Login"/> -->
                                <button type="submit" class="redishButtonRound">
                                    {!! trans('home.login') !!}
                                </button>
                                <a href="{{ route('register') }}" class="grayishButton" style="padding-top: 5px;"> {!! trans('home.register') !!}</a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div  style="float: right;">
                            <a href="javascript:void(0);"><img src=" {{asset('public/img/icons/user-logo.png')}}" alt="User"> User Login</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="topHleft" style="float: left;">
                <ul>
                    <li>
                        <a href="tel:+966 11 4617138"> <img src="{{asset('public/img/noIcon.png')}}" alt="No." height="12" width="10"/> +966 11 4617138</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="logoMenuTop">
            <nav class="navbar" style="margin-bottom: 0px;">
                <div class="container maxWidth1330">
                    <div class="navbar-header">
                        <div class="navbar-brand" style = "padding:5 !important; height: 10%">
                            <a href="/"><img src="{{asset('public/img/logo.jpg')}}" alt="Logo" width="170" height="80" /></a>
                        </div>
                    </div>
                </div>
                <div class="navbar-center" style="position: absolute;top: 0;left: 40%;margin-left: -10px;padding-top: 20px;">
                 <h3><i style="color: gray" class="fa fa-phone fa-2x" aria-hidden="true"></i></h3   >          
                </div>
                <div class="navbar-center" style="position: absolute;top: 0;left: 43%;margin-left: -10px;padding-top: 30px;">
                    <div class="caption">
                        <h4><span style="color: #f06e6e" "width: 10%">Customer Support </span><br> 966 11 4617138</h4>
                    </div>        
                </div>

                <div class="collapse navbar-collapse menuRight" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <!-- <a href="javascript:void(0);" class="hasDropEdSecondary">MENU</a> -->
                            <li style="padding-top: 40px; font-size: 20px; color: gray"><a href="{{ route('login') }}">Log in</a></li>

                            <li style="padding-top: 25px;"><a href="{{ route('register') }}"><button type="button" class="btn btn-dark btn-lg" style="color:white; background-color: 
                            #706c6c;">{!! trans('home.register') !!}</button></a></li>
                        </li>

                        <li class="hasDropEd">
                            <a href="javascript:void(0);">
                                <button type="button" class="menuIconT" style="padding-top:70px;">
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
    @yield('content')
    <!-- <div class="container">
        <div class="three-colHome">
            <div class="col">
                <div class="imgBg" style="background-image: url(public/uploads/hm-459x542_b1514890639.jpg);">          

                    <div class="caption">
                        <h2>
                            <span>CAR</span> SELLING </h2>
                        <a href="#" class="btn btn-default">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="imgBg"
                    style="background-image: url(public/uploads/hm-Loyalty_&_Rewards_Pic1524049344.png);">
                    <div class="caption">
                        <h2>LOYALTY <span>Program & Rewards</span></h2>
                        <a href="#" class="btn btn-default">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="imgBg"
                    style="background-image: url(public/uploads/hm-col3Home_31491460688.jpg);">
                    <div class="caption">
                        <h2 class="colorWhite">
                            <span>OUR</span> SERVICES </h2>
                        <a href="#" class="btn btn-default">READ MORE</a>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
    <!-- <div class="container why-us">
        <h1 class="homepagetitle text-center">{!! trans('home.why_choose_us') !!}</h1>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> 15 Years of success </h4>
                    <div class="content">
                        <p>15 Years of successfully renting experience with major companies</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> Friendly flexible </h4>
                    <div class="content">
                        <p>We are friendly and flexible on all renting issues</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> Special offer </h4>
                    <div class="content">
                        <p>Special offer prices on long term contracts</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-child" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> Delivery to the specified location </h4>
                    <div class="content">
                        <p>Our service includes collection of vehicles from your location as well as delivery to the specified location </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> All vehicles with comprehensive </h4>
                    <div class="content">
                        <p>Our all vehicles with comprehensive insurance with neat and clean condition</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box">
                <div class="icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="icon-text">
                    <h4 class="title heading-font"> trustful service </h4>
                    <div class="content">
                        <p>We ensure a trustful service than anyone else</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="why" style=" background-color: #f8f8f8;">
        <h3 style="text-align: center;color: grey; margin-bottom:0px;padding-top: 20px; ">Why choose Us</h3>
        <hr style="border-top: 3px dashed orange; width: 13%; margin-bottom: 5px;">
        <div class="row">
            <div class="col-md-6" style="max-width: 40%;
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            margin-top: 20px;
                                            margin-left: 90px;">
                    <h4 style="color: black; text-align: center;"><b>15 Years of success</b></h4>
                    <h4 style="text-align: center; margin-left: -10px; padding-right:40px;">15 Years of successfully renting experience with major companies</h4>
                    <i class="fa fa-thumbs-o-up fa-5x" aria-hidden="true" style="float: right; margin-top:-70px; margin-right: -20px; color: grey;"></i>
            </div>
            <div class="col-md-6" style="max-width: 40%;
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            margin-top: 20px;
                                            margin-left: 90px;">
                    <h4 style="color: black; text-align: center;"><b>Friendly & flexible </b></h4>
                    <h4 style="text-align: center; padding-left:50px; margin-bottom: 25px;">We are friendly and flexible on all renting issues </h4>
                    <i class="fa fa-trophy   fa-5x" aria-hidden="true" style="float: left; margin-top:-70px; margin-right: -20px; color: grey;"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"style="max-width: 40%;
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            margin-top: 20px;
                                            margin-left: 90px;"> 
                    <h4 style="color: black; text-align: center;"><b>Delivery on location</b></h4>
                    <h4 style="text-align: center; margin-left: -10px; padding-right:40px;">Our service includes collection of vehicles from your location as well as delivery to the specifiedlocation </h4>
                    <i class="fa fa-child fa-5x" aria-hidden="true" style="float: right; margin-top:-70px; margin-right: -20px; color: grey;"></i>
            </div>
            <div class="col-md-6" style="max-width: 40%;
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            margin-top: 20px;
                                            margin-left: 90px;">
                    <h4 style="color: black; text-align: center;"><b>Special offer </b></h4>
                    <h4 style="text-align: center; padding-left:50px; margin-bottom: 25px;">Special offer prices on long term contract</h4>
                    <i class="fa fa-map-marker fa-5x" aria-hidden="true" style="float: left; margin-top:-70px; margin-right: -20px; color: grey;"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="max-width: 40%;
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            margin-top: 20px;
                                            margin-left: 90px;">
                    <h4 style="color: black; text-align: center;"><b>Comprehensive Insurance </b></h4>
                    <h4 style="text-align: center; margin-left: -20px; padding-right:40px; ">Our all vehicles with comprehensive insurance    
                    with neat and clean condition</h4>
                    <i class="fa fa-cog fa-5x" aria-hidden="true" style="float: right; margin-top:-70px; margin-right: -20px; color: grey;"></i>
            </div>
            <div class="col-md-6" style="max-width: 40%;
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            margin-top: 20px;
                                            margin-left: 90px;">
                    <h4 style="color: black; text-align: center;"><b>Trustful service</b></h4>
                    <h4 style="text-align: center; padding-left:50px; margin-bottom: 25px;  ">We ensure a trustful service than anyone else</h4>
                    <i class="fa fa-phone fa-5x" aria-hidden="true" style="float: left; margin-top:-70px; margin-right: -20px; color: grey;"></i>
            </div>
        </div>
<hr style="border-top: 1px solid orange;">
</div>

<!-- <main id="main" class="mainHomeEd">
    <div class="container maxWidth1330" >
         <h1 class="homepagetitle text-center">WHO WE ARE</h1>
        <article class="intro" style="display: inline-block;">
            <div class="desc">
                <p>Ahmed awad Al Anazi Rent a car ,known as On spot  has been in operation since 2007 in Riyadh and we have a proud history of offering different types of vehicles to customers in the Central Province of the Kingdom. Our company offers fantastic cars to make your journey comfortable. If you are looking for a rental car or are in the market for a new or used vehicle, let us know. We’re here for customer satisfaction and strive to offer a wide variety of services to better meet our customers’ needs. We offer numerous models suitable for any taste or style and at a price that you can’t beat. Our aim is to satisfy every customer and your no exception.</p>
            </div>
            <div class="clearfix"></div>
        </article>
    </div>
</main> -->
<!-- <section class="social-block">
    <div class="container maxWidth1330">
        <div class="col">
            <strong class="title">FOLLOW OUR</strong>
            <h3>SOCIAL MEDIA</h3>
            <ul class="social-networks">
                <li><a href="https://www.facebook.com" target="_blank" class="facebook"></a></li>
                <li><a href="https://twitter.com" target="_blank" class="twitter"></a></li>
                <li><a href="https://www.linkedin.com" target="_blank" class="linkedin"></a></li>
                <li><a href="https://www.instagram.com" target="_blank" class="instagram"></a></li>
            </ul>
        </div>
        <div class="col">
            <strong class="title">Subscribe to our</strong>
            <h3>Newsletter</h3>
            <form class="newsLetter" action="" method="post"
                onsubmit="return false;">
                <input id="news_letter" type="email" placeholder="Email" name="news_letter" />
                <input type="button" onclick="subscribe_news_letter($('#news_letter').val());" class="btn-contact"
                    value="Subscribe" />
            </form>
        </div>
        <div class="col">
            <strong class="title hide">CONTACT 24/7</strong>
            <h3 style="margin-top: 15px;">TOLL NUMBER</h3>
            <div class="contact-details">
                <a href="tel:+966114617138" class="tel">+966 11 4617138</a>
                <span class="or">OR</span>
                <a href="" class="btn-contact">REQUEST A CALL</a>
            </div>
        </div>
        
    </div>
</section> -->
<section class="social-block" style="background-color: white; margin-top: -20px;">
    <div class="container maxWidth1330">
        
        <div class="col" style="width: 45%">
            
            <h3 style="color: black; margin-left:30px;">Newsletter</h3>
            <strong class="title" style="margin-left: 30px; color: gray; opacity: 20px; font-size: 130%;">Signup for our Newsletter and get best Offers</strong>
        </div>
        <div class="col" style="min-height: 0px;position:static !important; width: 45%;box-shadow: rgba(223,223,223,1);webkit-box-shadow: 0 4px 4px rgba(223, 223, 223, 1);text-transform: lowercase;">
            <form class="newsLetter" action="" method="post"
                onsubmit="return false;" style="box-shadow: rgba(223,223,223,1); opacity: 20px; font-size: 100%;text-transform: lowercase;">
                <input id="news_letter" type="email" placeholder="Enter Your Email Here" name="news_letter" style="opacity: 10px; font-size: 100%; text-transform: lowercase;" />
                <input type="button" onclick="subscribe_news_letter($('#news_letter').val());" class="btn-contact"
                    value="Subscribe" />
            </form>
        </div>
        </div>
        <hr style="border-top: 1px solid orange;">  
</section>
<!-- <footer id="footer-main">
    <div class="footerLinks">
        <div class="container">
            <div class="quickLinkTxt">
                Quick<br>Links            
            </div>
            <ul>
                <li><a href="#">about us</a></li>
                <li><a href="#">services</a></li>
                <li><a href="#">Offers</a></li>
                <li><a href="#">contact us</a></li>
                <li><a href="#">car selling</a></li>
                <li><a href="#">Registration</a></li>
                <li><a href="#">Corporate Sales</a></li>
            </ul>          
        </div>
    </div>
    <div class="footerCopyRight">
        <div class="container">
            <p class="copyText">COPYRIGHTS 2020. ALL RIGHTS RESERVED .</p>
            <ul>
                <li><a href="https://artxad.com" target="_blank">Designed and developed by art Artxad and designed agency</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</footer> -->
<footer id="footer-main">
    <div class="footerLinks">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset('public/img/logo.jpg')}}" alt="Logo" width="190" height="95" style="margin-top: -40px; margin-left: -45px; text-align: center;" />                
                </div>
                <div class="col-md-6" style="text-align: center;margin-top: -40px;">
                    <ul>
                    <li ><a href="{{ url('/aboutus') }}" style="font-size: 200%;color: black; margin-left: -400px; ">About Us</a></li>
                    <li ><a href="{{ url('/t&c') }}" style="font-size: 200%;color: black; margin-left: -150px;">Terms & Conditions</a></li>
                    <li ><a href="{{ url('/contactus') }}" style="font-size: 200%;color: black; margin-right: 20px; margin-left: 30px;">ContactUs</a></li>
                    </ul>
                    <ul>
                        <br><br>
                         <h4 style="color: black; margin-left: -150px; margin-top: 40px;">
                         Copyright@2020onspotsa.com. All right reserved<br>
                         Designed and developed by Artxad.com</h4>
                         <img src="{{asset('public/img/artxad.jpeg')}}" alt="Logo" width="240" height="120" style="margin-top: -10px; margin-left:-90px; margin-bottom: -80px;">
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="title" style="color: black;font-size: 150%; text-align: center;margin-top: -30px; margin-right: -150px;">FOLLOW OUR <br>SOCIAL MEDIA
                    </h3>
                    <ul>
                    <li style="margin-left: -50px;"><i class="fa fa-facebook-square fa-5x" aria-hidden="true"></i></li>
                    <li style="margin-left: 30px;"><i class="fa fa-instagram fa-5x" aria-hidden="true"></i></li>
                    <li style="margin-left: 30px;"><i class="fa fa-twitter-square fa-5x" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
            
    <br>
    <br><br>
</footer>
<script src="{{asset('js/script.js')}}"></script>
@yield('footer')
</body>
</html>


