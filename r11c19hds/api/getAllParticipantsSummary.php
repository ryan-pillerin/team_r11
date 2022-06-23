<?php

	include 'connection.php';
			
	$sql = "call sp_getAllParticipantsSummary";	
	
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