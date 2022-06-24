<?php

include 'connection.php';

function sqlInsertData($formData, $tableName) {
    
    $_connection = openConnection();

    if ( !$_connection ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    /**
     * Generate INSERT SQL Statement
     */
    $rowCount = count($formData);
    $indexRowCount = 0;

    $sql = "INSERT INTO " . $tableName;
    $columns = "(";
    $values = " VALUES(";
    foreach($formData as $key => $val) {
        if ( $indexRowCount < ($rowCount -1) ) {
            $columns .= $key . ", ";
            $values .= $val . ", ";
        } else {
            $columns .= $key . ")";
            $values .= $val . ")";
        }
        $indexRowCount++;
    }

    /**
     * Execute Insert Statement
     */
    //$result = $_connection->query($sql . $columns . $values);
    //return $result->insert_id;
}

/**
 * SQL Update Records in the database
 */
function sqlUpdateData($formData) {



}

function sqlDeleteData($formData) {

}
?>