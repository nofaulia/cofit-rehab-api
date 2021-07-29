<?php
// required header
header('Access-Control-Allow-Origin: *');

require_once "info.php";

$info = new Info();

$request_method=$_SERVER["REQUEST_METHOD"];

switch ($request_method) {
	case 'GET':
		$info -> get_active_info();
		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	break;
}


?>