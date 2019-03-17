@extends('layouts.app_default')
	
@section('content')
	<div class="Layout-content">
	    <div class="Home u-flex">
            <div class="HomeBlock-inner">
				<h2>Offer a ride on your next long journey</h2>
				<section class="breadcrumb-container">
				    <ol class="publication-breadcrumb u-reset">
				        <li class="step1 current">
				            <span>Schedule</span>
				        </li>
				    </ol>
				</section>
				<div style="clear: both;"></div>
				<div class="row publication">
					<form action="{{route('ride.schedule')}}" method="post">
						{{ csrf_field() }}
						<div class="col-sm-7">
							<div class="bla-box">
								<h3 class="bla-box-title">Pick-up & drop-off</h3>
								<div class="bla-box-content">
									<?php 
										function old_value($name, $ride)	// p_address
										{
											if (empty($ride))
												return old($name);
											$acronym = array('p' => 'pick_up', 'd' => 'drop_off', 's' => 'stopover');
											$variable = $acronym[explode('_', $name)[0]]; // pick_up
											$field = explode('_', $name)[1];
											return !empty($ride[$variable])  ? $ride[$variable][$field] 
																			 : old($name);
										}

									?>
									<div class="form-group">
	                                    <label for="p_address">Pick up</label>
	                                    <div class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-circle-o fa-lg"></i></span>
	                                        <input type="text" class="form-control" placeholder="Example: Edgware Tube Station, London" name="p_address" id="p_address" value="{{old_value('p_address', $ride)}}">
	                                        <input type="hidden" name="p_lat" id="p_lat" value="{{old_value('p_lat', $ride)}}">
	                                        <input type="hidden" name="p_lng" id="p_lng" value="{{old_value('p_lng', $ride)}}">
	                                    </div>
                                        {!! $errors->first('p_lat', '<div class="alert alert-danger">:message</div>') !!}
	                                </div>
	                                <div class="form-group">
	                                    <label for="">Drop-off</label>
	                                    <div class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-circle-o fa-lg"></i></span>
	                                        <input type="text" class="form-control" placeholder="Example: Edgware Tube Station, London" name="d_address" id="d_address" value="{{old_value('d_address', $ride)}}">
	                                        <input type="hidden" name="d_lat" id="d_lat" value="{{old_value('d_lat', $ride)}}">
	                                        <input type="hidden" name="d_lng" id="d_lng" value="{{old_value('d_lng', $ride)}}">
	                                    </div>
	                                    {!! $errors->first('d_lat', '<div class="alert alert-danger">:message</div>') !!}
	                                </div>
	                                <div class="form-group" style="margin-top: 20px;">
	                                	<label for="">
	                                		<span style="font-size: 18px;">Stopovers</span><br>	
		                                	Now add your stopover points - offering to pick up and drop off passengers along the way is a sure way to fill your car.
		                                </label>
	                                    <div class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-circle-o fa-lg"></i></span>
	                                        <input type="text"  class="form-control" placeholder="Example: Edgware Tube Station, London"  name="s_address" id="s_address" value="{{old_value('s_address', $ride)}}">
                                        	<input type="hidden" name="s_lat" id="s_lat" value="{{old_value('s_lng', $ride)}}">
	                                        <input type="hidden" name="s_lng" id="s_lng" value="{{old_value('s_lng', $ride)}}">
	                                    </div>
	                                </div>	
								</div>
							</div>
							<div class="bla-box">
								<h3 class="bla-box-title">Date & time</h3>
								<div class="row bla-box-content">
	                                <div class="form-group col-sm-5">
	                                	<label for="">Travel date:</label>
										<div class="input-group date" id="start_date">
					                    	<input type="text" class="form-control" name="start_date" value="{{!empty($ride['start_date']) ? $ride['start_date'] : old('start_date')}}" />
						                    <div class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></div>
						                </div>
						                {!! $errors->first('start_date', '<div class="alert alert-danger">:message</div>') !!}
						                <script> $('#start_date').datetimepicker({format: 'DD-MM-YYYY'}); </script>
									</div>
									<div class="form-group col-sm-2" style="margin: 20px 0px;">
	                                    <label for="" style="visibility: hidden;">None</label>
	                                    <select class="form-control" id="hour" name="hour">
	                                    	<option value="">Hour</option>
	                                    	@for($hour = 0; $hour < 24; $hour++)
											<option {{($hour == old('hour') || (!empty($ride['hour']) && $hour == $ride['hour'])) ? 'selected' : ''}} value="{{ ($hour < 10) ? '0'.$hour : $hour }}" >
													{{$hour}}
												</option>
	                                    	@endfor
	                                    </select>
	                                </div>
	                                <div class="form-group col-sm-2"  style="margin: 20px 0px;">
	                                    <label for="" style="visibility: hidden;">None</label>
	                                    <select class="form-control" id="minute" name="minute" value="{{old('minute')}}">
	                                		@for($minute = 0; $minute < 60; $minute+=10)
											<option {{($minute == old('minute') || (!empty($ride['minute']) && $minute == $ride['minute'])) ? 'selected' : ''}} value="{{ ($minute < 10) ? '0'.$minute : $minute}}" > {{$minute}}
												</option>
	                                    	@endfor
	                                    </select>
	                                </div>
								</div>
							</div>
							<button style="visibility: hidden;"></button>
							<button class="bla-btn pull-right" style="border-radius: 3px; box-shadow: inset 0 -2px rgba(5,71,82,0.2);">Continue</button>
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

	<script src="{{ asset('/js/gmap.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCskL3zcYoYUJ7t3UITgsuIzC8fyYjy3rc&libraries=places&language=vi&callback=init_map"></script>
@stop