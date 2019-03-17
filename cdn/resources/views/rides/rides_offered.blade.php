@extends('layouts.app_default')
	
@section('content')
<div class="container" style="background-color:white;width:70%;margin-left: 15%">
    <ul style="margin-top:20px" class="menu-ul">
        <li class="menu-li menu-li-a menu-active">
            <a href="{{ route('user.rides_offered') }}" class="menu-li-a" href="#ridesoffer" style="color:gray"><b>Rides offered</b></a>
        </li>
        <li class="menu-li menu-li-a">
            <a href="{{ route('user.rides_booked') }}" class="menu-li-a" href="#ridesbook">Rides booked</a>
        </li>
        <li class="menu-li menu-li-a">
            <a href="{{ route('user.profile') }}" class="menu-li-a" href="#profile">Profile</a>
        </li>
        <li class="menu-li menu-li-a">
            <a class="menu-li-a" href="#money">Money</a>
        </li>
    </ul>
    <p class="p-margin"><b>See all your upcoming rides</b></p>
    <div class="bla-box col-sm-10" style="margin-left: 5%">
        @foreach($ride as $r)
        <?php if ($r->status == 0) continue; ?>
        <h3 class="bla-box-title">
            <i class="fa fa-code-fork"></i>
            <span title="{{$r->_pick_up->address}}">{{$r->_pick_up->address}}</span><br>
            <i class="fa fa-code-fork"></i>
            <span title="{{$r->_drop_off->address}}">{{$r->_drop_off->address}}</span>
        </h3>
		<div class="bla-box-content" style="font-size: 13px">
            <div class="bla-margin20">
                <i class="fa fa-calendar fa-lg"></i> 
                <span>{{\App\Lib\Date::date2Text($r['start_date'])}} | {{$r['start_time']}}</span>
            </div><hr>
            <div class="bla-margin20">
                <i class="fa fa-circle-o fa-lg"></i> 
                <span>Ride summary<br>
                <i class="fa fa-code-fork"> Pick up : </i> 
                <span title="{{$r->_pick_up->address}}">{{$r->_pick_up->address}}</span><br>
                @if(!empty($r->_stopover->address))
                <i class="fa fa-code-fork"> Stopover : </i> 
                <span title="{{$r->_stopover->address}}">{{$r->_stopover->address}}</span><br>
                @endif
                <i class="fa fa-code-fork"> Drop off : </i>
                <span title="{{$r->_drop_off->address}}">{{$r->_drop_off->address}}</span></span>
            </div>
            <div class="bla-margin20">
                <div class="col-sm-4">
                    <span><i class="fa fa-wheelchair"></i> : {{$r['seats']}} seat</span><br>
                    <span><i class="fa fa-usd"></i> : {{$r['path']}} VND / người</span>
                </div>
                <div class="col-sm-7">
                    <div class="btn-group">
                        <a type="button" class="btn btn-link" href="/ride/schedule_edit?ride_id={{$r->id}}"><i class="fa fa-edit"></i> Edit</a>
                        <a type="button" class="btn btn-link" href="/ride/{{$r->id}}/passengers"><i class=" fa fa-eye"></i> See passengers</a>
                        <form action="/user/rides_offered/delete" style="display: inline-block" id="form{{$r->id}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="ride_id" value="{{$r->id}}">    
                            <button type="button" data-toggle="modal" data-target="#delete_modal" class="btn btn-link delete"  data-id="{{$r->id}}"><i class="fa fa-remove"> Delete</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><hr>
        @endforeach
    </div>
</div>
    <!-- Modal -->
    <div id="delete_modal" class="modal fade bla-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this bookmark</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-info" id="submit" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var id;
        $('.delete').click(function () {
            id = $(this).data("id");
        })
        $('#submit').click(function () {
            $('#form'+id).submit();
        })
    </script>
@endsection