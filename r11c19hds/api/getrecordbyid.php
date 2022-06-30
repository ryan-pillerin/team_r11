<?php

include '_sqlstoredproc.php';

$result = sqlStoredProc('sp_getrecordbyid', $_POST['userID']);

$record = array();
while($row = mysqli_fetch_assoc($result)) {
    $record[] = $row;
}

/**
 * Set the document type to json
 */
header('Content-type: text/json');
echo json_encode($record)

?>