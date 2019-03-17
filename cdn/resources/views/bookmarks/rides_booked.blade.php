@extends('layouts.app_default')
	
@section('content')
<div class="container" style="background-color:white;width:70%;margin-left: 15%">
    <ul style="margin-top:20px" class="menu-ul">
        <li class="menu-li menu-li-a">
            <a href="{{ route('user.rides_offered') }}" class="menu-li-a" href="#ridesoffer">Rides offered</a>
        </li>
        <li class="menu-li menu-li-a menu-active">
            <a href="{{ route('user.rides_booked') }}"class="menu-li-a" href="#ridesbook" style="color:gray"><b>Rides booked</b></a>
        </li>
        <li class="menu-li menu-li-a">
            <a href="{{ route('user.profile') }}" class="menu-li-a" href="#profile">Profile</a>
        </li>
        <li class="menu-li menu-li-a">
            <a class="menu-li-a" href="#money">Money</a>
        </li>
    </ul>
    <p class="p-margin" style="font-size:24px;color:gray"><b>See all your rides booked</b></p><hr>
    @foreach($booked as $book)
    <div class="bla-box" style="width:90%;height: 200px;margin-left: 5%" >
        <div class="bla-box-title col-sm-8" style="font-size: 15px;height: 65px">
        <i class="fa fa-code-fork"></i> 
        <span title="{{$book->_choose_pick_up->address}}">{{$book->_choose_pick_up->address}} </span>
        <br>
        <i class="fa fa-code-fork"></i> 
        <span title="{{$book->_choose_drop_off->address}}">{{$book->_choose_drop_off->address}} </span>
        </div>
        <div class="bla-box-title col-sm-4" style="height: 65px">
            @if ($book->ride->status == 0)
                <b>CHỦ XE ĐÃ HỦY LỘ TRÌNH</b>
            @else 
                @if($book->status == 0)
                    <h1 style="font-size: 18px;color:orange">ĐANG CHỜ PHÊ DUYỆT</h1>
                @elseif($book->status == 1)
                    <h1 style="font-size: 18px;color:green">ĐƯỢC CHẤP NHẬN</h1>
                @else
                    <h1 style="font-size: 18px;color:gray">BỊ TỪ CHỐI</h1>
                @endif
            @endif 
        </div>
        <div class="bla-box-title col-sm-8" style="background-color:#f1f4f6;height: 90px;margin-top:5px">
            <i class="fa fa-calendar"></i> 
            <span> {{\App\Lib\Date::date2Text($book->_getOwner->start_date)}} | {{$book->_getOwner->start_time}}  </span><br>
            <i class="fa fa-wheelchair"></i> 
            <span>{{$book['seats']}} x {{$book['price']}} đồng</span><br>
            <i class="fa fa-usd"></i> 
            <span>Total : <b>{{$book['price']*$book['seats']}}</b> đồng</span>
        </div>
        <div class="bla-box-title col-sm-4" style="background-color:#f1f4f6;height: 90px;margin-top:5px">
            @if($book['status'] == 0)
            <p>Yêu cầu đang được phê duyệt<br>Vui lòng chờ!</p>
            @elseif($book['status'] == 1)
                Phone: {{ $book->user->phone }}
                <p>Yêu cầu của bạn đã được chấp nhận!</p>
            @else
            <p>Yêu cầu của bạn đã bị từ chối!<br>Thử lại sau</p>
            @endif 
            <button type="button" class="btn btn-link fa fa-eye">
                <a href="/ride/detail/{{$book->ride_id}}?choose_pick_up={{$book->_choose_pick_up->address}}&choose_drop_off={{$book->_choose_drop_off->address}}">
                    See ride
                </a></button>
            <form action="/user/rides_booked/delete" style="display: inline-block;" id="form{{$book->id}}" method="POST">    
                {{ csrf_field() }}
                <input type="hidden" name="book_id" value="{{$book->id}}">    
                <button type="button" data-toggle="modal" data-target="#delete_modal" class="btn btn-link delete"  data-id="{{$book->id}}"><i class="fa fa-remove"> Delete</i></button>
            </form>
        </div>
        <hr>
    </div>
    @endforeach
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