@extends('layouts.app_default')
	
@section('content')
<style>
	.row { margin: 0px; }
	.HomeBlock-inner h2 { line-height: 0px; }
</style>
	<div class="Layout-content">
	    <div class="Home u-flex">
            <div class="HomeBlock-inner">
            	<h2>Booking new ride</h2>
            	<?php $length = 30;?>
              	<span>{{mb_substr($ride->_pick_up->address, 0, $length)}} ...</span> <i class="fa fa-arrow-right"></i>
            	@if(!empty($ride->_stopover))
            		<span>{{mb_substr($ride->_stopover->address, 0, $length)}} ...</span> <i class="fa fa-arrow-right"></i>
            	@endif
            	<span>{{mb_substr($ride->_drop_off->address, 0, $length)}} ...</span>
            	<div class="row publication">
					<form action="/bookmark/store" method="GET" id="form">
					{{ csrf_field() }}
					<input type="hidden" name="ride_id" value="{{$ride->id}}">
					<div class="col-sm-8 bla-box">
						<div class="bla-box-content bla-ride-detail" style="padding-bottom: 0px; margin-right: 30px;">
							<table>
								<tr class="location">
									<th>Pick-up point</th>
									<td>
										<i class="fas fa-walking fa-lg bla-icon-walk" style="background: #5DD167"></i> 
									</td>
									<td>
										{{$choose_pick_up}} <br>
										<input type="hidden" name="choose_pick_up" value="{{App\Location::where('address', $choose_pick_up)->first()->id}}">
										@if($walk_pk != -1)
										<span style="color: #5DD167 !important;">
											{{$walk_pk}}km from your departure point
											<input type="hidden" name="walk_pk" value="{{$walk_pk}}">
										</span>
										@endif
									</td>
								</tr>
								<tr class="location">
									<th>Drop-off point</th>
									<td>
										<i class="fas fa-walking fa-lg bla-icon-walk" style="background: #fed141"></i> 
									</td>
									<td>
										{{$choose_drop_off}} <br>
										<input type="hidden" name="choose_drop_off" value="{{App\Location::where('address', $choose_drop_off)->first()->id}}">
										@if($walk_dr != -1)
										<span style="color: #fed141 !important;">
											{{$walk_dr}}km from your arrival point
											<input type="hidden" name="walk_dr" value="{{$walk_dr}}">
										</span>
										@endif
									</td>
								</tr>
								<tr>
									<th>Date</th>
									<td><i class="far fa-calendar-alt fa-lg"></i></td>
									<td class="bold">{{\App\Lib\Date::date2Text($ride->start_date)}} {{$ride->start_time}}</td>
								</tr>
								<tr>
									<th>Options</th>
									<td><i class="fas fa-users"></i></td>
									<td class="bold">Max. {{$ride->seats}} in the back seats</td>
								</tr>
								<tr>
									<th>Summary</th>
									<td><i class="fas fa-book"></i></td>
									<td class="bold">{{$summary['dist']}} km {{App\Lib\Date::time2Text($summary['time']/60, '%02d hours %02d minutes')}}</td>
								</tr>
							</table>
							<div class="alert alert-success" style="margin-top: 20px;">
								<div class="bla-ride-owner row">
									<div class="col-sm-2">
		                        		<img src="/images/users/default.png" style="margin: 0px;" alt=""><br>
		                        		<?php $name = explode(" ", $ride->user->name); ?>
		                        		{{end($name)}} <br>
		                        		28 y/o
		                        	</div>
		                        	<div class="col-sm-10">The driver hasn't given any further details about this ride.</div>
		                        </div>	
							</div>	
						</div>
					</div>
					<div class="col-sm-4 bla-box bold" style="color: gray">
						<div class="bla-box-content bla-ride-detail">
							Price per seat
							<div class="pull-right">{{$price + $price*App\Bookmark::FEE}} đ
								<span class="sp_collapsed collapsed" data-toggle="collapse" data-target="#fee"></span>
							</div>
						</div>
						<div class="bla-box-content bla-ride-detail collapse" id="fee" style="padding: 0px 45px 0px 15px;">
							<div>
								Contribution to driver
								<div class="pull-right">{{$price}} đ</div>
								<input type="hidden" name="price" value="{{$price}}">
							</div>
							<div>
								Service fees
								<div class="pull-right">{{$price*App\Bookmark::FEE}} đ</div>
								<input type="hidden" name="fee" value="{{$price*App\Bookmark::FEE}}">
							</div>	
						</div>
						<div class="bla-box-content bla-ride-detail text-center">
							Passengers on this ride <br>
							@for($i = 1; $i <= $ride->seats; $i++)
								<span><i class="far fa-circle" style="font-size: 40px;"></i></span>
							@endfor <br>
							{{$ride->seats}} available seats
						</div>
						@if ($ride->user->id != Auth::id())
							<?php $book = $ride->has_booked($ride->id, Auth::id()); ?>
							@if (empty($book))
								<div class="bla-box-content bla-ride-detail text-center">
									<select name="seats" style="width: 70%;" id="seats">
										@for($i = 1; $i <= $ride->seats; $i++)
											<option value="{{$i}}">{{$i}} seat</option>
										@endfor
									</select> 
									<button type="button" class="bla-btn bold" id="book" data-toggle="modal" data-target="#book_modal" style="width: 70%; margin-left: 0px; border-radius: 0px;">Books now</button>
								</div>
							@else
								<div class="bla-box-content bla-ride-detail">
									@if($book->status == 0)
					                	<h1 style="font-size: 18px;color:orange">ĐANG CHỜ PHÊ DUYỆT</h1>
					                @elseif($book->status == 1)
					                	<h1 style="font-size: 18px;color:green">ĐƯỢC CHẤP NHẬN</h1>
					                @else
					                	<h1 style="font-size: 18px;color:gray">BỊ TỪ CHỐI</h1>
					                @endif
	                	            <button type="button" class="btn btn-link fa fa-eye"><a href="{{route('user.rides_booked')}}">See all rides_booked</a></button>
								</div>	
							@endif
						@endif

						@if($ride->user->id == Auth::id())
							<div class="bla-box-content bla-ride-detail">
								Driver
								<a href="{{route('ride.schedule_edit', ['ride_id' => $ride->id])}}" class="pull-right bla-mark" style="text-decoration: underline;">Edit your ride</a>
							</div>
						@endif
					</div>
            	</div>
				</form>
            </div>
        </div>
    </div>
    <!-- Modal -->
	<div id="book_modal" class="modal fade bla-modal" role="dialog">
	  	<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Payment</h4>
				</div>
				<div class="modal-body">
					<p>You will pay <span id="total_fee"></span> for our service</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
					<button type="button" class="btn btn-info" id="submit" data-dismiss="modal">OK</button>
				</div>
		    </div>
	  	</div>
	</div>
	<script>
		var fee = parseInt("{{$price*App\Bookmark::FEE}}");
		$('#book').click(function (e) {
			e.preventDefault();
			$('#total_fee').html(fee*$('#seats').val());
		});
		$('#submit').click(function () {
			$('#form').submit();
		})


	</script>
@stop