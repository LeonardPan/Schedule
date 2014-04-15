<?php
class My_calendar_model extends CI_Model {
	function My_calendar_model ()
	{
		parent::__construct();

		
		$this->conf = array(
			'start_day' => 'monday',
			'show_next_prev' => true,
			'next_prev_url' => base_url() . 'mycal/display'
		);
		
		$this->conf['template'] = '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
			
			{heading_row_start}<tr>{/heading_row_start}
			
			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
			{heading_row_end}</tr>{/heading_row_end}
			
			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
			
			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td class="day">{/cal_cell_start}
			
			{cal_cell_content}
				<div class="day_num">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content}
			{cal_cell_content_today}
				<div class="day_num highlight">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content_today}
			
			{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}
			
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}
			
			{table_close}</table>{/table_close}
		';
	}

	function generate_weekly_calendar($uid = 1, $year = null, $week = null)
	{
		$day['year'] = $year;
		$day['week'] = $week;
		$day['month'] = date('m');
		$day['day'] = date('d');
		$day['day_of_week'] = date('N');

		$query = $this->db->select('w_day, task, flag')
					->from('weekly_calendar_tasks')
					->where('uid', $uid)
					->where('year', $year)
					->where('week', $week)
					->get();

		$tasks_array = $query->result();

		$day['tasks'] = $tasks_array;
		return $day;
	}

	function generate_monthly_calendar($uid = 1, $year = null, $month = null)
	{
		$this->load->library('calendar', $this->conf);
		$day['year'] = $year;
		$day['month'] = $month;
		$day['day'] = date('d');

		$query = $this->db->select('day, score')
					->from('monthly_calendar_score')
					->where('uid', $uid)
					->where('year', $year)
					->where('month', $month)
					->get();

		$score_array = $query->result();

		$day['score'] = $score_array;
		//return $day;
		return $this->calendar->generate($year, $month, $day);
	}

	function trigger_task_in_weekly_calendar($w_day, $task, $flag=null, $uid = 1, $year = null, $week = null)
	{
		if (!$year)
			$year = date('Y');
		if (!$week)
			$week = date('W');

		if ($flag == 'unknown')
			$flag = 1;
		elseif ($flag == 'pass')
			$flag = 0;
		else
			$flag = null;

		if ($this->db->select('flag')
				->from('weekly_calendar_tasks')
				->where('uid', $uid)
				->where('year', $year)
				->where('week', $week)
				->where('w_day', $w_day)
				->where('task', $task)
				->count_all_results()
			)
		{
			echo "<script type='text/javascript'>alert('Here');</script>";
			$this->db->where('uid', $uid)
				->where('year', $year)
				->where('week', $week)
				->where('w_day', $w_day)
				->where('task', $task)
				->update('weekly_calendar_tasks', array(
						'flag' => $flag
					)
			);
		}
		else
		{
			$this->db->insert('weekly_calendar_tasks', array(
					'uid' => $uid,
					'year' => $year,
					'week' => $week,
					'w_day' => $w_day,
					'task' => $task,
					'flag' => $flag,
					'insert_ts' => date('Y-m-d H:i:s')
				)
			);
		}
	}
}