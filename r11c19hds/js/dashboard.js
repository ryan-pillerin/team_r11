$(function() {

    getCovidEncounter();
    getAdultCount();
    getFeverCount();
    getForeignerCount();
    getMinorCount();
    getVaccinated();
});

/**
 * Dashboard Methods
 */

function getCovidEncounter() {
    $.ajax({
        type: 'POST',
        url: 'api/getcovidencounter.php',
        success:function (res) {
            res.map((row) => {
                $('#covid-encounter-count').html(row['covidencounter_count']);
            });
        }
    });
}

function getVaccinated() {
	$.ajax({
        type: 'POST',
        url: 'api/getvaccinatedcount.php',
        success:function (res) {
            res.map((row) => {
                $('#vaccinated-count').html(row['vaccinated_count']);
            });
        }
    });
}

function getAdultCount() {
	$.ajax({
        type: 'POST',
        url: 'api/getadultcount.php',
        success:function (res) {
            res.map((row) => {
                $('#adult-count').html(row['adult_count']);
            });
        }
    });
}

function getMinorCount() {
	$.ajax({
        type: 'POST',
        url: 'api/getminorcount.php',
        success:function (res) {
            res.map((row) => {
                $('#minor-count').html(row['minor_count']);
            });
        }
    });
}

function getFeverCount() {
	$.ajax({
        type: 'POST',
        url: 'api/getfevercount.php',
        success:function (res) {
            res.map((row) => {
                $('#fever-count').html(row['fever_count']);
            });
        }
    });
}

function getForeignerCount() {
	$.ajax({
        type: 'POST',
        url: 'api/getforeignercount.php',
        success:function (res) {
            res.map((row) => {
                $('#foreigner-count').html(row['foreignercount']);
            });
        }
    });
}