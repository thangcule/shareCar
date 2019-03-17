<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('home');

/*Package Authenication*/
	Auth::routes();
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/user/profile', 'UserController@profile')->name('user.profile');
		Route::post('/user/profile', 'UserController@profile')->name('user.profile');
	});

/*Package Owner*/
	/*Sub 	Ride*/
	Route::get('/ride/schedule', 'RideController@schedule')->name('ride.schedule');
	Route::post('/ride/schedule', 'RideController@schedule');
	Route::get('/ride/contribution', 'RideController@contribution')->name('ride.contribution'); 
	Route::group(['middleware' => ['auth']], function () {
		Route::post('/ride/contribution', 'RideController@contribution'); 
		Route::get('/ride/schedule_edit', 'RideController@editSchedule')->name('ride.schedule_edit');
		Route::post('/ride/schedule_edit', 'RideController@editSchedule');
		Route::get('/ride/contribution_edit', 'RideController@editContribution')->name('ride.contribution_edit');
		Route::post('/ride/contribution_edit', 'RideController@editContribution');
		
		Route::get('/user/rides_offered', 'RideController@rides_offered')->name('user.rides_offered');
	    Route::post('/user/rides_offered/delete', 'RideController@delete');	
    
    /*Sub 	Passenger*/
	    Route::get('/ride/{ride_id}/passengers', 'PassengerController@passengers')->name('ride.passengers');
	    Route::get('/ride/{ride_id}/bookmarks/{bookmark_id}/deny', 'PassengerController@deny');
	    Route::get('/ride/{ride_id}/bookmarks/{bookmark_id}/accept', 'PassengerController@accept');
	});

/*Package Booked*/

	/*Sub     Filter */
	Route::get('/ride', 'RideController@index')->name('ride.index');
	Route::get('/ride/find', 'FilterController@find')->name('ride.find');		// find page
	Route::post('/ride/find', 'FilterController@find');					// find result page
	Route::get('/ride/detail/{id}', 'RideController@detail')->name('ride.detail');

	/*Sub     Bookmark */
	Route::group(['middleware' => ['auth']], function () {

		Route::get('/bookmark/store', 'BookmarkController@store')->name('bookmark.store');
		Route::post('/user/rides_booked/delete', 'BookmarkController@delete');
		Route::get('/user/rides_booked', 'BookmarkController@rides_booked')->name('user.rides_booked');
	});






Route::get('/ride', 'RideController@index')->name('ride.index');


