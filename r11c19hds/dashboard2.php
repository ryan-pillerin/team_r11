<!DOCTYPE html>
<html>
<head>
	<title>My Dashoard web page</title>

	<!-- CSS only -->
	<?php include 'common/css.php' ?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
	
	<script src="js/dashboard.js"></script>
	<link href="css/dashboard.css" rel="stylesheet" />
	
</head>
<body>
	<?php include 'common/navigator.php' ?>
	
	<br><br>
	
	
	
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-3">
		  <div class="card-counter primary">
			<i class="fa fa-code-fork"></i>
			<span class="count-numbers" id="school-count">0</span>
			<span class="count-name">Schools</span>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card-counter danger">
			<i class="fa fa-ticket"></i>
			<span class="count-numbers" id="course-count">0</span>
			<span class="count-name">Courses</span>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card-counter success">
			<i class="fa fa-database"></i>
			<span class="count-numbers" id="training-count">0</span>
			<span class="count-name">Trainings</span>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card-counter info">
			<i class="fa fa-users"></i>
			<span class="count-numbers" id="participant-sum">0</span>
			<span class="count-name">Participants</span>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="container">
		<canvas id="participant-summary-by-remark"></canvas>
	<div>
	

	<?php include 'common/js.php' ?>
	
	</body>
	
</html>