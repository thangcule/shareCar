<header class="Header" role="banner" data-error="Something went wrong. Please try again later.">
    <a href="{{route('home')}}"><img style="width:60px" src="/images/car_logo.png"> Share car! </a>
    <nav class="Header-navigation js-site-menu">
        <ul class="Header-navigationList u-reset u-inlineBlock">
            <li class="Header-navigationItem">
                <a href="{{route('ride.find')}}" class="Header-navigationText">
                    </span><i class="fa fa-search"></i> Find a ride</span>
                </a>
            </li>
            <li class="Header-navigationItem" style="margin-right: 10px;">
                <a href="{{route('ride.schedule')}}" class="Header-navigationText">
                    </span><i class="fa fa-plus"></i> Offer a ride</a>
                </a>
            </li>
            
            @if(Auth::guest())
                <li class="Header-navigationItem">
                    <a href="{{route('register')}}" class="Header-navigationText">Sign up</a>
                </li>

                <li class="Header-navigationItem">
                    <a href="{{route('login')}}" class="Header-navigationText">Log in</a>
                </li>
            @else               
                <li class="Header-navigationItem bla-dropdown">
                    <a href="" class="Header-navigationText dropbtn">
                        </span>{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
                    </a>
                    <div class=" bla-drop-item">
                        <a href="{{ route('user.rides_offered') }}" class="Header-navigationText">Rides offered</a><br>
                        <a href="{{ route('user.rides_booked') }}" class="Header-navigationText">Rides booked</a><br>
                        <a href="{{ route('user.profile') }}" class="Header-navigationText">Profile</a><br>
                        <a href="{{ route('logout') }}" class="Header-navigationText"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                 <style>
                     .bla-dropdown {
                        position: relative;
                        min-width: 
                     }
                    .bla-drop-item {
                        position: absolute;
                        text-align: center;
                        background: #fff;
                        right: 0px;
                        display: none;
                        border: 1px solid #eee;
                    }
                    .bla-drop-item a {
                        padding: 0px 5px;
                        line-height: 40px;
                        border-bottom: 1px solid #eee;
                    }
                    .bla-drop-item a:hover {
                        cursor: pointer;
                    }
                </style>
                <script>
                    $('.bla-dropdown').click(function () {
                        $('.bla-drop-item').css("display", 
                            ($('.bla-drop-item').css("display") == "none") ? "inline-block" : "none");
                    });
                    $('.dropbtn').click(function (e) {
                        e.preventDefault();
                    })
                </script>
            @endif
        </ul>
    </nav>
</header>
