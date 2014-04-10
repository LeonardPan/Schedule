
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
		$task_A_array = array();
		$task_B_array = array();
		$task_C_array = array();
		$task_D_array = array();
		$task_E_array = array();

		foreach ($tasks as $task) {
			if ($task->task == 'A')
			{
				$task_A_array[$task->w_day] = $task->flag;
			}
			elseif ($task->task == 'B')
			{
				$task_B_array[$task->w_day] = $task->flag;
			}
			elseif ($task->task == 'C')
			{
				$task_C_array[$task->w_day] = $task->flag;
			}
			elseif ($task->task == 'D')
			{
				$task_D_array[$task->w_day] = $task->flag;
			}
			elseif ($task->task == 'E')
			{
				$task_E_array[$task->w_day] = $task->flag;
			}
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
	<table id="WeekTable" border="1">
		<!-- <caption><?php echo $year."年". $month ."月" . $day . "日	星期" . $day_of_week ?></caption> -->
		<tr>
			<?php
			//table head
			for ($i = 0; $i < 7; $i++)
			{
				echo "<th>$weekarray[$i]</th>";
			}
			?>
		</tr>
		<tr>
			<?php 
			//task A
			for ($i = 0; $i < 7; $i++)
			{
				echo "<td ";
				if (array_key_exists($i, $task_A_array))
				{
					if($task_A_array[$i] == null)
						echo "class=unknown ";
					elseif($task_A_array[$i] == 1)
						echo "class=pass ";
					elseif ($task_A_array[$i] == 0)
						echo "class=fail ";
				}
				else
					echo "class=unknown ";
				if ($i < 5)
					echo "id='week-$i-A'>按点睡觉<br>（23:00前入睡，<br>7:00-7:30之间起床）</td>";
				else
					echo "id='week-$i-A'>按点睡觉<br>（23:30前入睡，<br>9:30前起床）</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			//task B
			for ($i = 0; $i < 7; $i++)
			{
				echo "<td ";
				if (array_key_exists($i, $task_B_array))
				{
					if($task_B_array[$i] == null)
						echo "class=unknown ";
					elseif($task_B_array[$i] == 1)
						echo "class=pass ";
					elseif ($task_B_array[$i] == 0)
						echo "class=fail ";
				}
				else
					echo "class=unknown ";
				if ($i < 5)
					echo "id='week-$i-B'>申论模考<br>或 行测补考及解析<br>9:30-11:30</td>";
				else
					echo "id='week-$i-B'>行测模考<br>10:00-12:00</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			//task C
			for ($i = 0; $i < 7; $i++)
			{
				echo "<td ";
				if (array_key_exists($i, $task_C_array))
				{
					if($task_C_array[$i] == null)
						echo "class=unknown ";
					elseif($task_C_array[$i] == 1)
						echo "class=pass ";
					elseif ($task_C_array[$i] == 0)
						echo "class=fail ";
				}
				else
					echo "class=unknown ";
				if ($i < 5)
					echo "id='week-$i-C'>午睡<br>（12:00-13:30）</td>";
				else
					echo "id='week-$i-C'>午睡<br>（12:30-14:30）</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			//task D
			for ($i = 0; $i < 7; $i++)
			{
				echo "<td ";
				if (array_key_exists($i, $task_D_array))
				{
					if($task_D_array[$i] == null)
						echo "class=unknown ";
					elseif($task_D_array[$i] == 1)
						echo "class=pass ";
					elseif ($task_D_array[$i] == 0)
						echo "class=fail ";
				}
				else
					echo "class=unknown ";
				if ($i < 5)
					echo "id='week-$i-D'>行测模考<br>（13:30-15:30）<br>申论解析<br>（15:30-17:00）</td>";
				else
					echo "id='week-$i-D'>行测补考及解析<br>（14:30-16:30）</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			//task E
			for ($i = 0; $i < 5; $i++)
			{
				echo "<td ";
				if (array_key_exists($i, $task_E_array))
				{
					if($task_E_array[$i] == null)
						echo "class=unknown ";
					elseif($task_E_array[$i] == 1)
						echo "class=pass ";
					elseif ($task_E_array[$i] == 0)
						echo "class=fail ";
				}
				else
					echo "class=unknown ";
				echo "id='week-$i-E'>行测补考及解析<br>或 视频课程<br>（19:00-21:00）</td>";
			}
			?>
		</tr>
		<!-- <?= $tableStr ?> -->
	</table>
</div>
<div>
	<!-- <?= $navigateLink ?> -->
</div>