<?php 
namespace App\Lib;
use App\Location;
class Distance {
    const ACCEPT_DISTANCE = 5; // meter

    /**
     * @param $origin
     * @param $destination
     * @return bool
     */
    public static function checkNearBy($origin, $destination)
    {
        if (empty($origin) || empty($destination))
            return FALSE;
        $distance = self::getDrivingDistance($origin, $destination);
        
        if ($distance['dist'] == 0)
            return TRUE;
        
        if ($distance['dist'] == -1 || $distance['dist'] > self::ACCEPT_DISTANCE) {
            return FALSE;
        } else return TRUE;
    }

    /**
     * @param $origin
     * @param $destination
     * @return array
     */
    public static function getDrivingDistance($origin, $destination)
    {
        // $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&mode=driving&language=vi&origins=".rawurlencode($origin)."&destinations=".rawurlencode($destination)."&key=AIzaSyALiO0z0hastBjw9CpTEGHxNOgEcbNX3Rk";
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // $response_a = json_decode($response, true);
        // if ($response_a['status'] == "OK") {
        //     return array(
        //         'dist'  => $response_a['rows'][0]['elements'][0]['distance']['value'],
        //         'time'  => $response_a['rows'][0]['elements'][0]['duration']['value']
        //     );
        // }

        // return array(
        //     'dist'  => -1,
        //     'time'  => -1
        // );
        $from = Location::where('address', $origin)->first();
        $to = Location::where('address', $destination)->first();

        if (empty($from) || empty($to)) 
            return array(
                'dist'  => -1,
                'time'  => -1
            );
        return array(
            'dist' => self::distance($from->lat, $from->lng, $to->lat, $to->lng),
            'time' => -1,
        );
    }

    public static function distance($lat1, $lon1, $lat2, $lon2) {
      if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
      }
      else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return number_format($miles * 1.609344, 2, '.', '');
      }
    }
}





















