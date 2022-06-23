<?php

	include 'connection.php';
			
	$sql = "SELECT * FROM school";
	
	if(isset($_GET["keyword"])){
		$sql .= " WHERE name LIKE '%" . $_GET["keyword"] . "%'";
	}
	
	$result = mysqli_query($connection,$sql);
	
	$school_array = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$school_array[] = $row;
	}
	
	header('Content-type: application/json');
	echo json_encode($school_array);
	
	//close the database
	mysqli_close($connection);

?>