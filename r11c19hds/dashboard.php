<!DOCTYPE html>
<html>
<head>
	<title>R11 Covid-19 Health Declaration System</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
		rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	
	<?php include 'common/css.php' ?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	
	<script src="js/crud.js"></script>	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
	<script src="js/dashboard.js"></script>
	<link href="css/dashboard.css" rel="stylesheet" />
</head>
<body>

	<?php include 'common/navigator.php' ?>
	
	<br><br>
	
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		  <div class="card-counter primary">
			<i class="fa fa-code-fork"></i>
			<span class="count-numbers" id="school-count">0</span>
			<span class="count-name">COVID-19 ENCOUNTER</span>
		  </div>
		</div>

		<div class="col-md-4">
		  <div class="card-counter info">
			<i class="fa fa-ticket"></i>
			<span class="count-numbers" id="course-count">0</span>
			<span class="count-name">VACCINATED</span>
		  </div>
		</div>

		<div class="col-md-4">
		  <div class="card-counter danger">
			<i class="fa fa-database"></i>
			<span class="count-numbers" id="training-count">0</span>
			<span class="count-name">FEVER</span>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		  <div class="card-counter danger">
			<i class="fa fa-code-fork"></i>
			<span class="count-numbers" id="school-count">0</span>
			<span class="count-name">ADULT</span>
		  </div>
		</div>

		<div class="col-md-4">
		  <div class="card-counter success">
			<i class="fa fa-ticket"></i>
			<span class="count-numbers" id="course-count">0</span>
			<span class="count-name">MINOR</span>
		  </div>
		</div>

		<div class="col-md-4">
		  <div class="card-counter primary">
			<i class="fa fa-database"></i>
			<span class="count-numbers" id="training-count">0</span>
			<span class="count-name">FOREIGNER</span>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="container">
		<canvas id="participant-summary-by-remark"></canvas>
	<div>
	
</body>

	<?php include 'common/js.php' ?>

</html>