<?php
namespace app\core;
use IntlDateFormatter;
use DateTimeZone;
use DateTime;

// TODO: format the date Output AND Input
class TimeHelper {
    public static function DTOutput($datetime) {
		// create a datetime object in the timezone of reference for DB data
		$datetime = new DateTime($datetime, new DateTimeZone('UTC'));
		global $lang;
		global $tz;
        $fmt = new IntlDateFormatter(
			$lang,
			IntlDateFormatter::MEDIUM, // date format
			IntlDateFormatter::MEDIUM, // time format
            $tz
		);
		return $fmt->format($datetime);
	}

	public static function DTInput($datetime) {
		try {
			//create datetime object in the local timezone
			global $tz;
			$datetime = new DateTime($datetime, new DateTimeZone($tz));
			// change the timezone
			$datetime->setTimezone(new DateTimeZone('UTC'));
			//output to standard string format
			return $datetime->format('Y-m-d H:i:s');
		}
		catch (\Exception $e) {
			return "";
		}
	}

	public static function DTOutBrowser($datetime) {
		//create datetime object in the local timezone
		global $tz;
		$datetime = new DateTime($datetime, new DateTimeZone('UTC'));
		// change the timezone
		$datetime->setTimezone(new DateTimeZone($tz));
		//output to standard string format
		return $datetime->format('Y-m-d H:i:s');
	}
}