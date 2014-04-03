<?php

class Schedule extends CI_Controller {
	function index ()
	{
		$data['main_content'] = 'week_form';
		$day['year'] = date('Y');
		$day['month'] = date('m');
		$day['day'] = date('d');
		$day['day_of_week'] = date('N');
		$data['view_data'] = $day;
		$this->load->view('includes/template.php', $data);
	}

	function display_weekly_calendar ($year, $week)
	{
		if (!$year) {
			$year = date('Y');
		}
		if (!$week) {
			$week = date('W');
		}

		$this->load->model('Calendar_model');

		$data['main_content'] = 'week_form';
		$data['view_data'] = $this->calendar_model->generate_weekly_calendar($year, $week);

		$this->load->view('includes/template.php', $data);
	}
}