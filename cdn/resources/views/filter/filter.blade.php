@extends('layouts.app_default')
	
@section('content')
<div class="Layout-content">
    <div class="Home u-flex">
        <div class="HomeBlock-inner" >
            <div class="HomeBlock-media HomeBlock-media--primary HomeBlock-form" style="margin-left: 20%; width: 60%;">
            	<div class="bla-input bla-box-search">
            		<?php $length = 35; ?> 
            		{{mb_substr($find_pick_up, 0, $length)}} ...&nbsp;
                    <i class="fa fa-arrow-right fa-lg"></i>		
                    &nbsp; {{mb_substr($find_drop_off, 0, $length)}} ... <br>
					<span class="bla-mark">{{$find_start_date}}</span>
                    <a href="{{route('ride.find')}}" class="bla-mark pull-right" style="text-decoration: underline;">Back</a>
            	</div>
            	@foreach($filter_rides as $key => $ride)
            	<div class="bla-box bla-ride-summary" onclick="location.href='/ride/detail/{{$ride->id}}?choose_pick_up={{rawurlencode($ride->choose_pick_up)}}&choose_drop_off={{rawurlencode($ride->choose_drop_off)}}'">
            		<span class="time">{{\App\Lib\Date::date2Text($ride->start_date)}} {{$ride->start_time}}</span>
					<div class="row bla-box-content" style="background: #fff">
						<div class="path col-sm-12">
	                    	{{mb_substr($ride->_pick_up->address, 0, $length)}} ...&nbsp;
	                        <i class="fa fa-arrow-right fa-lg"></i>		
	                        &nbsp; {{mb_substr($ride->_drop_off->address, 0, $length)}} ...
	                        <div class="bla-ride-owner">
	                        	<img src="/images/users/default.png" alt="">
	                        	{{$ride->user->name}}
	                        	<span class="money">{{$ride->path}} đ</span>
	                        </div>
    					  	@if(!empty($ride->_stopover))
    	                    	<span class="bla-mark">Stop-over: </span>
	                        	<span style="font-weight: normal;">{{$ride->_stopover->address}}</span>
            	            @endif
	                    </div>
					</div>
            	</div>
            	@endforeach
			</div>
		</div>
	</div>
</div>
@stop