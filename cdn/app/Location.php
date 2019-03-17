<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'locations';

    /**
     * store new location
     * @param  string $address 
     * @param  float $lat     
     * @param  float $lng     
     * @return App\Location          
     */
    public static function store($address, $lat, $lng)
    {
        if (empty($lat) && empty($lng))
            return NULL;
        $exist = Location::where('address', $address)->first();
        if (!empty($exist)) 
            return $exist;
        
        $location = new Location(); 
        $location->address = $address;
        $location->lat = $lat;
        $location->lng = $lng;
        $location->save();
        return $location;
    }
}