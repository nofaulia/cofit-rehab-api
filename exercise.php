<?php header('Access-Control-Allow-Origin: *');
require_once "connection.php";

class Exercise {

	// get list of exercise by type
	public function get_exercises($type) {
		global $con;
		$query = "SELECT * FROM `latihan` WHERE tipe=$type";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get exercise list successfully.',
			'data' => $data
		);

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	// get exercise data by id
	public function get_exercise($id) {
		global $con;
		$query = "SELECT * FROM `latihan` WHERE id=$id LIMIT 1";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get exercise successfully.',
			'data' => $data
		);

		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

?>