<?php
// required header
header('Access-Control-Allow-Origin: *');

require_once "endurance_level.php";

$endurance_level = new EnduranceLevel();

$request_method=$_SERVER["REQUEST_METHOD"];

switch ($request_method) {
	case 'OPTIONS':
		$endurance_level -> response_request();
		break;
	case 'POST':
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
		$endurance_level -> update_endurance_level($data);
		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	break;
}

?>