<?php

	include 'connection.php';
	
	
	//Check connection
	if(!$connection){
			die("Connection failed: " . mysqli_connect_error);
	}	
	
	$sql = "call sp_updateSchool('" .$_POST["name"] . "'," .
								"'" .$_POST["email"] . "',"
								    .$_POST["numParticipants"] . "," .
								"'" .$_POST["traningCourse"] . "'," .
								"'" .$_POST["remarks"] . "',"
								    .$_POST["schoolId"] . ");";
	//echo $sql;
	
	//$connection-> query($sql);	
	//echo $connection -> insert_id;
	
	$success = false;
	if(mysqli_query($connection, $sql))
	{
		$success = true;
	}
	
	echo $success;

	mysqli_close($connection);
	
?>