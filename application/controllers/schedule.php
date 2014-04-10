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

		//handle the ajax case
		if ($w_day = $this->input->post('w_day')) {
			$task = $this->input->post('task');
			$flag = $this->input->post('flag');

			$this->My_calendar_model->trigger_task_in_weekly_calendar(
				"$w_day", "$task", "$flag"
			);
		}

		$data['main_content'] = 'week_form';
		//get uid from session
		$uid = 1;
		$data['view_data'] = $this->My_calendar_model->generate_weekly_calendar($uid, $year, $week);

		$this->load->view('includes/template.php', $data);
	}
}