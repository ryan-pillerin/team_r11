function addEditRow(){
	
	var isAdd = $('#isAdd').val();
	console.log(isAdd);
	if(isAdd == 'true'){
		addNewRow();
		console.log("addNewRow");
	}else{
		updateRow();
		console.log("updateRow");
	}
}

function showModal(isAdd){
	
	$('#isAdd').val(true);
	$('#addModalLabel').html("Insert Record");
	clearAll();
	$('#addModal').modal('show');
}	

function updateRow(){
	
	var schoolId = $('#school-id').val();
	var schoolName = $('#school-name').val();
	var schoolEmail = $('#school-email').val();
	var numParticipants = $('#num-participants').val();
	
	var traningCourse = $('#training-course option:selected').text();
	var remarks = $('#remarks').val();
	
	
	updateSchool(schoolName, schoolEmail, numParticipants, traningCourse, remarks, schoolId);
	
	clearAll();
	$('#addModal').modal('hide');
}


function updateSchool(name, email, numParticipants, traningCourse, remarks, schoolId){
	
	$.ajax({
		url: './api/updateSchool.php',
		method: "POST",
		data: {
			"name" : name,
			"email": email,
			"numParticipants" : numParticipants,
			"traningCourse" : traningCourse,
			"remarks" : remarks,
			"schoolId" : schoolId
		},
		dataType: "json",
		success: function(sucess){
			
			if(sucess != ""){
				getSchools();
			}
		}		
		
	});
	
}



function addNewRow(){

	var schoolName = $('#school-name').val();
	var schoolEmail = $('#school-email').val();
	var numParticipants = $('#num-participants').val();
	
	var traningCourse = $('#training-course option:selected').text();
	var remarks = $('#remarks').val();
	
	insertSchool(schoolName, schoolEmail, numParticipants, traningCourse, remarks);			
	
	clearAll(); //Invoke another function
	
	$('#addModal').modal('hide');

}

function insertSchool(name, email, numParticipants, traningCourse, remarks){
	
	$.ajax({
		url: './api/insertSchool.php',
		method: "POST",
		data: {
			"name" : name,
			"email": email,
			"numParticipants" : numParticipants,
			"traningCourse" : traningCourse,
			"remarks" : remarks			
		},
		dataType: "json",
		success: function(schoolId){
			
			if(schoolId != ""){
				addNewRowHTML(schoolId, name, email, numParticipants, traningCourse, remarks)
				
			}
		}		
		
	});
	
	
}

function editSchool(schoolId){
	
	console.log(schoolId);
	
	$.ajax({
		url: './api/getSchoolById.php',
		method: "GET",
		data: {
			"schoolId" : schoolId		
		},
		dataType: "json",
		success: function(response){
			
			$.each(response, function(key, value){
				
				$('#school-id').val(value.SchoolID);
				$('#school-name').val(value.Name);
				$('#school-email').val(value.Email);
				$('#num-participants').val(value.NumParticipants);
				
				$('#training-course').find('option:contains(' + value.TrainingCourse + ')').attr('selected', 'selected');
				
				$('#remarks').val(value.Remarks);
				
				$('#isAdd').val(false);
				$('#addModalLabel').html('Update Record');
				$('#addModal').modal('show');
				
			});
		}		
		
	});
}

function addNewRowHTML(schoolId,schoolName, schoolEmail, numParticipants, traningCourse, remarks){
	
	var newRow = '<tr>' +
					'<td>' + schoolName + '</td>' +
					'<td>' + schoolEmail + '</td>' +
					'<td>' + numParticipants + '</td>' +
					'<td>' + traningCourse + '</td>' +
					'<td>' + remarks + '</td>' +
					'<td><button class="btn btn-info" onClick="editSchool(' + schoolId +')">Edit</button></td>' +
					'<td><button class="btn btn-danger" onClick="deleteSchool(' + schoolId +')">Delete</button></td>' +
				'</tr>';
	
	var tableBody = $('#school-table tbody');
	tableBody.append(newRow);
	
}

function deleteSchool(schoolId){
	
	var response = confirm("Delete school ID " + schoolId + ": Are you sure?");
	
	if(response){
		$.ajax({
			url: './api/deleteSchool.php',
			method: "POST",
			data: {			
				"schoolId" : schoolId
			},
			dataType: "json",
			success: function(sucess){
				
				if(sucess != ""){
					getSchools();
				}
			}
		});
	}
	
}



function clearAll(){
	
	$('#school-id').val('');
	$('#school-name').val('');
	$('#school-email').val('');
	$('#num-participants').val('');	
	$('#training-course').prop("selectedIndex",0);
	$('#remarks').val('');
	
}

function getSchools(){
	
	$.ajax({
		url: './api/getSchools.php',
		method: "POST",
		data: {},
		dataType: "json",
		success: function(response){
			
			$('#school-table tbody').empty();
			
			$.each(response, function(key, value){
				
				addNewRowHTML(value.SchoolID,value.Name, value.Email, value.NumParticipants, value.TrainingCourse, value.Remarks)
				
			});
		}		
		
	});
	
}


function searchSchool(){
	
	var keyword = $("#search").val();
	
	$.ajax({
		url: './api/getSchools.php',
		method: "GET",
		data: {
			"keyword" : keyword
		},
		dataType: "json",
		success: function(response){
			
			$('#school-table tbody').empty();
			
			$.each(response, function(key, value){
				
				addNewRowHTML(value.SchoolID,value.Name, value.Email, value.NumParticipants, value.TrainingCourse, value.Remarks)
				
			});
		}		
		
	});
	
}


$(function() {
    console.log( "ready!" );
	getSchools();
});