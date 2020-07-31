@extends('layouts.app')
@section('styles')
    <link rel='stylesheet' id='qlwapp-css'  href='https://artxad.com/wp-content/plugins/wp-whatsapp-chat/assets/frontend/css/qlwapp.min.css?ver=4.6.6' type='text/css' media='all' />
    <style>
.container1{
     max-width: 95%;
    border-radius: 18px;
    padding: 20px 30px;
    box-shadow: 0px 2px 4px 2px #ccc;
    margin: 20px auto;
    background-color: #fff;
    margin-top: 20px;
    }
    .row-custom{
      display: flex;
    }
   .grid-50 {
    flex-basis: 50%;
}
</style>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="bookingStepsLink" style="margin-top: 40px;">
                <ul>                
                    <li>
                        <div><span>01</span> Select a Vehicle</div>
                    </li>
                    <li>
                        <div><span>02</span> Price &amp; Extras</div>
                    </li>
                    <li class="active">
                        <div><span>03</span> Payment</div>
                    </li>
                </ul>
            <div class="clearfix"></div>
            </div>
        </div>
    </div>
<div class="container1">
    {!! Form::open(['method' => 'POST', 'action' => 'RentalCarsController@store','id'=>'final-step-form', 'files'=>true]) !!}
    @include('includes.form-errors')
    <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
    <input type="hidden" name="branch_return" value="{{$branch_return}}">
    <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
    <input type="hidden" name="returnDate" value="{{$returnDate}}">
    <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
    <input type="hidden" name="returnTime" value="{{$returnTime}}">
    <input type="hidden" name="car_id" value="{{$car_id}}">
    @php ($date1=date_create($pickupDate))
    @php ($date2=date_create($returnDate))
    @php ($diff=date_diff($date1,$date2))
    @php ($days=$diff->format("%a"))
    @if($days == 0)
        @php ( $days = 1 )
    @endif
    <div class="car-details" >
       <!--  <div class="col-md-6 car_details">
            <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.FINISH') !!}</button>
            @foreach($cars as $car)
                @if($car->id == $car_id)
                    @php ($total_price = $days * $car->price_per_day_car)
                    <h1 class="car-name">{{$car->type->name}} {{$car->name}} Rental</h1>
                    <p class="days"> {!! trans('home.Rent_for') !!} <strong>{{$days}}</strong> day/s <strong class="pull-right">{{$days * $car->price_per_day_car}} SAR</strong></p>
                    <p class="days">Tax(15%)<strong class="pull-right">{{$days * $car->price_per_day_car*0.15}} SAR</strong></p>
                    <br>
                    <h3 class="total">{!! trans('home.Total_price') !!}: <span class="pull-right">{{($days * $car->price_per_day_car)*1.15}} SAR</span></h3>
                @endif
            @endforeach
        </div> -->
        <div class="col-md-12 user_details">
            <!-- <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.Personal_Data') !!}</button> -->
            @if(Auth::user())
            <p>{!! trans('home.Name_and_Surname') !!}: {{Auth::user()->name}}</p>
            @if(Auth::user()->address)
                <p>{!! trans('home.Address') !!}:  {{Auth::user()->address}}</p>
            @endif
            @if(Auth::user()->phone)
                <p>{!! trans('home.Phone') !!}:  {{Auth::user()->phone}}</p>
            @endif
            @if(Auth::user()->email)
                <p>Email:  {{Auth::user()->email}}</p>
            @endif
            @else
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <!-- <div class="row"> -->
                    <!-- <div class="form-group col-md-6">
                        {!! Form::label('city', Lang::get('home.City')) !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    </div> -->
                    <!-- <div class="form-group col-md-6">
                        {!! Form::label('phone', Lang::get('home.Official_phone_number')) !!}
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div> -->
                <!-- </div> -->
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('flight_number', Lang::get('home.Contact_number')) !!}
                        {!! Form::text('flight_number', null, ['class' => 'form-control']) !!}
                    </div>
                <!-- </div> -->
                <!-- <div class="row"> -->
                    <div class="form-group col-md-6">
                        {!! Form::label('reservation_info', Lang::get('home.Mobile_number')) !!}
                        {!! Form::text('reservation_info', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('password', Lang::get('home.Password')) !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('password_confirmation', Lang::get('home.Password_Confirm')) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('password', Lang::get('home.Read_Agreed')) !!}
                    </div>
                </div>
                <div class="row">
                    <label class="checkboxes-final-form">
                    <div class="form-group col-md-12 checkbox-inline">
                        {!! Form::checkbox('terms_condition', null, null, ['class' => 'checkboxe-final-form']) !!}<span class="checkmark"></span>
                        {{ Lang::get('home.Terms_Conditions') }}
                    </div>
                    </label>
                <!-- </div> -->
                <!-- <div class="row"> -->
                    <label class="checkboxes-final-form">
                        <div class="form-group col-md-12 checkbox-inline">
                            {!! Form::checkbox('personal_data', null, null, ['class' => 'checkboxe-final-form']) !!}<span class="checkmark"></span>
                            {{ Lang::get('home.Personal_Data_Policy') }}
                        </div>
                    </label>
                </div>
            @endif
                
        </div>
    </div>
    <div class="row car-details-row">
        <input type="hidden" name="price" value="{{$total_price + $dislocation + $over_time +$garantie_total}}">
    </div>
    
</div>
    <div class="form-group text-right" style=" margin-top: -50px; margin-right: 180px;border-radius: 18px;">
         {!! Form::submit(Lang::get('home.Payment_on_pickup'), ['class' => 'btn btn-primary btn-contact']) !!}
    </div><br><br><br><br><br><br>
    {!! Form::close() !!}
    <div id="qlwapp" class="qlwapp-free qlwapp-bubble qlwapp-bottom-right qlwapp-all qlwapp-rounded">
        <div class="qlwapp-container">
            <a class="qlwapp-toggle" 
           data-action="open" 
           data-phone="966507307382" 
           data-message="Hello!" href="javascript:void(0);" target="_blank">
                <i class="qlwapp-icon qlwapp-whatsapp-icon"></i>
                <i class="qlwapp-close" data-action="close">&times;</i>
                <span class="qlwapp-text">How can I help you?</span>
            </a>
        </div>
    </div>
    <script type='text/javascript' src='https://artxad.com/wp-content/plugins/wp-whatsapp-chat/assets/frontend/js/qlwapp.min.js?ver=4.6.6'></script>
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
@stop
