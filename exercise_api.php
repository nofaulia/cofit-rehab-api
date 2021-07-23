<?php header('Access-Control-Allow-Origin: *');
require_once "exercise.php";

$exercise = new Exercise();

$request_method=$_SERVER["REQUEST_METHOD"];

if ($request_method == 'GET') {
	if(!empty($_GET["type"])) {
		$type = $_GET["type"];
		$exercise -> get_exercises($type);
	} elseif (!empty($_GET["id"])) {
		$id = $_GET["id"];
		$exercise -> get_exercise($id);
	}
	else {
		// Invalid parameter
		header("HTTP/1.0 400 Bad Request");
	}
} else {
	// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
}


?>