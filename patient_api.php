<?php 
require_once "patient.php";

$patient = new Patient();

$request_method=$_SERVER["REQUEST_METHOD"];

if ($request_method == 'POST') {
	if(!empty($_POST["email"]) && !empty($_POST["password"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$patient -> get_patient($email, $password);
	} else {
		// Invalid parameter
		header("HTTP/1.0 400 Bad Request");
	}
} else {
	// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
}


?>