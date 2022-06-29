<?php 

include '_sqlstoredproc.php';

$results = sqlStoredProc('sp_getrecords', NULL);

$records = array();
while($row = mysqli_fetch_assoc($results)) {
    $records[] = $row;
}
/**
 * Set the document type to json
 */
header('Content-type: text/json');
echo json_encode($records);

?>