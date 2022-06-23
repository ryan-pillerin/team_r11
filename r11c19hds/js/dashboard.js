	function getSchoolCount(){
			
			$.ajax({
				url: "./api/getSchoolCount.php",
				method: "POST",
				data: {},
				dataType: "json",
				success: function(response){
					
					$.each(response, function(key, value){
						
						$("#school-count").text(value.SCHOOL_COUNT);
					});
					
				}
			});
		}
		
		function getCourseCount(){
			
			$.ajax({
				url: "./api/getCourseCount.php",
				method: "POST",
				data: {},
				dataType: "json",
				success: function(response){
					
					$.each(response, function(key, value){
						
						$("#course-count").text(value.COURSE_COUNT);
						
					});
					
				}
			});
		}
		
		
		function getTrainingCount(){
			
			$.ajax({
				url: "./api/getTrainingCount.php",
				method: "POST",
				data: {},
				dataType: "json",
				success: function(response){
					
					$.each(response, function(key, value){
						
						$("#training-count").text(value.TRAINING_COUNT);
					});
					
				}
			});
		}
		
		function getAllParticipantCount(){
			
			$.ajax({
				url: "./api/getAllParticipantCount.php",
				method: "POST",
				data: {},
				dataType: "json",
				success: function(response){
					
					$.each(response, function(key, value){
						
						$("#participant-sum").text(value.PARTICIPANT_SUM);
					});
					
				}
			});
		}
		
		
		function getAllParticipantsSummary(){
			
			var xValues = [];
			var yValues = [];
			var backgroundColors = [];
			
			$.ajax({
				url: "./api/getAllParticipantsSummary.php",
				method: "POST",
				data: {},
				dataType: "json",
				success: function(response){
					
					$.each(response, function(key, value){						
						xValues.push(value.REMARKS);
						yValues.push(value.PARTICIPANTS_SUM);
						backgroundColors.push(value.COLOR);
					});
					
					new Chart("participant-summary-by-remark",{
							type: "bar",
							data: {
								labels: xValues,
								datasets: [{
									backgroundColor: backgroundColors,
									data: yValues
								}]								
							},
							options: {
								legend: {display: false},
								title: {
									display: true,
									text: "Participants Summary by Remarks"
								}								
							}
						});
					
				}
			});
			
			
		}
		
		
		
		$(function() {
			console.log( "ready!" );
			getSchoolCount();
			getCourseCount();
			getTrainingCount();
			getAllParticipantCount();
			
			getAllParticipantsSummary();
		});