<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\User;
use App\Ride;

class Bookmark extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookmarks';
    protected $fillable = [
    	'choose_pick_up', 'choose_drop_off', 'walk_pk', 'walk_dr', 'price', 'fee', 'seats', 'ride_id', 'user_id'
    ];

    const FEE = 0.05;
    const WAITING = 0, ACCEPT = 1, DENY = -1;

    public function _choose_pick_up()
    {
        return $this->hasOne(Location::class, 'id', 'choose_pick_up');
    }

    public function _choose_drop_off()
    {
        return $this->hasOne(Location::class, 'id', 'choose_drop_off');
    }

    public function _getOwner(){
        return $this->hasOne(Ride::class, 'id', 'ride_id');
    }

    public function ride() {
        return $this->belongsTo(Ride::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
