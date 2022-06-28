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
    $_rowCount = count($formData);
    $_indexRowCount = 0;

    $sql = "INSERT INTO " . $tableName;
    $columns = "(";
    $values = " VALUES(";
    foreach($formData as $key => $val) {
        if ( $_indexRowCount < ($_rowCount -1) ) {
            $columns .= $key . ", ";
            $values .= $val . ", ";
        } else {
            $columns .= $key . ")";
            $values .= $val . ")";
        }
        $_indexRowCount++;
    }

    /**
     * Execute Insert Statement
     */
    $result = $_connection->query($sql . $columns . $values);
    return $result;
}

/**
 * SQL Update Records in the database
 */
function sqlUpdateData($formData, $tableName) {

    $_connection = openConnection();

    if ( !$_connection ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $_rowCount = count($formData);
    $_indexRowCount = 0;
    $sql = "UPDATE " . $tableName . " ";
    $set = "SET ";
    foreach($formData as $key => $val) {
        if ( $_indexRowCount < ($_rowCount - 1) ) {
            $set .= $key . " = " . $val . ", ";
        } else {
            $set .= $key . " = " . $val;
        }
        $_indexRowCount++;
    }
    //$result = $_connection->query($sql . $columns . $values);
    return $sql . $set;
}

/**
 * SQL Delete Records in the database
 */
function sqlDeleteData($condition, $tableName) {
    $_connection = openConnection();

    if ( !$_connection ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM " . $tableName . $condition;
    $result = $_connection->query($sql);
    return $result;
}

/**
 * SQL Stored Procedure
 * procedureName = Store Proc Name in SQL
 * parameters = is the values inserted into the stored proc, it should
 * be declared as an array.
 */
function sqlStoredProc($procedureName) {
    
    $_connection = openConnection();

    if ( !$_connection ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CALL " . $procedureName . "();";
    /*$_rowCount = count($parameters);
    $_indexRowCount = 0;
    $params = "";
    foreach( $parameters as $key => $val ) {
        if ( $_indexRowCount < ($_rowCount - 1) ) {
            $params .= $val . ", ";
        } else {
            $params .= $val . ")";
        }
    }*/
    
    $result = $_connection->query($sql);
    return $result;
    //return $sql;
}
?>