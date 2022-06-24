<?php 
include '_sqlstoredproc.php';

/**
 * Retrieve all POST data from the form.
 * Data Definition:
 * Name: String
 * Gender: Tiny Int (1 = Male and 0 = Female) still will depend on the database data definition
 * Age: Int
 * Mobile: String
 * Body Temp: Double/Float
 * Covid19Diagnosed: Boolean
 * Covid19Encounter: Boolean
 * Vaccinated: Boolean
 * Nationality: String
 */
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    $formData = array(
        "name"              =>  "'" . stripslashes($_POST['name']) . "'",
        "gender"            =>  "'" . $_POST['gender'] . "'",
        "age"               =>  $_POST['age'],
        "mobile"            =>  "'" . $_POST['mobile'] . "'",
        "bodytemp"          =>  $_POST['bodyTemp'],
        "covid19diagnosed"  =>  $_POST['covid19Diagnosed'] == "Yes" ? 1 : 0,
        "covid19rncounter"  =>  $_POST['covid19Encounter'] == "Yes" ? 1 : 0,
        "vaccinated"        =>  $_POST['vaccinated'] == "Yes" ? 1 : 0,
        "nationality"       =>  "'" . $_POST['nationality'] . "'"
    );

    /**
     * Process the saving of record in the database based on the form data.
     */

    $sql = array(
        "sql" => sqlInsertData($formData, '')
    );

    /**
     * Set the document type to json
     */
    header('Content-type: text/json');
    echo json_encode($sql);

} else {
    header('Content-type: text/json');
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Invalid Server Request'
     ));

}

?>