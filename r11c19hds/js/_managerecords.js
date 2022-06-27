
/**
 * Event Management
 */
$(function() {

    /**
     * Adding of record in the database
     */
    $('#save').click(function() {
        /**
         * Check all records if they are not null
         */
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
            alert("save");
        }

    });
});


/**
 * Function to add a record in the database
 */
function addRecord(formData) {
}
