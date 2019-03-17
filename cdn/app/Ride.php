<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\Lib\Distance;
use App\Location;
use App\User;

class Ride extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rides';
    protected $fillable = ['pick_up', 'drop_off', 'stopover', 'seats', 'sub_path1', 'sub_path2', 'path', 'start_date', 'start_time', 'user_id', 'detail'];
    
    public static $schedule = array(
        'rule'  =>    [
            'p_lat' => 'required',
            'd_lat' => 'required',
            'start_date' => 'required',
        ],
        'error' =>     [
            'p_lat.required' => 'Please enter suggest address pick up',
            'd_lat.required' => 'Please enter suggest address drop off',
            'start_date.required'=> 'Please choose start date'
        ]
    );

    public static $filter = array(
        'rule'  =>  [
            'pick_up' => 'required',
            'drop_off' => 'required',
            'start_date' => 'required',
            'p_address' => 'required',
            'd_address' => 'required',
        ],
        'error' =>   [
            'p_address' => 'Please enter suggest address pick up',
            'd_address' => 'Please enter suggest address drop off',
            'pick_up.required'  => 'Please enter address pick up',
            'drop_off.required'  => 'Please enter address drop off',
            'start_date.required'  => 'Please choose start date'
        ]
    );

    public static function contribution($stopover = NULL)
    {
        return array(
            'rule'  => [
                'seats'      => 'required|numeric',
                'sub_path1' => empty($stopover) ? '' : 'required|numeric',
                'sub_path2' => empty($stopover) ? '' : 'required|numeric',
                'path'      => 'required|numeric',
            ],
            'error' => [
                'seats.required' => 'Please enter seats',
                'sub_path1.required' => 'Please enter first contribution',
                'sub_path1.numeric' => 'First contribution must be numeric',
                'sub_path2.required' => 'Please enter second  contribution',
                'sub_path2.numeric' => 'Second contribution must be numeric',
                'path.required'  => 'Please enter total contribution'
            ]
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function _pick_up()
    {
        return $this->hasOne(Location::class, 'id', 'pick_up');
    }

    public function _drop_off()
    {
        return $this->hasOne(Location::class, 'id', 'drop_off');
    }

    public function _stopover()
    {
        return $this->hasOne(Location::class, 'id', 'stopover');
    }

    public function bookmarks() {
        return $this->hasMany(Bookmark::class);
    }

    public function has_booked($ride_id, $user_id)
    {
        $bookmark = Bookmark::where(['user_id' =>  $user_id, 'ride_id' => $ride_id])->first();
        return $bookmark;
    }

    public static function filter($start_date, $pick_up, $drop_off)
    {
        $start = date("Y-m-d", strtotime($start_date));
        $end   = date("Y-m-d", strtotime("+2 day", strtotime($start_date)));
        $filter_rides = Ride::whereBetween('start_date', [$start, $end])
                            ->where('status', 1)
                            ->orderBy('start_date', 'asc')
                            ->get();
                            
        foreach ($filter_rides as $key => $ride) {
            $ride_pk  = $ride->_pick_up;
            $ride_st  = $ride->_stopover;
            $ride_dr  = $ride->_drop_off;
            $filter_rides[$key]['choose_pick_up'] = $ride_pk->address;
            if (Distance::checkNearBy($pick_up, $ride_pk->address) == FALSE) {
                if (empty($ride_st) || Distance::checkNearBy($pick_up, $ride_st->address) == FALSE) {
                    unset($filter_rides[$key]);
                    continue;
                } else $filter_rides[$key]['choose_pick_up'] = $ride_st->address;
            }
            
            
            $filter_rides[$key]['choose_drop_off'] = $ride_dr->address;
            if (Distance::checkNearBy($drop_off, $ride_dr->address) == FALSE) {
                if (empty($ride_st) || Distance::checkNearBy($drop_off, $ride_st->address) == FALSE) {
                    unset($filter_rides[$key]);
                } else $filter_rides[$key]['choose_drop_off'] = $ride_st->address;
            }
        }
        return $filter_rides;
    }
}


















