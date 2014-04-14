
<div>
	<form method="GET" action="calender1.php">
		<!-- <?= $inputForm ?> -->
	</form>
</div>
<div>
	<?php
		$weekarray = array( 
		    0 => "星期一", 
		    1 => "星期二", 
		    2 => "星期三", 
		    3 => "星期四", 
		    4 => "星期五", 
		    5 => "星期六", 
		    6 => "星期天" 
		); 

		$tasks_array = array(
			/* config of weekly schedule table content
			'Task ID' => array ( 
						'Work day tasks' => array of tasks( 
										0 => array( "content" => "按点睡觉<br>（23:00前入睡，<br>7:00-7:30之间起床）",
						    						"time_range" => null
						    						)
						    			),
						'weekend tasks' => array( 
										0 => array( "content" => "按点睡觉<br>（23:30前入睡，<br>9:30前起床）",
													"time_range" => null
													)
										),
						"task value" => 1
						),
			*/
			'A' => array( 
						'work_day' => array( 
										0 => array( "content" => "按点睡觉<br>（23:00前入睡，<br>7:00-7:30之间起床）",
						    						"time_range" => null
						    						)
						    			),
						'weekend' => array( 
										0 => array( "content" => "按点睡觉<br>（23:30前入睡，<br>9:30前起床）",
													"time_range" => null
													)
										),
						'w_days_array' => array(),
						"value" => 1
						),
			'B' => array( 
						'work_day' => array( 
										0 => array( "content" => "申论模考<br>或 行测补考及解析",
						    						"time_range" => "9:30-11:30"
						    						)
						    			),
						'weekend' => array( 
										0 => array( "content" => "行测模考",
													"time_range" => "10:00-12:00"
													)
										),
						'w_days_array' => array(),
						"value" => 2
						),
			'C' => array( 
						'work_day' => array( 
										0 => array( "content" => "午睡",
						    						"time_range" => "12:00-13:30"
						    						)
						    			),
						'weekend' => array( 
										0 => array( "content" => "午睡",
													"time_range" => "12:30-14:30"
													)
										),
						'w_days_array' => array(),
						"value" => 1
						),
			'D' => array( 
						'work_day' => array( 
										0 => array( "content" => "行测模考",
						    						"time_range" => "13:30-15:30"
						    						),
										1 => array( "content" => "申论解析",
													"time_range" => "14:30-16:30"
													)
						    			),
						'weekend' => array( 
										0 => array( "content" => "行测补考及解析",
													"time_range" => "14:30-16:30"
													)
										),
						'w_days_array' => array(),
						"value" => 2
						),
			'E' => array( 
						'work_day' => array( 
										0 => array( "content" => "行测补考及解析<br>或 视频课程",
						    						"time_range" => "19:00-21:00"
						    						)
						    			),
						'weekend' => null,
						'w_days_array' => array(),
		    			"value" => 2
						)
			);

		foreach ($tasks as $task) {
			$tasks_array[$task->task]['w_days_array'][$task->w_day] = $task->flag;
		}

		$score_array = array();
		$finished_tasks_array = array();
		for ($i = 0, $score = 0, $finished_tasks = 0; $i < 7; $i++, $score = 0, $finished_tasks = 0)
		{
			foreach ($tasks_array as $task_type => $task_config) {
				if (array_key_exists($i, $task_config['w_days_array']) 
					&& $task_config['w_days_array'][$i] == 1)
				{
					$score += $task_config['value'];
					$finished_tasks++;
				}
			};
			if ($finished_tasks >= 3)
				$score++;
			if ($i < 5 && $finished_tasks == 5)
			{
				$score = 10;
			}
			elseif ($i >= 5 && $finished_tasks == 4)
			{
				$score = 10;
			}
			$score_array[$i] = $score;
			$finished_tasks_array[$i] = $finished_tasks;
		}

	?>
	<div class="navigations">
		<div style="width: 300px;">
			<?php echo anchor('schedule/previous_week/'.$year.'/'.$week, '&nbsp', array('id' => 'previousWeek', 'title' => 'Previous Week')); ?>
		</div>
		<div class="current_date" style="width: 300px;"><?php echo $year."年". $month ."月" . $day . "日	星期" . $day_of_week ?></div>
		<div style="width: 300px;">
			<?php echo anchor('schedule/next_week/'.$year.'/'.$week, '&nbsp', array('id' => 'nextWeek', 'title' => 'Next Week')); ?>
		</div>
	</div>
	<div>
		<p class="text-center">
			<?php
			for ($i = 0, $week_score = 0; $i < 7; $i++)
			{
				$week_score += $score_array[$i];
			}
			echo "恭喜！这周您已经拿到了<b>$week_score</b>分~";
			?>
		</p>
	</div>
	<table id="WeekTable" border="1">
		<?php
		//table head
		echo "<tr>";
		for ($i = 0; $i < 7; $i++)
		{
			$day = date( "M jS, Y", strtotime($year . "W" . $week. ($i+1) ));
			echo "<th>$day</th>";
		}
		echo "</tr>";

		echo "<tr>";
		for ($i = 0; $i < 7; $i++)
		{
			echo "<th>$weekarray[$i]</th>";
		}
		echo "</tr>";
		?>		

		<?php
			foreach ($tasks_array as $task_type => $task_config) {
				echo "<tr>";
				for ($i = 0; $i < 7; $i++)
				{
					if ($i < 5 || $task_config['weekend'])
						echo "<td";
					//task flag
					if (array_key_exists($i, $task_config['w_days_array']) && ($i < 5 || $task_config['weekend']))
					{
						if($task_config['w_days_array'][$i] == null)
							echo " class=unknown ";
						elseif($task_config['w_days_array'][$i] == 1)
							echo " class=pass ";
						elseif ($task_config['w_days_array'][$i] == 0)
							echo " class=fail ";
					}
					elseif ($i < 5 || $task_config['weekend'])
						echo " class=unknown ";
					//print id with format week-day-task
					if ($i < 5 || $task_config['weekend'])
						echo "id='week-$i-$task_type'>";
					//work day
					if ($i < 5)
					{
						foreach ($task_config['work_day'] as $display) {
							echo $display['content'];
							echo "<br>";
							if($display['time_range'])
							{
								echo $display['time_range'];
								echo "<br>";								
							}
						}
					}
					//weekend
					else if ($task_config['weekend'])
					{
						foreach ($task_config['weekend'] as $display) {
							echo $display['content'];
							echo "<br>";
							if($display['time_range'])
							{
								echo $display['time_range'];
								echo "<br>";								
							}
						}
					}
				}
				if ($i < 5 || $task_config['weekend'])
					echo "</tr>";
			}
		?>

		<tr>
			<?php
			for ($i = 0; $i < 7; $i++)
			{
				echo "<td";
				if ($score_array[$i] == 10)
					echo " class=awesome ";
				elseif ($score_array[$i] > 30/7)
					echo " class=pass ";
				else
					echo " class=fail ";
				echo ">";
				echo "$score_array[$i]</td>";
			}
			?>
		</tr>
		<!-- <?= $tableStr ?> -->
	</table>
</div>
<div>
	<!-- <?= $navigateLink ?> -->
</div>