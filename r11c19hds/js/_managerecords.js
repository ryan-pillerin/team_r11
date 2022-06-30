
/**
 * Event Management
 */
$(function() {

    getRecords();

    /**
     * Save Function
     */
    $('#save').click(function() {
        /**
         * Check all records if they are not null
         */

        if ( $("#isAdd").val() == "false" ) {
            updateRecord({
                'userID': $('#isAdd').attr('data-id'),
                'name': $('#name').val(),
                'gender': $('#gender:checked').val(),
                'age': $('#age').val(),
                'mobileno': $('#mobileno').val(),
                'bodytemp': $('#bodytemp').val(),
                'covid19diagnosed': $('#diagnosed:checked').val(),
                'covid19rncounter': $('#encounter:checked').val(),
                'vaccinated': $('#vacinated:checked').val(),
                'nationality': $('#nationality').val()
            });
        } else {
            let validateFields = $(".validateFields");
            let isValid = true;
            validateFields.each(function() {
                let thisVal = $(this);
                if ( $("#" + thisVal.attr("data-name")).val() == "" ) {
                    isValid = false;
                    let fieldName = thisVal.attr("data-name")
                    if (fieldName == "mobileno") {
                        fieldName = "Mobile Number";
                    } else if ( fieldName == "bodytemp" ) {
                        fieldName = "Body Temp";
                    }

                    thisVal.text("* " + fieldName.charAt(0).toUpperCase() + fieldName.slice(1) + " is required field!");
                    thisVal.removeClass('d-none');
                    thisVal.addClass('d-block');
                } else {
                    thisVal.removeClass('d-block');
                    thisVal.addClass('d-none');
                }
            });

            if (isValid == true) {    
                addRecord({
                    'name': $('#name').val(),
                    'gender': $('#gender:checked').val(),
                    'age': $('#age').val(),
                    'mobileno': $('#mobileno').val(),
                    'bodytemp': $('#bodytemp').val(),
                    'covid19diagnosed': $('#diagnosed:checked').val(),
                    'covid19rncounter': $('#encounter:checked').val(),
                    'vaccinated': $('#vacinated:checked').val(),
                    'nationality': $('#nationality').val()
                });
            }
        }
    });

    $('#searchname').keydown(function(event) {
        if (event.keyCode == 13) {
            searchName({
                'name': $('#searchname').val()
            });
        }
    });
    
    $('#btnSearch').click(function() {
        searchName({
            'name': $('#searchname').val()
        });
    });

    /**
     * Close Add Form
     */
    $("#close,.btn-close").click(function() {
        let validateFields = $(".validateFields");
        validateFields.each(function() {
            let thisVal = $(this);
            $("#" + thisVal.attr("data-name")).val("");
            thisVal.removeClass('d-block');
            thisVal.addClass('d-none');
        });
    });
});


/**
 * Function to add a record in the database
 */
function addRecord(formData) {
    let loader = `
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        <span class="visually-hidden">Saving...</span>`;
    $.ajax({
        type: "POST",
        url: "api/addrecords.php",
        data: formData,
        beforeSend: function() {
            $('#save').html(loader).attr({'disabled':'disabled'});
            $('#close,.btn-close').attr({'disabled':'disabled'});
        }, success: function( res ) {
            $('#save').html('Save').removeAttr('disabled');
            $('#close,.btn-close').removeAttr('disabled');
            $('#close,.btn-close').trigger('click');

            /**
             * Refresh the data table for the new record, or attach the record on
             * the very top.
             */
            getRecords();
        }
    });
}

function showModal(isAdd){
	$('#isAdd').val(isAdd);
    if ( isAdd == false ) {
        $('#addModalLabel').html("Edit Record");
    } else {
	    $('#addModalLabel').html("Insert Record");
    }
	$('#addModal').modal('show');
}

/**
 * Get all records
 */
function getRecords() {
    
    $.ajax({
        type: 'POST',
        url: 'api/getrecords.php',
        beforeSend: function() {
            console.log('Retrieving records...');
        }, success: function( res ) {
            let htmlData = '';
            res.map((row) => {
                htmlData += `<tr>`;
                htmlData += `   <td>${row['name']}</td>`;
                htmlData += `   <td>${row['gender']}</td>`;
                htmlData += `   <td>${row['age']}</td>`;
                htmlData += `   <td>${row['mobile']}</td>`;
                htmlData += `   <td>${row['body_temp']}</td>`;
                htmlData += `   <td>${row['covid_diagnosed'] == 1 ? 'Yes' : 'No'}</td>`;
                htmlData += `   <td>${row['covid_encounter'] == 1 ? 'Yes' : 'No'}</td>`;
                htmlData += `   <td>${row['vaccinated'] == 1 ? 'Yes' : 'No'}</td>`;
                htmlData += `   <td>${row['nationality']}</td>`;
                htmlData += `   <td><button class="btn btn-primary btn-edit" data-id="${row['userID']}">Edit</button></td>`;
                htmlData += `   <td><button class="btn btn-danger btn-delete" data-id="${row['userID']}">Delete</button></td>`;
                htmlData += `</tr>`;
            });
            $('#records').html(htmlData);

            $('.btn-edit').click(function() {
                let userID = $(this).attr('data-id');
                /**
                 * Retrieve the record based on User ID
                 */
                 getRecordById({
                    userID: userID
                 })
            });

            /**
             * Delete Record Function
             */
            $('.btn-delete').click(function() {
                let userId = $(this).attr('data-id');
                let toDelete = confirm("Are you sure you want to delete this record?");

                if (toDelete == true) {
                    deleteRecord({
                        userID: userId
                    });
                }
            });
        }
    });

}

/**
 * Delete Record 
 */
function deleteRecord(params) {

    $.ajax({
        type: 'POST',
        url: 'api/deleterecords.php',
        data: params, 
        beforeSend: function() {
            console.log('deleting records...');
        }, success: function( res ) {
            getRecords();
        }
    });
}

/**
 * Get Record by ID
 */
function getRecordById(param) {

    $.ajax({
        type: 'POST',
        url: 'api/getrecordbyid.php',
        data: param, 
        beforeSend: function() {
            console.log('retrieving record by user id...');
        }, success: function( res ) {
            res.map(function(row) {
                $("#isAdd").attr({'data-id': row['userID']});
                $('#name').val(row['name']);
                $('input:radio[name="gender"][value="' + row['gender'] + '"]').prop('checked', true);
                $('#age').val(row['age']);
                $('#bodytemp').val(row['body_temp']);
                $('#mobileno').val(row['mobile']);
                if ( row['covid_diagnosed'] == 1 ) {
                    $('input:radio[name="diagnosed"][value="Yes"]').prop('checked', true);
                } else {
                    $('input:radio[name="diagnosed"][value="No"]').prop('checked', true);
                }

                if ( row['covid_encounter'] == 1) {
                    $('input:radio[name="encounter"][value="Yes"]').prop('checked', true);
                } else {
                    $('input:radio[name="encounter"][value="Yes"]').prop('checked', true);
                }

                if ( row['vaccinated'] == 1) {
                    $('input:radio[name="vacinated"][value="Yes"]').prop('checked', true);
                } else {
                    $('input:radio[name="vacinated"][value="Yes"]').prop('checked', true);
                }

                $('#nationality').val(row['nationality']);
            });
            showModal(false);
        }
    });

}

function updateRecord(params) {
    $.ajax({
        type: 'POST',
        url: 'api/updaterecord.php',
        data: params,
        success: function( res ) {
            $('#close,.btn-close').trigger('click');
            getRecords();
        }
    });
}

function searchName(searchText) {
    $.ajax({
        type: 'POST',
        url: 'api/getrecordbyname.php',
        data: searchText,
        success: function( res ) {
            let htmlData = '';
            res.map((row) => {
                htmlData += `<tr>`;
                htmlData += `   <td>${row['name']}</td>`;
                htmlData += `   <td>${row['gender']}</td>`;
                htmlData += `   <td>${row['age']}</td>`;
                htmlData += `   <td>${row['mobile']}</td>`;
                htmlData += `   <td>${row['body_temp']}</td>`;
                htmlData += `   <td>${row['covid_diagnosed'] == 1 ? 'Yes' : 'No'}</td>`;
                htmlData += `   <td>${row['covid_encounter'] == 1 ? 'Yes' : 'No'}</td>`;
                htmlData += `   <td>${row['vaccinated'] == 1 ? 'Yes' : 'No'}</td>`;
                htmlData += `   <td>${row['nationality']}</td>`;
                htmlData += `   <td><button class="btn btn-primary btn-edit" data-id="${row['userID']}">Edit</button></td>`;
                htmlData += `   <td><button class="btn btn-danger btn-delete" data-id="${row['userID']}">Delete</button></td>`;
                htmlData += `</tr>`;
            });
            $('#records').html(htmlData);

            $('.btn-edit').click(function() {
                let userID = $(this).attr('data-id');
                /**
                 * Retrieve the record based on User ID
                 */
                 getRecordById({
                    userID: userID
                 })
            });

            /**
             * Delete Record Function
             */
            $('.btn-delete').click(function() {
                let userId = $(this).attr('data-id');
                let toDelete = confirm("Are you sure you want to delete this record?");

                if (toDelete == true) {
                    deleteRecord({
                        userID: userId
                    });
                }
            });
        }
    })
}