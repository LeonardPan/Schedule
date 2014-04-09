<?php
class My_calendar_model extends CI_Model {
	function My_calendar_model ()
	{
		parent::__construct();
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

	function trigger_task_in_weekly_calendar($w_day, $task, $flag, $uid = 1, $year = null, $week = null)
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

		if ($this->db->select('task')
				->from('weekly_calendar_tasks')
				->where('uid', $uid)
				->where('year', $year)
				->where('week', $week)
				->where('w_day', $w_day)
				->count_all_results())
		{
			$this->db->where('uid', $uid)
				->where('year', $year)
				->where('week', $week)
				->where('w_day', $w_day)
				->where('task', $task)
				->update('weekly_calendar_tasks', array(
						'flag' => $flag
					)
				);
			echo "<SCRIPT>
				alert('$flag');
				</SCRIPT>";
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