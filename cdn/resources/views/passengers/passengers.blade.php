@extends('layouts.app_default')
@section('link')
    <link rel="stylesheet" href="{{asset('css/visitors.css')}}">
@endsection
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Change bookmark status</h4>
                </div>
                <div class="modal-body">
                    Can you sure ???
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-primary" id="save">Save changes</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="container" style="background-color:white;width:70%;margin-left: 15%">
        <div class="py-4">
            <a href="{{ route('user.rides_offered') }}" class="back-route">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back to your rides
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr class="p-3">
                    <td>
                        <div class="row">
                            <div class="col-md-9">
                                {{ $ride->_pick_up->address }} <i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $ride->_drop_off->address }}
                            </div>
                            <div class="col-md-3">
                                    {{ $ride->path }}đ per passenger
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="p-3">
                    <td colspan="4">
                        <div class="row">
                            <div class="col-md-10">
                                @if (!empty($ride->_stopover))
                                <h5>Stopover: {{ $ride->_stopover->address }}</h5>
                                @endif
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                {{ App\Lib\Date::date2Text($ride->start_date) }} - {{ $ride->start_time }}
                            </div>
                            <div class="col-md-8">

                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="p-3">
                    <td>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <span class="col-md-4">
                                    <a href="/ride/schedule_edit?ride_id={{$ride->id}}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                </span>
                                <span class="col-md-4">
                                    <a href="#">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        Delete
                                    </a>
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-ride">
                        <thead>
                        <tr>
                            <th scope="col" colspan="3">Visitors
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="row">

                                    @foreach($passengers as $passenger)
                                        <div class="col-md-4">
                                            <div class="visitor">
                                                @if($passenger->bookmarks[0]->status == -1)
                                                    <span class="status status-deny">DENY</span>
                                                @elseif($passenger->bookmarks[0]->status == 0)
                                                    <span class="status status-waiting">WAITING</span>
                                                @else
                                                    <span class="status status-accept">ACCEPT</span>
                                                @endif
                                                <h5>{{ App\Lib\Date::date2Text(explode($passenger->bookmarks[0]->created_at, ' ')[0]) }}</h5>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="https://via.placeholder.com/150" class="img-responsive" alt="Responsive image"/>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {{ $passenger->name }}<br/>
                                                        {{ $passenger->bookmarks[0]->price }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        {{mb_substr($passenger->bookmarks[0]->_choose_pick_up->address, 0, 18)}} ...
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <i class="fa fa-arrow-right"></i>
                                                        {{ mb_substr($passenger->bookmarks[0]->_choose_drop_off->address, 0, 18)}} ...
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                @if($passenger->bookmarks[0]->status == 0)
                                                    <button class="btn btn-primary" id="btn-accept" onclick="openModal('/ride/{{ $ride->id }}/bookmarks/{{ $passenger->bookmarks[0]->id }}/accept')">Accept</button>
                                                    <button class="btn btn-danger" id="btn-deny" onclick="openModal('/ride/{{ $ride->id }}/bookmarks/{{ $passenger->bookmarks[0]->id }}/deny')">Deny</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default panel--border-warning">
                    <div class="panel-body">
                        <span>Tips:</span> To increase your change of gettings passengers, we're got a few suggests to help mark
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
function openModal(link) {
    $('#myModal').modal('toggle');
    $('#save').attr('href', link);
}
</script>
@endsection
