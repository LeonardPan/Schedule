
<div>
	<form method="GET" action="calender1.php">
		<!-- <?= $inputForm ?> -->
	</form>
</div>
<div>
	<table id="WeekTable" border="1">
		<caption><?php echo "2014"."年". "4" ."月" ?></caption>
		<tr>
			<th>星期一</th>
			<th>星期二</th>
			<th>星期三</th>
			<th>星期四</th>
			<th>星期五</th>
			<th>星期六</th>
			<th>星期天</th>
		</tr>
		<tr>
			<?php 
			for ($i = 0; $i < 7; $i++)
			{
				if ($i < 5)
					echo "<td id='week-$i-A'>按点睡觉<br>（23:00前入睡，<br>7:00-7:30之间起床）</td>";
				else
					echo "<td id='week-$i-A'>按点睡觉<br>（23:30前入睡，<br>9:30前起床）</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			for ($i = 0; $i < 7; $i++)
			{
				if ($i < 5)
					echo "<td id='week-$i-B'>申论模考<br>或 行测补考及解析<br>9:30-11:30</td>";
				else
					echo "<td id='week-$i-B'>行测模考<br>10:00-12:00</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			for ($i = 0; $i < 7; $i++)
			{
				if ($i < 5)
					echo "<td id='week-$i-C'>午睡<br>（12:00-13:30）</td>";
				else
					echo "<td id='week-$i-C'>午睡<br>（12:30-14:30）</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			for ($i = 0; $i < 7; $i++)
			{
				if ($i < 5)
					echo "<td id='week-$i-D'>行测模考<br>（13:30-15:30）<br>申论解析<br>（15:30-17:00）</td>";
				else
					echo "<td id='week-$i-D'>行测补考及解析<br>（14:30-16:30）</td>";
			}
			?>
		</tr>
		<tr>
			<?php
			for ($i = 0; $i < 5; $i++)
			{
				echo "<td id='week-$i-E'>行测补考及解析<br>或 视频课程<br>（19:00-21:00）</td>";
			}
			?>
		</tr>
		<!-- <?= $tableStr ?> -->
	</table>
</div>
<div>
	<!-- <?= $navigateLink ?> -->
</div>