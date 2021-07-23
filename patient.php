<?php 
require_once "connection.php";

class Patient {

	// get patient data by email and password
	public  function get_patient($email, $password) {
		global $con;
		$query = "SELECT * FROM `pasien` WHERE email='$email' AND password='$password'";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			'status' => 1,
			'message' => 'Get patient data successfully.',
			'data' => $data
		);

		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

?>