@extends('layouts.app_default')
	
@section('content')
	<div class="Layout-content">
	    <div class="Home u-flex">
            <div class="HomeBlock-inner">
				<h2>Secured payment</h2>
				
				<div style="clear: both;"></div>
				<div class="row publication">
					<form action="/bookmark/store" method="post">
						{{ csrf_field() }}
						<div class="col-sm-8">
							<div class="bla-box">
								<h3 class="bla-box-title">Bookmark summary</h3>
								<div class="">
									<div class="pull-left">{{$seats}} seats x {{$price}} đ</div>
									<div class="pull-right">{{$price*$seats}} đ</div>
								</div>
								<div class="">
									<div class="pull-left">Service fees</div>
									<div class="pull-right">{{$price*$seats*0.05}} đ</div>
								</div>
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="bla-box-right">
								Ride summary
							</div>
							<div class="bla-box-right">
								<div>
									<span><i class="fa fa-clock"></i> {{\App\Lib\Date::date2Text($ride->start_date)}} {{$ride->start_time}}</span>
								</div>
								<div>
									<span><i class="fa fa-clock"></i> {{$choose_pick_up}}</span>
								</div>
								<div>
									<span><i class="fa fa-clock"></i> {{$choose_drop_off}}</span>
								</div>
								<div>
									<span><i class="fa fa-clock"></i> {{$summary['dist']}} miles {{$summary['time']}}</span>
								</div>
							</div>
						</div>
						<button class="bla-btn" type="submit">Books now</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop