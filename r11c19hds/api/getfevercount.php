<?php
include '_sqlstoredproc.php';

$result = sqlStoredProc("sp_fevercount",NULL);

$records = array();
while($row = mysqli_fetch_assoc($result)) {
    $records[] = $row;
}
/**
 * Set the document type to json
 */
header('Content-type: text/json');
echo json_encode($records);

?>