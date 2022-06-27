<?php
	/**
	 * Database Connection
	 */

	function openConnection() {
		$_dbHost = 'localhost';
		$_dbName = 'r11c19hds_db';
		$_dbUserName = 'root';
		$_dbPassword = '';

		return mysqli_connect($_dbHost, $_dbUserName, $_dbPassword, $_dbName);
	}

	function closeConnection($_connection) {
		$_connection->close();
	}

?>