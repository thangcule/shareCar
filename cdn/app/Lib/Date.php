<?php 
namespace App\Lib;

class Date
{
	public static function date2Text($date)
    {
        $week = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        $month = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $key_week = date('w', strtotime($date));
        $key_month = date('m', strtotime($date));
    	
        return $week[$key_week]. ', '. $month[$key_month - 1]. ' '. date('d', strtotime($date));
    }

    public static function time2Text($time, $format = '%02d:%02d') {
	    if ($time < 1) {
	        return;
	    }
	    $hours = floor($time / 60);
	    $minutes = ($time % 60);
	    return sprintf($format, $hours, $minutes);
	}

}
