<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Date;
use App\Bookmark;
use App\Ride;
use App\User;
use Auth;

/**
 * Module Owner\Passenger
 */
class PassengerController extends Controller
{
    /**
     * passengers of ride
     * @param  int $ride_id 
     * @return 
     */
    public function passengers($ride_id) {
        $ride = Ride::with(['_pick_up', '_drop_off', '_stopover'])->find($ride_id);

        $passengers = User::whereHas('bookmarks', function ($query) use ($ride_id) {
            $query->whereHas('ride', function ($query) use ($ride_id) {
                $query->where('id', '=', $ride_id);
            });
        })->with(['bookmarks' => function ($query) use ($ride_id) {
            $query->where('ride_id', '=', $ride_id);
        }])->get();
        
        return view('passengers.passengers', compact('ride', 'passengers'));
    }

    /**
     * ride's owner deny bookmark  
     * @param  int $ride_id     
     * @param  int $bookmark_id 
     * @return 
     */
    public function deny($ride_id, $bookmark_id) {
        $ride = Ride::where('id', $ride_id)->first();
        $bookmark = $ride->bookmarks()->where('id', $bookmark_id)->first();
        $bookmark->status = Bookmark::DENY;
        $bookmark->save();

        return back();
    }

    /**
     * ride's owner accept bookmark 
     * @param  int $ride_id     
     * @param  int $bookmark_id 
     * @return 
     */
    public function accept($ride_id, $bookmark_id) {

        $ride = Ride::where('id', $ride_id)->first();
        $ride->seats = $ride->seats - 1;
        $ride->save();
            
        $bookmark = $ride->bookmarks()->find($bookmark_id);
        $bookmark->status = Bookmark::ACCEPT;
        $bookmark->save();

        return back();
    }
}