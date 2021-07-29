<?php
// required header
header('Access-Control-Allow-Origin: *');

require_once "connection.php";

class Info 
{
	public function get_active_info()
	{
		global $con;
		$query = "SELECT * FROM `info` WHERE is_active=1";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get info successfully.',
			'data' => $data
		);

		echo json_encode($response);
	}

	
}

?>