<?php

class Schedule extends CI_Controller {
	function index ()
	{
		$this->display_weekly_calendar();
	}

	function previous_week($year, $week)
	{
		if ($year && $week)
		{
			if ($week > 1)
				$week = $week - 1;
			else
			{
				$year = $year - 1;
				$week = 52;
			}
		}
		$this->display_weekly_calendar($year, $week);
	}

	function next_week($year, $week)
	{
		if ($year && $week)
		{
			if ($week > 51)
			{
				$year = $year + 1;
				$week = 1;
			}
			else
				$week = $week + 1;
		}
		$this->display_weekly_calendar($year, $week);
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
		if ($task = $this->input->post('task')) {
			$w_day = $this->input->post('w_day');
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