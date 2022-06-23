<?php

	include 'connection.php';
	
	
	//Check connection
	if(!$connection){
			die("Connection failed: " . mysqli_connect_error);
	}	
	
	$sql = "INSERT INTO school (Name, Email, NumParticipants, TrainingCourse, Remarks) " . 
			"VALUES ('". $_POST["name"] ."', " . 
					"'". $_POST["email"] ."', " .
					"'". $_POST["numParticipants"] ."', " .
					"'". $_POST["traningCourse"] ."', " .
					"'". $_POST["remarks"] ."') " ;

	//echo $sql;
	
	//$connection-> query($sql);	
	//echo $connection -> insert_id;
	
	mysqli_query($connection, $sql);
	echo mysqli_insert_id($connection);
	
?>