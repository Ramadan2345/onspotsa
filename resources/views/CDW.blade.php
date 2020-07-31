@extends('layouts.app')
<style>
.intro{
     max-width: 100%;
    border-radius: 18px;
    padding: 20px 30px;
    box-shadow: 0px 2px 4px 2px #ccc;
    margin: 20px auto;
    background-color: #fff;
    margin-top: 40px;
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
        
         <img src="{{asset('public/img/logo.jpg')}}" alt="Logo" width="180" height="120" style="margin-left: 500px;">
        <article class="intro" style="display: inline-block;">
            <div class="desc">
                <h3>What Is Collision Damage Waiver?</h3>
                <p>A collision damage waiver (CDW) is additional insurance coverage offered to an individual renting an automobile. A collision damage waiver is optional, with the cost of
                the waiver dependent on a variety of factors, including the type of rental car and
                where the car is being driven. The waiver typically covers losses from the theft of or
                damage to a rental car but is unlikely to cover bodily injury caused by an accident.</p><br>
                <p>
                    Understanding Collision Damage Waiver (CDW)
                    Car rental customers that purchase a collision damage waiver pay an additional daily
                    fee on top of the rental car fee. The CDW provides a level of protection for the renter
                    that covers damage to the rental car. If the car is damaged then the renter is not
                    responsible for some or all repairs, as well as for any loss of use fees that may accrue
                    while the rental car is being repaired.
                </p><br>
                <p>
                    Collision damage waivers are often offered by car rental companies on multiple occasions during the rental process. Renters are typically offered a CDW when they reserve
                    the automobile, as well as during the process of picking up the rental car at the rental
                    counter at the airport through a sales process. In most cases, the renter has to specifically indicate that he or she is declining the optional coverage. 
                </p>


            </div>
            <div class="clearfix"></div>
        </article>
    </div>
</main>