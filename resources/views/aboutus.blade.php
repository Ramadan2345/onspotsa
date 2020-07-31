@extends('layouts.app')
<style>
.container1{
     max-width: 80%;
    border-radius: 18px;
    padding: 20px 30px;
    box-shadow: 0px 2px 4px 2px #ccc;
    margin: 20px auto;
    background-color: #fff;
    margin-top: 15%;
    }
    .row-custom{
      display: flex;
    }
   .grid-50 {
    flex-basis: 50%;
}
</style>
<body class="eng homePage ">
<div  id="app">
    @yield('content')
</div>
<main id="main" class="mainHomeEd">
    <div class="container maxWidth1330" >
        <div class="container1">
         <h1 class="homepagetitle text-center">About Us</h1>
        <article class="intro" style="display: inline-block;">
            <div class="desc">
                <p>Ahmed awad Al Anazi Rent a car ,known as On spot  has been in operation since 2007 in Riyadh and we have a proud history of offering different types of vehicles to customers in the Central Province of the Kingdom. Our company offers fantastic cars to make your journey comfortable. If you are looking for a rental car or are in the market for a new or used vehicle, let us know. We’re here for customer satisfaction and strive to offer a wide variety of services to better meet our customers’ needs. We offer numerous models suitable for any taste or style and at a price that you can’t beat. Our aim is to satisfy every customer and your no exception.</p>
            </div>
            <div class="clearfix"></div>
        </article>
        </div>
    </div>
</main>
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
</section>
<footer id="footer-main">
    <div class="footerLinks">
        <div class="container">
            <div class="quickLinkTxt">
                Quick<br>Links            
            </div>
            <ul>
                <li><a href="{{ url('/aboutus') }}">about us</a></li>
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
<section class="social-block" style="background-color: rgb(250, 250, 250);">
    <div class="container maxWidth1330">
        <!-- <div class="col"> -->
            <!-- <strong class="title">FOLLOW OUR</strong>
            <h3>SOCIAL MEDIA</h3>
            <ul class="social-networks">
                <li><a href="https://www.facebook.com" target="_blank" class="facebook"></a></li>
                <li><a href="https://twitter.com" target="_blank" class="twitter"></a></li>
                <li><a href="https://www.linkedin.com" target="_blank" class="linkedin"></a></li>
                <li><a href="https://www.instagram.com" target="_blank" class="instagram"></a></li>
            </ul> -->
        <!-- </div> -->
        <div class="col" style="width: 45%">
            
            <h3 style="color: black; margin-left:30px;">Newsletter</h3>
            <strong class="title" style="margin-left: 30px; color: gray; opacity: 20px; font-size: 130%;">Signup for our Newsletter and get best Offers</strong>
        </div>
        <div class="col" style="min-height: 0px;position:static !important; width: 45%;box-shadow: rgba(223,223,223,1);webkit-box-shadow: 0 4px 4px rgba(223, 223, 223, 1);">
            <form class="newsLetter" action="" method="post"
                onsubmit="return false;" style="box-shadow: rgba(223,223,223,1); opacity: 20px; font-size: 100%;">
                <input id="news_letter" type="email" placeholder="Enter Your Email Here" name="news_letter" style="opacity: 10px; font-size: 100%;" />
                <input type="button" onclick="subscribe_news_letter($('#news_letter').val());" class="btn-contact"
                    value="Subscribe" />
            </form>
        </div>
        </div>
        <hr style="border-top: 1px solid orange;">

        <!-- <div class="col">
            <strong class="title hide">CONTACT 24/7</strong>
            <h3 style="margin-top: 15px;">TOLL NUMBER</h3>
            <div class="contact-details">
                <a href="tel:+966114617138" class="tel">+966 11 4617138</a>
                <span class="or">OR</span>
                <a href="" class="btn-contact">REQUEST A CALL</a>
            </div>
        </div> -->
        
    <!-- </div> -->
</section>
<footer id="footer-main">
    <div class="footerLinks"  style="background-color: rgb(250, 250, 250);">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset('public/img/logo.jpg')}}" alt="Logo" width="190" height="95" style="margin-top: -40px; margin-left: -45px; text-align: center;" />                
                </div>
                <div class="col-md-6" style="text-align: center;margin-top: -40px;">
                    <ul>
                    <li ><a href="{{ url('/aboutus') }}" style="font-size: 200%;color: black; margin-left: -400px; ">About Us</a></li>
                    <li ><a href="{{ url('/t&c') }}" style="font-size: 200%;color: black; margin-left: -150px;">Terms & Consdtions</a></li>
                    <li ><a href="{{ url('/contactus') }}" style="font-size: 200%;color: black; margin-right: 10px; margin-left: 40px;">ContactUs</a></li>
                    </ul>
                    <ul>
                        <br><br>
                         <h4 style="color: black; margin-left: -150px; margin-top: 40px;">
                         Copyright@2020onspotsa.com. All right reserved<br>
                         Designed and developed by Artxad.com</h4>
                         <img src="{{asset('public/img/artxad.jpeg')}}" alt="Logo" width="240" height="120" style="margin-top: -10px; margin-left:-90px; margin-bottom: -80px; background-color:#f3f1ed; ">

            </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="title" style="color: black;font-size: 150%; text-align: center;margin-top: -30px; margin-right: -150px;">FOLLOW OUR <br>SOCIAL MEDIA
                    </h3>
                    <ul>
                    <li style="margin-left: -130px;"><i class="fa fa-facebook-square fa-5x" aria-hidden="true"></i></li>
                    <li style="margin-left: 40px;"><i class="fa fa-instagram fa-5x" aria-hidden="true"></i></li>
                    <li style="margin-left: 40px;"><i class="fa fa-twitter-square fa-5x" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="quickLinkTxt">
                Quick<br>Links            
            </div>
            <ul>
                <li><a href="{{ url('/aboutus') }}">about us</a></li>
                <li><a href="#">services</a></li>
                <li><a href="#">Offers</a></li>
                <li><a href="#">contact us</a></li> -->
                <!-- <li><a href="#">car selling</a></li> -->
                <!-- <li><a href="#">Registration</a></li>
                <li><a href="#">Corporate Sales</a></li>
            </ul>          
        </div>
    </div> -->
    <br>
    <br><br>
    <!-- <div class="footerCopyRight">
        <div class="container" style="text-align: center; background-color: white; ">
            <p class="copyText">COPYRIGHTS 2020. ALL RIGHTS RESERVED .</p>
            <ul>
                <li><a style="text-align: center;" href="https://artxad.com" target="_blank">Designed and developed by art Artxad and designed agency</a></li>
                <img src="{{asset('public/img/artxad.jpeg')}}" alt="Logo" width="190" height="95" style="margin-top: -40px; margin-left: -45px; text-align: center;" />
            </ul>
            <div class="clearfix"></div>
        </div>
    </div> -->
</footer>
<script src="{{asset('js/script.js')}}"></script>
@yield('footer')
</body>
</html>