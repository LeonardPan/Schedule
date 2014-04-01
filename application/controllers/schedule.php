<?php

class Schedule extends CI_Controller {
	function index ()
	{
		$data['main_content'] = 'week_form';
		$this->load->view('includes/template.php', $data);
	}
}