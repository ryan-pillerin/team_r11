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
 */
function sqlStoredProc($procedureName, $condition) {
    
    $_connection = openConnection();

    if ( !$_connection ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ( $condition ) {
        $sql = "CALL " . $procedureName . "(". $condition . ");";
    } else {
        $sql = "CALL " . $procedureName . "();";
    }
    $result = $_connection->query($sql);
    return $result;
    //return $sql;
}


?>