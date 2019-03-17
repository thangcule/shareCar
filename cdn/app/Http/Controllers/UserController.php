<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use App\Ride;
use App\User;
use Auth;

class UserController extends Controller
{
	
	/**
	 * change profile
	 * @param  Request $request 
	 * @return 
	 */
	public function profile(Request $request)
	{
		$user = User::where('id', Auth::id())->first();
		if ($request->isMethod("POST")) {
			$this->validate($request, [
				'name' => 'required|string|max:255',
				'phone' => 'required|numeric'
			]);
			$user->update($request->all());
		}
		return view('users.profile', compact('user'));
	}
}