<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;
use App\Lib\Distance;
use App\Lib\Date;
use App\Location;
use App\Ride;
use Validator;
use Auth;
use App\User;


/**
 * Module Owner\Ride
 */
class RideController extends Controller
{
    /**
     * Step 1 create ride
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|
     *         \Illuminate\View\View|
     *         \Illuminate\Http\RedirectResponse|
     */
    public function schedule(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, Ride::$schedule['rule'], Ride::$schedule['error']);
            $request->session()->put('schedule', [
                'pick_up'    => Location::store($request->p_address, $request->p_lat, $request->p_lng),
                'drop_off'   => Location::store($request->d_address, $request->d_lat, $request->d_lng),
                'stopover'   => Location::store($request->s_address, $request->s_lat, $request->s_lng),
                'start_date' => date("Y-m-d", strtotime($request->start_date)),
                'start_time' => \DateTime::createFromFormat('H i', $request->hour.' '.$request->minute)
                                        ->format('H:i:s')
            ]);
            return redirect(route('ride.contribution'));
        }
        return view('rides.schedule', [
            'ride'  => $request->session()->get('schedule')
        ]);
    }

    /**
     * Step 2 create ride
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *         \Illuminate\Http\RedirectResponse|
     */
    public function contribution(Request $request)
    {
        $schedule = $request->session()->get('schedule');
        if (!empty($schedule)) {
            if ($request->isMethod('post')) {
                $this->validate($request, Ride::contribution($schedule['stopover'])['rule'], Ride::contribution()['error']);
                $contribution = $request->all();
                
                $ride = array_merge($schedule, $contribution);
                $ride['user_id'] = Auth::user()->id;
                Ride::create($ride);

                $request->session()->forget('schedule');
                return redirect(route('user.rides_offered'));
            }
            return view('rides.contribution', [
                'ride'  =>  $schedule
            ]);
        }
        return redirect(route('ride.schedule'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @param $choose_pick_up
     * @param $choose_drop_off
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request, $id)
    {
        $ride = Ride::where('id', $id)->first();
        $find_pick_up = $request->session()->get('find_pick_up');
        $find_drop_off = $request->session()->get('find_drop_off');
        $choose_pick_up = $request->choose_pick_up;
        $choose_drop_off = $request->choose_drop_off;

        $walk_pk = Distance::getDrivingDistance($find_pick_up, $choose_pick_up)['dist'];
        $walk_dr = Distance::getDrivingDistance($find_drop_off, $choose_drop_off)['dist'];
        
        $price = $ride->path;
        if (!empty($ride->_stopover)) {
            if ($ride->_stopover->address == $choose_drop_off)
                $price = $ride->sub_path1;
            if ($ride->_stopover->address == $choose_pick_up) 
                $price = $ride->sub_path2;
        }
        $summary = Distance::getDrivingDistance($choose_pick_up, $choose_drop_off);

        return view('rides.detail', compact(
            'ride', 'choose_pick_up', 'walk_pk', 'choose_drop_off', 'walk_dr', 'summary', 'price'
        ));
    }

    /**
     * @param $ride_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|
     *         \Illuminate\Http\RedirectResponse|
     *         \Illuminate\Routing\Redirector|
     *         \Illuminate\View\View
     */
    public function editSchedule(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, Ride::$schedule['rule'], Ride::$schedule['error']);

            Ride::where('id', $request->ride_id)->update([
                'pick_up'    => Location::store($request->p_address, $request->p_lat, $request->p_lng)->id,
                'drop_off'   => Location::store($request->d_address, $request->d_lat, $request->d_lng)->id,
                'stopover'   => empty($request->s_lat) ? ''
                                : Location::store($request->s_address, $request->s_lat, $request->s_lng)->id,
                'start_date' => date("Y-m-d", strtotime($request->start_date)),
                'start_time' => \DateTime::createFromFormat('H i', $request->hour.' '.$request->minute)
                                        ->format('H:i:s')
            ]);
            return redirect(route('ride.contribution_edit', ['ride_id' => $request->ride_id]));
        }
        return view('rides.schedule_edit', [
            'ride'  => Ride::where('id', $request->ride_id)->first()
        ]);
    }

    /**
     * @param $ride_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|
     *         \Illuminate\Http\RedirectResponse|
     *         \Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function editContribution(Request $request)
    {
        if ($request->isMethod('post')) {
           $this->validate($request, Ride::contribution($request->stopover)['rule'], Ride::contribution()['error']);
            
            $contribution = $request->except(['_token', 'ride_id']);
            Ride::where('id', $request->ride_id)->update($contribution);
            return redirect(route('user.rides_offered'));
        }
        
        return view('rides.contribution_edit', [
            'ride'  =>  Ride::where('id', $request->ride_id)->first()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rides_offered()
    {
        $ride = Ride::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('rides.rides_offered',compact('ride'));
    }

    public function delete(Request $request)
    {
        $ride = Ride::where('id', $request->ride_id)
                    ->update(['status' => 0]);
        return redirect(route('user.rides_offered'));
           
    }
}
