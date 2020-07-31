@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <br>
        <br>
        <br>
        <div class="bookingStepsLink">
            <ul>                
                <li>
                    <div><span>01</span> Select a Vehicle</div>
                </li>
                <li class="active">
                    <div><span>02</span> Price &amp; Extras</div>
                </li>
                <li>
                    <div><span>03</span> Payment</div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
<div class="container">
    {!! Form::open(['method' => 'GET', 'action' => 'RentalCarsController@final_step','id'=>'additional-services-form', 'files'=>true]) !!}
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
    <div class="row car-details-row">
        
        <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 car_details" style="float: right; margin-top: 30px;">
            @foreach($cars as $car)
                @if($car->id == $car_id)
                    <h1 class="car-name">{{$car->type->name}} {{$car->name}} </h1>
                    <p class="days"> {!! trans('home.Rent_for') !!} <strong>{{$days}}</strong> day/s
                    @if($days >= 30)
                     <strong class="pull-right">{{$days * $car->price_per_month_car}} SAR </strong>
                    @else
                     <strong class="pull-right">{{$days * $car->price_per_day_car}} SAR </strong>
                    @endif 
                    </p>
                    
                    <p class="additional-car-services-title"><!-- {!! trans('home.ADDITIONAL_SERVICES') !!} --> EXTRA (CDW)</p>
                    <div id="fulloptions"></div>
                    <!-- <p class="days"> VAT 15% <strong class="pull-right">{{$days * $car->price_per_day_car*0.15}} SAR</strong></p> -->
                    <!-- <br>
                    <br>
                    <br>
                    <br>
                    <br> -->
                    <h3 class="total">{!! trans('home.Total_price') !!}: <span class="pull-right">  
                        {{
                            ($days * $car->price_per_day_car)
                        }} SAR</span></h3>
                    <p class="calculate hidden" price="{{$car->price_per_day_car}}" days="{{$days}}"></p>
        </div>
            {{-- cdw --}}   
            @if($car->cdw)
            <br>
            <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.ADDITIONAL_SERVICES') !!}</button><br><br>
            @endif
            <div class="col-md-6 echipamentebox" style="float: left; margin-left: 10px; margin-top: -150px;">
                    <input name="car_cdw" id="echipamente6" class="echipamente hidden" type="checkbox" value="{{$car->cdw * $days}}">
                    <label for="echipamente6">
                        <div class="serviciibox">
                            <div class="col-md-8 zi9 boxleft">
                                <span class="titleechipament titleechipament6" style="color: gray;font-size: 100%;"><!-- {!! trans('home.CDW') !!} -->Collision Damage Waiver (CDW)
                                What is CDW ? <a href="{{ url('/cdw') }}" style="color: red;">Click Here</a> </span>
                                <p price="{{$car->cdw}}" class="echipamentep echipamentep6" style="float: right; margin-right: -200px; font-size: 150%;">{{$car->cdw}} sar / {!! trans('home.Day') !!}</p>
                            </div>

                        </div>
                    </label>
                </div>
    </div>
    <div class="form-group" style="float:center; margin-left: 600px;">
            {!! Form::submit(Lang::get('home.Next_step'), ['class' => 'btn btn-primary']) !!}
        </div>
                @endif
            @endforeach 
    </div>
    @include('includes.form-errors')
    {!! Form::close() !!}
</div>
@stop
@section('footer')
    <script>
        // var nTax = 1.15;
        var price = $('.car_details .calculate').attr('price');
        var days = $('.car_details .calculate').attr('days');

        var dislocation = 0;
        <?php if($branch_return) { ?>
            <?php if($branch_pickup != $branch_return) { ?>
                dislocation = 150;
            <?php } ?>
        <?php } ?>

        var over_time = 0;
        <?php if($over_time_pickup_cond == 1 || $over_time_return_cond == 1) { ?>
            over_time = <?php echo $over_time; ?>
        <?php }  ?>

        $('.boxgarantie').on('click', function () {

            $('.boxgarantie').removeClass('active');
            $(this).addClass('active');

            $('.buttonrezervaclick b').text('CHOOSE');
            $(this).find('.buttonrezervaclick b').text('CHOSEN');

            protection_name = $(this).find('.panel-title').text();
            $('.car-details-row .garantie-car .warranty-name').text(protection_name);

            protection_price = $(this).find('.the-price .the-price-val').text() * days;
            // console.log(protection_price);
            $('.car-details-row .garantie-car .warranty-price').text(protection_price);

            var protection_price = parseInt($('.radio-toolbar .boxgarantie.active').find('.the-price-val').text()) * days;

            var total = (days * price) + dislocation + over_time + protection_price;
            $('input:checkbox:checked').each(function(){
                total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            });
            var total_price = '<?php echo __('home.Total_price') ?>';

            $('.total').html(total_price + "<span class='pull-right'>" + total + " SAR</span>");


        });

        $('.echipamente:checkbox').change(function () {

            var protection_price = parseInt($('.radio-toolbar .boxgarantie.active').find('.the-price-val').text()) * days;

            protection_price = isNaN(protection_price) ? 0 : protection_price;

            var total = parseInt((days * price) + dislocation + over_time + protection_price);
            // total = total * nTax;
            $('input:checkbox:checked').each(function(){
                total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            });
            // total = total * nTax;

            console.log(protection_price);
            console.log("total => "+total);
            var total_price = '<?php echo __('home.Total_price') ?>';
            console.log("Total_price => "+total_price);
            // console.log(total = total * nTax);

            $('.total').html(total_price + "<span class='pull-right'>" + total + " SAR</span>");
        });
        //service6
        var price6 = $('.echipamentep6').attr('price');
        var service6 = $( ".titleechipament6" ).text(); //echipamentep 
        
        $("#echipamente6").click(function() {
            if($('#echipamente6').is(':checked')) {
                console.log("service6 => "+service6);
                console.log("price6 => "+price6);
                console.log("days => "+days);
                $( "#fulloptions" ).append( '<p class="service6">' + service6 + " x " +days + ' <?php echo __('home.Day_s') ?> ' + "<strong class='pull-right'>" + ( price6 * days ) + " SAR</strong>" +  '</p>' );
            } else {
                $( ".service6" ).remove();
            }
        });
    </script>
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