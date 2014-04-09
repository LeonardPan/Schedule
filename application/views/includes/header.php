<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8">
	<title>untitled</title>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">

	<!-- <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" 
	type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"
	type="text/css" media="screen" charset="utf-8"> -->
	
	<script type='text/javascript' src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(e){
			$('#WeekTable').click(function(e){
				if($(e.target).prop("tagName").toLowerCase() == "td")
				{
					var lFlag = $(e.target).attr('class');
					var lDay = e.target.id.split('-')[1];
					var lTask = e.target.id.split('-')[2];

					$.ajax({
						url: window.location,
						type: 'POST',
						data: {
							w_day: lDay,
							task: lTask,
							flag: lFlag
						},
						success: function(msg) {
							location.reload();
						}
					});
				}
			});
		});
	</script>
</head>

<body>