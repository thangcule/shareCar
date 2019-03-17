@extends('layouts.app_default')
@section('content')
	<div class="Layout-content">
	    <div class="Home u-flex">
            <div class="HomeBlock-inner">
				<h2>Give more details</h2>
				<section class="breadcrumb-container">
				    <ol class="publication-breadcrumb u-reset">
				        <li class="step1">
				            <a href="/ride/schedule">Schedule</a>
				        </li>
				        <li class="step2 current">
				            <span>Details</span>
				        </li>
				    </ol>
				</section>
				<div style="clear: both;"></div>
				<div class="row publication">
					<input type="hidden" name="p_address" id="p_address" value="{{$ride->_pick_up->address}}">
                    <input type="hidden" name="d_address" id="d_address" value="{{$ride->_drop_off->address}}">
					<input type="hidden" name="s_address" id="s_address" value="{{!empty($ride->_stopover) ? $ride->_stopover->address : ""}}">						
					<form action="{{ route ('ride.contribution_edit', ['ride_id' => $ride->id])}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="stopover" id="stopover" value="{{!empty($ride->_stopover) ? $ride->_stopover->id : ""}}">	
						<!-- Data location to ender direction -->
						<div class="col-sm-7">
							<div class="bla-box">
								<h3 class="bla-box-title">Passenger contribution</h3>
								
								<?php $length = 20; ?>
								@if (!empty($ride->_stopover))
								<div class="row bla-box-content">
	                                <div class="path col-sm-9">
	                                	{{mb_substr($ride->_pick_up->address, 0, $length)}} ...&nbsp;
			                            <i class="fa fa-arrow-right fa-lg"></i>		
			                            &nbsp; {{mb_substr($ride->_stopover->address, 0, $length)}} ...
                                	{!! $errors->first('sub_path1', '<div class="alert alert-danger">:message</div>') !!}
	                                </div>
									<div class="col-sm-2">
	                                    <input type="text" class="form-control currency" name="sub_path1" placeholder="đ" value="{{old('sub_path1')}}">
									</div>

                                </div>
                                <div class="row bla-box-content">

									<div class="path col-sm-9">
	                                	{{mb_substr($ride->_stopover->address, 0, $length)}} ...
			                            <i class="fa fa-arrow-right fa-lg"></i>		 
			                            &nbsp; {{mb_substr($ride->_drop_off->address, 0, $length)}} ...
									{!! $errors->first('sub_path2', '<div class="alert alert-danger">:message</div>') !!}
	                                </div>
									<div class="col-sm-2">
	                                    <input type="text" class="form-control currency" name="sub_path2" style="margin-top: 10px;"  placeholder="đ" value="{{old('sub_path2')}}">
									</div>
								</div>
								@endif
								
								<div class="row bla-box-content">
									<div class="path col-sm-9">
	                                	{{mb_substr($ride->_pick_up->address, 0, $length)}} ...&nbsp;
			                            <i class="fa fa-arrow-right fa-lg"></i>		
			                            &nbsp; {{mb_substr($ride->_drop_off->address, 0, $length)}} ...
										{!! $errors->first('path', '<div class="alert alert-danger">:message</div>') !!}
	                                </div>
									<div class="col-sm-2">
	                                    <input type="text" class="form-control currency" style="margin-top: 10px;"  placeholder="&#xF155;" name="path" value="{{old('path')}}">
									</div>
								</div>
							</div>


							<div class="bla-box">
								<div class="row bla-box-content">
									<h4 class="col-sm-9">Number of seats</h4>
									<div class="col-sm-2">
	                                    <input id="seats" type="number" class="form-control location seat" style="margin-top: 10px;" name="seats" value="{{old('seats')}}" placeholder="đ" max="3" min="1">
									</div>
								</div>
                            	{!! $errors->first('seats', '<div class="alert alert-danger">:message</div>') !!}
							</div>
							<div class="bla-box">
								<h3 class="bla-box-title">Ride details</h3>
								<div class="row bla-box-content">
									<div class="form-group">
	                                    <label for="">Anything to add about your ride?</label>
	                                    <div class="input-group">
	                                        <textarea type="text" rows="4" cols="80" class="form-control" placeholder="Flexible about where and when to meet? Not taking the motorway? Got limited space in your boot? Keep passengers in the loop." name="detail"> </textarea>
	                                    </div>
	                                </div>
								</div>
							</div>
							<button style="visibility: hidden;"></button>
							<button class="bla-btn pull-right" style="border-radius: 3px; box-shadow: inset 0 -2px rgba(5,71,82,0.2); margin-left: 0px;">Continue</button>
							<a href="{{route('ride.schedule_edit', ['ride_id' => $ride->id])}}" class="bla-btn pull-right" style="background: #fff; color: #00AFF5!important">Back</a>
						</div>

						<div class="col-sm-5 bla-box">
							<div class="bla-box-title">
								<div id="map" style="height: 360px"></div>
							</div>
						</div>
					</form>
				</div>
            </div>
	    </div>
	</div>
	
	<script type="text/javascript">
		$(document).keypress(
			function(event){
				if (event.which == '13') {
					event.preventDefault();
				}
		});
	</script>
	<script src="{{ asset('/js/gmap.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCskL3zcYoYUJ7t3UITgsuIzC8fyYjy3rc&libraries=places&language=vi&callback=init_map"></script> 
@stop