@extends('layouts.app_default')
	
@section('content')
<div class="container" style="background-color:white;width:70%">
    <ul style="margin-top:20px" class="menu-ul">
        <li class="menu-li menu-li-a">
            <a href="{{ route('user.rides_offered') }}" class="menu-li-a" href="#ridesoffer">Rides offered</a>
        </li>
        <li class="menu-li menu-li-a">
            <a href="{{ route('user.rides_booked') }}" class="menu-li-a" href="#ridesbook">Rides booked</a>
        </li>
        <li class="menu-li menu-li-a menu-active">
            <a href="{{ route('user.profile') }}" class="menu-li-a" href="#profile" style="color:gray"><b>Profile</b></a>
        </li>
        <li class="menu-li menu-li-a">
            <a class="menu-li-a" href="#money">Money</a>
        </li>
    </ul>
    <div class="Layout-content">
        <div class="Home u-flex">
            <div class="HomeBlock-inner" >
                <div style="margin-left: 18%; width: 60%">
                    <h2 style="text-align:center;color:gray">Your personal information</h2><hr>
                    
                    <form class="form-horizontal" method="POST" action="{{ route('user.profile') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" class="bla-input" name="name" value="{{ empty(old('name')) ? $user->name : old('name') }}" autofocus placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <input id="phone" type="text" class="bla-input" name="phone" value="{{ empty(old('phone')) ? $user->phone : old('phone') }}"  autofocus placeholder="Phone">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">          
                            <button class="bla-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection