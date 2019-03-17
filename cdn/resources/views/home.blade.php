@extends('layouts.app_default')
    
@section('content')
    <div class="Layout-content">
    <div class="Home u-flex">
        <article id="homepage-block-main" class="HomeBlock HomeBlock-main">
            <div class="HomeBlock-image" style="background-image: url('/images/advert.jpg');">
                <div class="HomeBlock-form">
                    <div class="HomeBlock-inner">
                        <h1 class="HomeBlock-title u-white" style="margin-top: 150px; color: "></h1>
                        <div class="HomeBlock-content">
                            <p class="HomeBlock-contentText u-white u-alignCenter" ></p>                           
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="HomeBlock u-lighterGray-bg u-darkGray" id="homepage-block-axes">
            <div class="HomeBlock-inner">
                
                <h2 class="HomeBlock-title">Before customer's feedback <a href="{{route('ride.find')}}" class="btn btn-link">Try our service</a></h2>
                    
                <div class="HomeBlock-content u-paddingNone">
                    <style>
                        .HomeBlock-axis {height: 200px; margin: 5px;}
                    </style>
                    <ul class="u-reset u-clearfix HomeColumns">
                        <li class="HomeColumn">
                            <img src="/images/advert1.jpg" class="HomeBlock-axis">
                        </li>
                        <li class="HomeColumn">
                            <img src="/images/advert1.jpg" class="HomeBlock-axis">
                        </li>
                        <li class="HomeColumn">
                            <img src="/images/advert1.jpg" class="HomeBlock-axis">
                        </li>

                        {{-- <li class="HomeColumn">
                            <a href="/ride-sharing/london/manchester/" class="HomeBlock-axis">
                                <span class="u-truncate HomeBlock-axisCity HomeBlock-axisCity--departure">London</span>
                                <span class="u-truncate HomeBlock-axisCity HomeBlock-axisCity--arrival">Manchester</span>
                                <span class="HomeBlock-axisPrice">prices from <strong>£14</strong></span>
                            </a>
                        </li>
                        <li class="HomeColumn HomeColumn--middle">
                            <a href="/ride-sharing/edinburgh/newcastle-upon-tyne/" class="HomeBlock-axis">
                                <span class="u-truncate HomeBlock-axisCity HomeBlock-axisCity--departure">Edinburgh</span>
                                <span class="u-truncate HomeBlock-axisCity HomeBlock-axisCity--arrival">Newcastle</span>
                                <span class="HomeBlock-axisPrice">prices from <strong>£8</strong></span>
                            </a>
                        </li>
                        <li class="HomeColumn">
                            <a href="/ride-sharing/bristol/london/" class="HomeBlock-axis">
                                <span class="u-truncate HomeBlock-axisCity HomeBlock-axisCity--departure">Bristol</span>
                                <span class="u-truncate HomeBlock-axisCity HomeBlock-axisCity--arrival">London</span>
                                <span class="HomeBlock-axisPrice">prices from <strong>£8</strong></span>
                            </a>
                        </li> --}}
                    </ul>

                    <section class="HomeColumns u-clearfix u-hide" data-js="seo-axes" id="seo-axes">
                        <div class="SeoAxes HomeColumn">
                            <ul class="u-reset">
                                <li>
                                    <a class="HomeBlock-axis HomeBlock-axis--small" href="/ride-sharing/london/manchester/">
                                        <span class="u-truncate u-block">London » Manchester</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="HomeBlock-axis HomeBlock-axis--small" href="/ride-sharing/manchester/london/">
                                        <span class="u-truncate u-block">Manchester » London</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="HomeBlock-axis HomeBlock-axis--small" href="/ride-sharing/birmingham/london/">
                                        <span class="u-truncate u-block">Birmingham » London</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </article>

        <article class="HomeBlock u-lightestGray-bg u-darkGray" id="homepage-block-driver">
            <div class="HomeBlock-inner">
                <div class="HomeBlock-media HomeBlock-media--primary" style="margin: 50px 0px;">
                    <div class="HomeBlock-image" style="background-image: url(https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/rebranding/homeblock_driver_desktop.jpg);" aria-hidden="true">
                    </div>
                    <div class="HomeBlock-content HomeBlock-content--even">
                        <h2 class="HomeBlock-title">Where do you want to drive to?</h2>
                        <p class="u-marginNone u-space-4">Let's make this your least expensive journey ever.</p>
                        <a href="{{route('ride.schedule')}}" class="Home-button Home-button--short c-button c-button--primary c-button--wide">Offer a ride</a>
                    </div>
                </div>
            </div>
        </article>

        <article class="HomeBlock u-darkGray" id="homepage-block-hiw">
            <div class="HomeBlock-inner">
                <h2 class="HomeBlock-title HomeBlock-title--extraPadding">Go literally anywhere.<br>
                    From anywhere. 
                </h2>
                <div class="HomeBlock-content u-paddingNone">
                    <ol class="HomeColumns u-clearfix">
                        <li class="HomeColumn HomeColumn--smaller">
                            <h3 class="HomeBlock-title HomeBlock-title--secondary">Smart</h3>
                            <p class="u-gray u-marginNone">With access to millions of journeys, you can quickly find people nearby travelling your way.</p>
                        </li>
                        <li class="HomeColumn HomeColumn--smaller HomeColumn--middle">
                            <h3 class="HomeBlock-title HomeBlock-title--secondary">Simple</h3>
                            <p class="u-gray u-marginNone">Select who you want to travel with.</p>
                        </li>
                        <li class="HomeColumn HomeColumn--smaller">
                            <h3 class="HomeBlock-title HomeBlock-title--secondary">Seamless</h3>
                            <p class="u-gray u-marginNone">Get to your exact destination, without the hassle. Carpooling cuts out transfers, queues and the waiting around the station time. </p>
                        </li>
                    </ol>
                </div>
            </div>
        </article>
    </div>
</div>
@endsection

