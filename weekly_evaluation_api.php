<?php
// required header
header('Access-Control-Allow-Origin: *');

require_once "weekly_evaluation.php";

$eval = new WeeklyEvaluation();

$request_method=$_SERVER["REQUEST_METHOD"];

switch ($request_method) {
	case 'OPTIONS':
		$eval -> response_request();
		break;
	case 'POST':
		$eval -> insert_weekly_evaluation();
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

			$eval -> get_weekly_evaluation($patient_id, $start_date, $end_date);
		} elseif (!empty($_GET["patient_id"]) && empty($_GET["start_date"]) && empty($_GET["end_date"]))
		{
			$patient_id = $_GET["patient_id"];
		
			$eval -> get_all_weekly_evaluation($patient_id);
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