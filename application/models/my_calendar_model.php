<?php
class My_calendar_model extends CI_Model {
	function My_calendar_model ()
	{
		parent::__construct();
	}

	function generate_weekly_calendar($year = null, $week = null)
	{
		$day['year'] = $year;
		$day['week'] = $week;
		$day['month'] = date('m');
		$day['day'] = date('d');
		$day['day_of_week'] = date('N');
		return $day;
	}
}