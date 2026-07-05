<?php
	$servereName = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$DbName+ "project01";
	
	$conn = msql_connect($servername, $dBUsername, $dBPassword, $dBName);
	
	if (!$conn) {
		die ("Connection failed: " . mysqli_connect_());
	}