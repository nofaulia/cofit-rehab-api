<?php
// required header
header('Access-Control-Allow-Origin: *');

require_once "connection.php";

class DailyEvaluation 
{
	public function get_all_daily_evaluation($patient_id)
	{
		global $con;
		$query = "SELECT * FROM `evaluasi_harian` WHERE id_pasien=$patient_id";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get daily evaluation successfully.',
			'data' => $data
		);

		echo json_encode($response);
	}

	public function get_daily_evaluation($patient_id, $start_date, $end_date)
	{
		global $con;
		$query = "
			SELECT * 
			FROM `evaluasi_harian` 
			WHERE id_pasien=$patient_id 
				AND tanggal >='$start_date' 
				AND tanggal <= '$end_date'";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get daily evaluation successfully.',
			'data' => $data
		);

		echo json_encode($response);
	}

	public function response_request()
	{
		
		$response=array('status' => 1, 'message' => 'success');
		echo json_encode($response);
	}

	public function insert_daily_evaluation($data)
	{
		global $con;
		$arrcheckpost = array(
			'id_pasien' => '', 'tanggal' => '', 
			'rhr' => '');
		
		if(count($data) == count($arrcheckpost)) {
			$query = "INSERT INTO evaluasi_harian (id_pasien, tanggal, rhr) VALUES ($data[id_pasien], '$data[tanggal]', $data[rhr])";

			$result = mysqli_query($con, $query);
			
			if($result)
			{
				$response=array(
					'status' => 1,
					'message' =>'Daily Evaluation Added Successfully.'
				);
			}
			else
			{
				$response=array(
					'status' => 0,
					'query' => $query,
					'message' =>'Daily Evaluation Addition Failed.'
				);
			}
		} else{
			$response=array(
						'status' => 0,
						'message' =>'Parameter Do Not Match'
					);
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

?>