<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "cofit-rehab";

	// $dbhost = "cofitrehab-ui.org";
	// $dbuser = "n1562941_admin";
	// $dbpass = "cofit-Rehab123";
	// $db = "n1562941_cofit-rehab";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
?>
