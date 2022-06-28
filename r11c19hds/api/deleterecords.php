<?php
include '_sqlstoredproc.php';

$result = sqlDeleteData(" WHERE userID = '" . $_POST['userID'] . "'", "users");
echo $result;

?>