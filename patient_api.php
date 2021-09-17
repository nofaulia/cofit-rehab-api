<?php 
// required header
header('Access-Control-Allow-Origin: *');

require_once "patient.php";

$patient = new Patient();

$request_method=$_SERVER["REQUEST_METHOD"];

if ($request_method == 'POST') {
	$data = (array) json_decode(file_get_contents('php://input'), TRUE);

	$phonenumber = $data["phonenumber"];
	$password = $data["password"];

	$patient -> get_patient($phonenumber, $password);
	
} elseif($request_method == 'GET'){
	$patient_id = $_GET["patient_id"];
	$patient -> calculateMaxHR($patient_id);
		
} elseif ($request_method == 'OPTIONS') {
	$patient -> response_request();
} else {
	// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
}


?>