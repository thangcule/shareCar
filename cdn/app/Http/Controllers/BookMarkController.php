<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Distance;
use App\Bookmark;
use App\Ride;
use Auth;

/**
 * Module Booker\Bookmark
 */
class BookmarkController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $bookmark = $request->all();
        $bookmark['user_id'] = Auth::user()->id;
        
		Bookmark::create($bookmark);
		return redirect(route('user.rides_booked'));
    }

    /**
     * list rides user had booked
     * @return [type] [description]
     */
    public function rides_booked()
    {
        $booked = Bookmark::where('user_id',Auth::user()->id)
                        ->get();
        return view('bookmarks.rides_booked',compact('booked'));        
    }

    /**
     * remove bookmark 
     * @param  Request $request->book_id : bookmark's id 
     * @return            
     */
    public function delete(Request $request)
    {

        $book = Bookmark::where('id', $request->book_id)->first();
        
        if ($book->status = 1) { 
            $book->ride->seats = $book->ride->seats + 1;
            $book->ride->save(); 
        }
        $book->delete();

        return redirect(route('user.rides_booked'));
    }
}