@extends('layouts.app')
@section('styles')
    <link href="{{asset('css/libs/filter-style.css')}}" rel="stylesheet">
@stop
@section('content')

    <div class="container">
        <div class="row">
            <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="four steps steps1">
                    <li class="completed"></li>
                    <li class="completed"><a href="#">1</a><br><span class="stepstext">{!! trans('home.CHOOSE_CAR') !!}</span></li>
                    <li class="text-center"><a href="#">2</a><br><span class="stepstext">{!! trans('home.ADDITIONAL_SERVICES') !!}</span></li>
                    <li><a href="#">3</a><br><span class="stepstext steplast">{!! trans('home.FINISH') !!}</span></li>
                </ul>
            </div> -->

            <div class="bookingStepsLink" style="margin-top: 60px;">
                <ul>                
                    <li class="active">
                        <div><span>01</span> Select a Vehicle</div>
                    </li>
                    <li>
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

    @include('includes.form-errors')

    {!! Form::open(['method' => 'GET', 'action' => 'RentalCarsController@additional_services', 'id'=>'car-rental-form', 'files'=>true]) !!}

    {{--<div class="col-md-12">
        <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.Choose_Car_in') !!} 
        @foreach($branches as $branch)
            @if($branch->id == $branch_pickup)
                {{$branch->name}}
            @endif
        @endforeach
        </button>
    </div>--}}


    <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
    <input type="hidden" name="branch_return" value="{{$branch_return}}">
    <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
    <input type="hidden" name="returnDate" value="{{$returnDate}}">
    <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
    <input type="hidden" name="returnTime" value="{{$returnTime}}">



    @php ($date1=date_create($pickupDate))
    @php ($date2=date_create($returnDate))
    @php ($diff=date_diff($date1,$date2))
    @php ($result=$diff->format("%a"))

    <main class="cd-main-content">
        <div class="vehicles cd-gallery filter-is-visible">
            @if($branch_return)
                @if($branch_pickup != $branch_return)

                    <div class="clearfix "></div>

                    <div style="margin: 0 15px 30px;" class="col-md-12 alert alert-info">
                        <!-- <i class="fa fa-exclamation-circle"></i> -->

                        <strong>
                            @foreach($branches as $branch)
                                @if($branch->id == $branch_pickup)
                                    {{$branch->name}}
                                @endif
                            @endforeach
                        </strong>
                        takeover location is different from the teaching assignment
                        <strong>
                            @foreach($branches as $branch)
                                @if($branch->id == $branch_return)
                                    {{$branch->name}}
                                @endif
                            @endforeach
                        </strong>
                        For this dislocation will be charged a fee of <b>150SAR</b>.
                    </div>
                @endif
            @endif

            <?php

            $interval_start = strtotime('09:00');
            $interval_end = strtotime('18:00');

            $pickup_time = strtotime($pickupTime);
            $return_time = strtotime($returnTime);

            $over_time_pickup = 0;
            $over_time_pickup_cond = 0;

            $over_time_return = 0;
            $over_time_return_cond = 0;

            $over_time = 0;

            if($interval_start <= $pickup_time && $pickup_time < $interval_end) {}
            else { $over_time_pickup = 20; $over_time_pickup_cond = 1; }

            if($interval_start <= $return_time && $return_time < $interval_end) {}
            else { $over_time_return = 20; $over_time_return_cond = 1; }

            $over_time = $over_time_pickup + $over_time_return;
            ?>



            @if($over_time_pickup_cond == 1 || $over_time_return_cond == 1)

                <div style="margin: 0 15px 30px;" class="col-md-12 alert alert-info">
                    <i class="fa fa-exclamation-circle"></i>
                    The chosen time interval exceeds the hours of the program.
                    An Extra Hours fee of
                    <strong>{{$over_time}}$</strong> will apply for this reservation. <br>
                    Schedule: <strong>Monday to Friday from 09:00 to 18:00.</strong>
                    <div class="clearfix"></div>
                </div>

            @endif
            <ul>          
                @foreach($cars as $car)
                    @if($car->branch->id == $branch_pickup) 
                        <li class="mix {{$car->name}} {{$car->type->name}} {{$car->gearbox->name}}">
                            <div class="rental_item @if($car->is_available == 0)disable_car @endif">
                                <div class="wrap_img" style="height: 250px; width: 250px; ">
                                    <div class="relative">
                                        <img class="featured" height="150" src="{{asset($car->photo->file)}}" alt="">
                                        <div class="flex-zone">
                                            <div class="flex-zone-inside">
                                                <a class="button-rent-it" data-toggle="modal" data-target="#exampleModal">{!! trans('home.SELECT_CAR') !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <div class="wrap_btn" style="margin-top: 5px;">
                                            <a href="#" class="btn_price">
                                                <span class="wrap_content">
                                                    <span class="amount">
                                                        <span price="{{$car->price_per_day_car}}" class    ="price-amount" style="font-size: 20px;">    {{$car->price_per_day_car}}
                                                            <span class="currencySymbol">SAR</span>
                                                        </span>
                                                    </span>
                                                        <span class="time" style="font-size: 20px;">/  {!! trans('home.Day') !!} & 
                                                        </span>
                                                        <br>
                                                        <span class="amount">
                                                        <span price="{{$car->price_per_day_car}}" class    ="price-amount" style="font-size: 20px;">    {{$car->price_per_month_car}} 
                                                            <span class="currencySymbol">SAR</span>
                                                        </span>
                                                    </span>
                                                        <span class="time" style="font-size: 20px;">/  {!! trans('home.Day') !!} For Month
                                                        </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3  name="{{$car->id}}" class="title name" style="margin-top: -5px; ">{{$car->name}}</h3>
                                    <div class="car-type" style="text-align: left;"><span>{{$car->type->name}}</span></div>
                                    
                                    <div class="features">
                                        <div class="container-fluid">
                                            <div class="row">
                                                @if($car->ac == 1)
                                                    <div class="feature-item odd"> <img src="{{asset('public/img/icons/ac.png')}}" alt=""><span>A/C</span></div>
                                                @endif
                                                @if($car->gearbox->name)
                                                    <div class="feature-item eve">
                                                        <img src="{{asset('public/img/icons/cog.png')}}" alt=""><span>{{$car->gearbox->name}}</span>
                                                    </div>
                                                @endif
                                                @if($car->fuel->name)
                                                    <div class="feature-item odd">
                                                        <img src="{{asset('public/img/icons/gas-pump.png')}}" alt=""><span>{{$car->fuel->name}}</span>
                                                    </div>
                                                @endif
                                                @if($car->passengers)
                                                    <div class="feature-item eve">
                                                        <img src="{{asset('public/img/icons/man.png')}}" alt=""><span>{{$car->passengers}}</span>
                                                    </div>
                                                @endif
                                                @if($car->capacity)
                                                    <div class="feature-item odd">
                                                        <img src="{{asset('public/img/icons/luggage.png')}}" alt=""><span>{{$car->capacity}}</span>
                                                    </div>
                                                @endif
                                                @if($car->doors)
                                                    <div class="feature-item eve">
                                                        <img src="{{asset('public/img/icons/doors.png')}}" alt=""><span>{{$car->doors}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
             <div class="cd-fail-message">No results found</div>
        </div>

        <!-- <div class="cd-filter filter-is-visible" > -->
                <!-- <div class="cd-filter-block" style="position:relative; "> -->
                    <!-- <h4>SEARCH CAR</h4><br> -->

                    <!-- <a href="#0" class="cd-filter-trigger" style="margin-top: 80px;">CAR FILTER</a> -->

                    <!-- <div class="cd-filter-content">
                        <input type="search" placeholder="Try compact...">
                    </div> --> <!-- cd-filter-content -->
                <!-- </div> --> <!-- cd-filter-block -->

                <!-- <div class="cd-filter-block"> -->
                    <!-- <h4 style="margin-bottom: 50px;">Transmissions</h4>
                    <ul class="cd-filter-content cd-filters list">
                        @foreach($transmissions as $transmission)
                        <li>
                            <input class="filter" data-filter=".{{$transmission->name}}" type="radio" name="radioButton" id="{{$transmission->name}}">
                            <label class="radio-label" for="{{$transmission->name}}"><span>{{$transmission->name}}</span></label>
                        </li>
                        @endforeach
                    </ul> -->
                <!-- </div> -->

                <!-- <div class="cd-filter-block">
                    <h4>Class </h4>
                    <ul class="cd-filter-content cd-filters list">
                        @foreach($types as $type)
                        <li>
                            <input class="filter" data-filter=".{{$type->name}}" type="checkbox" id="{{$type->name}}">
                            <label class="checkbox-label" for="{{$type->name}}"><span>{{$type->name}}</span></label>
                        </li>
                        @endforeach
                    </ul>
                </div> -->

        <!-- </div> --> <!-- cd-filter -->
       <!--  <div class="fil" style="
                                            border-radius: 18px;
                                            padding: 20px 30px;
                                            box-shadow: 0px 2px 4px 2px #ccc;
                                            margin: 20px auto;
                                            background-color: #fff;
                                            "> -->
         <div class="cd-filter filter-is-visible" style="border-radius: 18px;padding: 20px 30px;box-shadow: 0px 2px 4px 2px #ccc;background-color: #fff;">
                <div class="cd-filter-block">
                    <div class="search-title" style="margin-top: -10px;">Car Filter</div>
                </div> <!-- cd-filter-block -->
                <div class="cd-filter-block">
                    <h4>Transmissions</h4>
                    <ul class="cd-filter-content cd-filters list">
                        @foreach($transmissions as $transmission)
                        <li>
                            <input class="filter" data-filter=".{{$transmission->name}}" type="radio" name="radioButton" id="{{$transmission->name}}">
                            <label class="radio-label" for="{{$transmission->name}}"><span>{{$transmission->name}}</span></label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="cd-filter-block">
                    <h4>Class </h4>
                    <ul class="cd-filter-content cd-filters list">
                        @foreach($types as $type)
                        <li>
                            <input class="filter" data-filter=".{{$type->name}}" type="checkbox" id="{{$type->name}}">
                            <label class="checkbox-label" for="{{$type->name}}"><span>{{$type->name}}</span></label>
                        </li>
                        @endforeach
                    </ul>
                </div>

        </div> 
    
        
    </main>

    <input class="car-id required" type="hidden" name="car_id" value="">
    <input type="hidden" name="status" value="0">
    <p class="text"></p>
    <p class="total"></p>
<div class="clearfix"></div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 100%; margin-top: 100px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel" style="font-size: 40px;">Or similar-what does it mean?</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
            </button>
          </div>
          <div class="modal-body">
            Onspot is committed to provide the selected model and model year at the time of booking. If the car is not available at the time of executing the booking, Onspot is committed to provide a car from the same category and same model year or higher. In case a car from the same category is not available, Onspot will upgrade the car to a higher category with no additional cost.
          </div>
          <div class="modal-footer" style="text-align: center;">
            {!! Form::submit(Lang::get('home.Ok'), ['class' => 'btn btn-primary']) !!}
          </div>
        </div>
      </div>
    </div>
    <div id="next-step">
        <div class="form-group">
            {!! Form::submit(Lang::get('home.Next_step'), ['class' => 'btn btn-primary']) !!}
            <hr style="border-top: 1px solid orange;">
        </div>

    </div>
    <!-- <div class="btn btn-primary" style="font-size: 20px; margin-bottom:45px;" data-toggle="modal" data-target="#exampleModal">Book Now</div> -->


    {!! Form::close() !!}

    </div> {{-- container --}}
    

@stop

@section('footer')
    <script src="{{asset('js/libs/modernizr.js')}}"></script>
    <script src="{{asset('js/libs/jquery.mixitup.min.js')}}"></script>
    <script src="{{asset('js/libs/filter-main.js')}}"></script>
    <script>
        $(function() {
            /* parseaza car id si price*/
            $('.vehicles .rental_item').on('click', function(){

                var name = $('.name', this ).attr('name');
                $('.car-id' ).attr( "value", name );

                $('.vehicles .rental_item .flex-zone' ).removeClass( "active");
                $('.vehicles .rental_item .flex-zone .button-rent-it' ).text('<?php echo __('home.SELECT_CAR') ?>');

                $('.flex-zone', this ).addClass( "active");
                $('.flex-zone .button-rent-it',this ).text('<?php echo __('home.SELECTED') ?>');

            });
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
                    <li style="margin-left: -50px;"><i class="fa fa-facebook-square fa-5x" aria-hidden="true"></i></li>
                    <li style="margin-left: 30px;"><i class="fa fa-instagram fa-5x" aria-hidden="true"></i></li>
                    <li style="margin-left: 30px;"><i class="fa fa-twitter-square fa-5x" aria-hidden="true"></i></li>
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