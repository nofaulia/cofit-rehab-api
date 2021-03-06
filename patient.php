<?php 
// required header
header('Access-Control-Allow-Origin: *');

require_once "connection.php";

class Patient {

	// get patient data by phonenumber and password
	public  function get_patient($phonenumber, $password) {
		global $con;

		// $password = md5($password);
		$query = "SELECT id, kode, nama, endurance_level 
				  FROM `pasien` WHERE no_hp='$phonenumber' AND password='$password'
				  AND `is_active`=1";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get patient data successfully.',
			'data' => $data
		);

		if (count($data) == 0) {
			header("HTTP/1.0 404 Not Found");
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function response_request()
	{
		
		$response=array('status' => 1, 'message' => 'success');
		echo json_encode($response);
	}

	public function calculate_max_hr($patient_id) {
		global $con;

		$query = "SELECT TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM `pasien` WHERE id=1";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$age = $row->age;
		}

		$max_hr = 220 - $age;
		return $max_hr;
	}
}

?>