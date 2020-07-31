@extends('layouts.home')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
@section('content')


<div class="outer-welcome-vehicle outer-welcome-car homeSlider" style="background-color: #f8ac19; margin-bottom: -30px;">
    <div id="homeSlider" class="carousel slide" data-ride="carousel" style="margin-top: 150px;">
        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <!--    Link Here   -->
                <img src="public/uploads/ab-OFFER40_(1)1593408160.png" alt="Slider"
                        height="541" width="1700" />
                <!--    Slider Caption START Here   -->
                <div class="carousel-caption hide">
                    <div class="container maxWidth1330">
                        <div>
                        </div>
                    </div>
                </div>
                <!--    Slider Caption END Here -->

            </div>
            <div class="item ">
                <!--    Link Here   -->
                <img src="public/uploads/ab-ab-Mobily_Neqati_Program15911869571591271451.png"
                        alt="Slider" height="541" width="1700" />
                <!--    Slider Caption START Here   -->
                <div class="carousel-caption ">
                    <div class="container maxWidth1330">
                        <div>
                            <p>.</p>
                        </div>
                    </div>
                </div>
                <!--    Slider Caption END Here -->

            </div>
            <div class="item ">
                <!--    Link Here   -->
                <img src="public/uploads/ab-Mobily_Neqati_Program_copy1591259111.png"
                    alt="Slider" height="541" width="1700" />
                <!--    Slider Caption START Here   -->
                <div class="carousel-caption hide">
                    <div class="container maxWidth1330">
                        <div>
                        </div>
                    </div>
                </div>
                <!--    Slider Caption END Here -->

            </div>
            <div class="item ">
                <!--    Link Here   -->
                <img src="public/uploads/ab-unlimited_km1593409198.png" alt="Slider" height="541"
                    width="1700" />
                <!--    Slider Caption START Here   -->
                <div class="carousel-caption hide">
                    <div class="container maxWidth1330">
                        <div>
                        </div>
                    </div>
                </div>
                <!--    Slider Caption END Here -->

            </div>
            <div class="item ">
                <!--    Link Here   -->
                <img src="public/uploads/ab-arb_b1585656910.png" alt="Slider" height="541"
                    width="1700" />
                <!--    Slider Caption START Here   -->
                <div class="carousel-caption hide">
                    <div class="container maxWidth1330">
                        <div>
                        </div>
                    </div>
                </div>
                <!--    Slider Caption END Here -->

            </div>
            <div class="item ">
                <!--    Link Here   -->
                <img src="public/uploads/ab-ab-Alfursan-Banner15572298851558439706.png"
                    alt="Slider" height="541" width="1700" />
                <!--    Slider Caption START Here   -->
                <div class="carousel-caption hide">
                    <div class="container maxWidth1330">
                        <div>
                        </div>
                    </div>
                </div>
                <!--    Slider Caption END Here -->

            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#homeSlider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#homeSlider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
    <div class="container rent-zone-search noDelivery" style="margin-bottom: 25px;">
        <div class="row searchBarSec">
            {!! Form::open(['method'=>'GET', 'action' => 'RentalCarsController@choose_car' ,'class'=>'rent-zone-search serFormArea'])  !!}
                <!-- <div class="col-md-2"> -->
                    <!-- <h1 class="homepagetitle">{!! trans('home.Fast_and_easy_to_rent_a_car') !!}</h1> -->
                    @include('includes.form-errors')
                <!-- </div> -->
                <div class="col-md-2 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::label('branch_pickup', Lang::get('home.Pickup_Location')) !!}
                        {!! Form::select('branch_pickup', $branches, null, ['class' => 'form-control required backLocation']) !!}
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::label('branch_return', Lang::get('home.Return_Location')) !!}
                        {!! Form::select('branch_return', $branches, null, ['class' => 'form-control required backLocation backSandGrayPlus']) !!}
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::label('pickupDate', Lang::get('home.Pickup_Date')) !!}
                        {!! Form::date('pickupDate', null, ['class' => 'form-control rent-date pickupDate required', 'id'=> 'pickupDate']) !!}
                    </div>
                </div>
                <div class="col-md-1 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::label('time', '') !!}
                        <!-- {!! Form::label('pickupTime', Lang::get('home.Pickup_Time')) !!} -->
                        {!! Form::time('pickupTime', null, ['class' => 'form-control required backSandGrayPlus', 'id'=> 'pickupTime']) !!}
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::label('returnDate', Lang::get('home.Return_Date')) !!}
                        {!! Form::date('returnDate', null, ['class' => 'form-control rent-date returnDate required', 'id'=> 'returnDate']) !!}
                    </div>
                </div>
                <div class="col-md-1 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::label('time', '') !!}
                        <!-- {!! Form::label('returnTime', Lang::get('home.Return_Time')) !!} -->
                        {!! Form::time('returnTime', null, ['class' => 'form-control required backSandGrayPlus', 'id'=> 'returnTime']) !!}
                    </div>
                </div> 
                <div class="col-md-2 col-sm-12 col-update">
                    <div class="form-group">
                        {!! Form::submit(Lang::get('home.rent_a_car'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div> {{-- row --}}
    </div> {{-- container --}}
</div> {{-- outer --}}
@stop
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
     $(document).ready(function(){
        var pickupDate = $("#pickupDate").flatpickr({
            dateFormat: "Y-m-d",
            minDate: "today",
            defaultDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                console.log(selectedDates, dateStr, instance);
                var dReturnDate = new Date(dateStr).fp_incr(3);
                returnDate.set("minDate", dReturnDate);
                returnDate.setDate(dReturnDate);

                //console.log(instance.fp_incr(3));
                //returnDate.minDate = fp_incr(3)
            },        
        }); 
        var returnDate = $("#returnDate").flatpickr({
            dateFormat: "Y-m-d",
            minDate: new Date().fp_incr(3),    
            defaultDate: new Date().fp_incr(3),
        });
    });
    
    // $("#pickupDate").flatpickr({
    //     dateFormat: "Y-m-d",
    //     minDate: "today",
    //     defaultDate: "today"
    // });
    // $("#returnDate").flatpickr({
    //  dateFormat: "Y-m-d",
    //  minDate: new Date().fp_incr(3),
    //  defaultDate: new Date().fp_incr(3),
    //  });
    $("#pickupTime, #returnTime").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "13:45"
    });
</script>
<script>
    $(function(){
        $( "#another-location" ).on("click", function() {
            $( '.branch_return' ).removeClass( "hidden" );
            $(this).addClass( "hidden" );
        });
    });
</script>
@stop