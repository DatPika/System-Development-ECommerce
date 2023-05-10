<?php
namespace app\core;
use IntlDateFormatter;
use DateTimeZone;
use DateTime;

// TODO: format the date Output AND Input
class TimeHelper {

	public static function DTInput($datetime) {
		try {
			//create datetime object in the local timezone
			$datetime = new DateTime($datetime, new DateTimeZone('UTC'));
			// change the timezone
			$datetime->setTimezone(new DateTimeZone('UTC'));
			//output to standard string format
			return $datetime->format('d/m/Y');
		}
		catch (\Exception $e) {
			return "";
		}
	}

	public static function DTOutBrowser($datetime) {
		//create datetime object in the local timezone
		$datetime = new DateTime($datetime, new DateTimeZone('UTC'));
		// change the timezone
		$datetime->setTimezone(new DateTimeZone('UTC'));
		//output to standard string format
		return $datetime->format('d/m/Y');
	}
}