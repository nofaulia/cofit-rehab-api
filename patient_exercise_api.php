<?php 
// required header
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

// header('Access-Control-Allow-Methods': 'POST, GET, OPTIONS')

require_once "patient_exercise.php";

$patient_exercise = new PatientExercise();

$request_method=$_SERVER["REQUEST_METHOD"];

switch ($request_method) {
	case 'POST':
		$patient_exercise -> insert_patient_exercise();
		break;
	case 'GET':
		if (empty($_GET["patient_id"])) 
		{
			// Invalid parameter
			header("HTTP/1.0 400 Bad Request");
			break;
		} elseif (!empty($_GET["patient_id"]) && !empty($_GET["start_date"]) && !empty($_GET["end_date"]))
		{
			$patient_id = $_GET["patient_id"];
			$start_date = $_GET["start_date"];
			$end_date = $_GET["end_date"];

			$patient_exercise -> get_patient_exercise($patient_id, $start_date, $end_date);
		} elseif (!empty($_GET["patient_id"]) && empty($_GET["start_date"]) && empty($_GET["end_date"]))
		{
			$patient_id = $_GET["patient_id"];
		
			$patient_exercise -> get_all_patient_exercise($patient_id);
		} else 
		{
			// Invalid parameter
			header("HTTP/1.0 400 Bad Request");
		}
		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	break;
}



?>