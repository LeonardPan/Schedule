<?php

class Schedule extends CI_Controller {
	function index ()
	{
		$this->display_weekly_calendar();
	}

	function display_weekly_calendar ($year = null, $week = null)
	{
		if (!$year) {
			$year = date('Y');
		}
		if (!$week) {
			$week = date('W');
		}

		$this->load->model('My_calendar_model');

		$data['main_content'] = 'week_form';
		$data['view_data'] = $this->My_calendar_model->generate_weekly_calendar($year, $week);

		$this->load->view('includes/template.php', $data);
	}
}