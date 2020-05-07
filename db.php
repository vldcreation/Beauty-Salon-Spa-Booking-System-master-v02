<?php
	global $conn;


	$conn = mysqli_connect("localhost", "root", "","maria_salon");
		
	if(!$conn){
		die("Masalah Pada Database");
	}
	$db_use = mysqli_select_db($conn, "maria_salon") or die("Select Database Problem !!");

?>
