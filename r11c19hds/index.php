<!DOCTYPE html>
<html>
<head>
	<title>R11 Covid-19 Health Declaration System</title>
	
	<?php include 'common/css.php' ?>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	
	<script src="js/crud.js"></script>	
</head>
<body>

	<?php include 'common/navigator.php' ?>
	
	<br><br>
	
	<div class="container-fluid">
		<button type="button" class="btn btn-primary" onClick="showModal(true)" style="float: right">Add</button>
		<input type="text" id="search" class="">
		<button type="button" class="btn btn-primary" onClick="searchSchool()">Search</button>
		<table id="school-table" class="table table-responsive table-hover table-dark">
			<thead>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Mobile No.</th>
				<th>COVID-19 Diagnosed</th>
				<th>COVID-19 Encounter</th>
				<th>Vacinated</th>
				<th>Nationality</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>							
			</tbody>			
		</table>	
	</div>
	
	<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="addModalLabel">Add Record</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form>
			  <div class="mb-3">
				<label for="school-name" class="col-form-label">Name:</label>
				<input type="text" class="form-control" id="school-name">
				<input type="hidden" id="isAdd">
				<input type="hidden" id="school-id">
			  </div>
			  <div class="mb-3">
				<label for="gender" class="col-form-label">Gender:</label>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="gender" id="male">
				  <label class="form-check-label" for="flexRadioDefault1">
					Male
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="gender" id="female" checked>
				  <label class="form-check-label" for="flexRadioDefault2">
					Female
				  </label>
				</div>
			  </div>
			  <div class="mb-3">
				<label for="num-participants" class="col-form-label">Age:</label>
				<input type="text" class="form-control" id="num-participants">
			  </div>
			  <div class="mb-3">
				<label for="num-participants" class="col-form-label">Mobile No.:</label>
				<input type="text" class="form-control" id="num-participants">
			  </div>
			  <div class="mb-3">
				<label for="num-participants" class="col-form-label">Body Temp.:</label>
				<input type="text" class="form-control" id="num-participants">
			  </div>
			  <div class="mb-3">
				<label for="diagnosed" class="col-form-label">COVID-19 Diagnosed:</label>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="diagnosed" id="flexRadioDefault1">
				  <label class="form-check-label" for="flexRadioDefault1">
					Yes
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="diagnosed" id="flexRadioDefault2" checked>
				  <label class="form-check-label" for="flexRadioDefault2">
					No
				  </label>
				</div>
			  </div>
			  <div class="mb-3">
				<label for="encounter" class="col-form-label">COVID-19 Encounter:</label>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="encounter" id="encounter1">
				  <label class="form-check-label" for="flexRadioDefault1">
					Yes
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="encounter" id="encounter2" checked>
				  <label class="form-check-label" for="flexRadioDefault2">
					No
				  </label>
				</div>
			  </div>
			  <div class="mb-3">
				<label for="vacinated" class="col-form-label">Vacinated:</label>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="vacinated" id="vacinated1">
				  <label class="form-check-label" for="flexRadioDefault1">
					Yes
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="vacinated" id="vacinated2" checked>
				  <label class="form-check-label" for="flexRadioDefault2">
					No
				  </label>
				</div>
			  </div>
			  <div class="mb-3">
				<label for="remarks" class="col-form-label">Nationality:</label>
				<input type="text" class="form-control" id="nationality">
			  </div>
			</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" id="save" class="btn btn-primary" onClick="addEditRow();">Save</button>
		  </div>
		</div>
	  </div>
	</div>
	
	
</body>

	<?php include 'common/js.php' ?>

</html>