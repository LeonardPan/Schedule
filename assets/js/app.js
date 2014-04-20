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