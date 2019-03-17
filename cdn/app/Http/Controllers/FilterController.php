<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Date;
use App\Bookmark;
use App\Location;
use App\Ride;
use Auth;

/**
 * Module Booked\Filter
 */
class FilterController extends Controller
{
    /**
     * Find ride page
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
  	public function find(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, Ride::$filter['rule'], Ride::$filter['error']);
            $request->session()->put('find_pick_up', $request->pick_up);
            $request->session()->put('find_drop_off', $request->drop_off);
            
            Location::store($request->p_address, $request->p_lat, $request->p_lng);
            Location::store($request->d_address, $request->d_lat, $request->d_lng);
            $filter_rides = Ride::filter($request->start_date, $request->pick_up, $request->drop_off);
            return view('filter.filter')->with([
                'filter_rides' => $filter_rides,
                'find_pick_up' => $request->pick_up,
                'find_drop_off' => $request->drop_off,
                'find_start_date' => Date::date2Text($request->start_date)
            ]);
        }
        $find_pick_up = $request->session()->get('find_pick_up');
        $find_drop_off = $request->session()->get('find_drop_off');
        return view('filter.find', compact('find_pick_up', 'find_drop_off'));
    }
}