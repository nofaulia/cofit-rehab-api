<?php
// required header
header('Access-Control-Allow-Origin: *');


require_once "connection.php";

class WeeklyEvaluation 
{
	public function get_all_weekly_evaluation($patient_id)
	{
		global $con;
		$query = "SELECT * FROM `evaluasi_mingguan` WHERE id_pasien=$patient_id";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			// 'status' => 1,
			// 'message' => 'Get weekly evaluation successfully.',
			'data' => $data
		);

		echo json_encode($response);
	}

	public function get_weekly_evaluation($patient_id, $start_date, $end_date)
	{
		global $con;
		$query = "
			SELECT * 
			FROM `evaluasi_mingguan` 
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
			// 'message' => 'Get weekly evaluation successfully.',
			'data' => $data
		);

		echo json_encode($response);
	}

	public function response_request()
	{
		
		$response=array('status' => 1, 'message' => 'success');
		echo json_encode($response);
	}

	public function insert_weekly_evaluation()
	{
		global $con;
		$arrcheckpost = array(
			'id_pasien' => '', 'tanggal' => '', 
			'rhr' => '', 'bfi' => '', 'sts30detik' => '' );
		
		if(count($_POST) == count($arrcheckpost)) {
			$query = "INSERT INTO evaluasi_mingguan (id_pasien, tanggal, rhr, bfi, sts30detik) VALUES ($_POST[id_pasien], '$_POST[tanggal]', $_POST[rhr], $_POST[bfi], $_POST[sts30detik])";

			$result = mysqli_query($con, $query);
			
			if($result)
			{
				$response=array(
					'status' => 1,
					'message' =>'Weekly Evaluation Added Successfully.'
				);
			}
			else
			{
				$response=array(
					'status' => 0,
					'query' => $query,
					'message' =>'Weekly Evaluation Addition Failed.'
				);
			}
		} else{
			$response=array(
						'status' => 0,
						'message' =>'Parameter Do Not Match'
					);
		}
		
		echo json_encode($response);
	}
}

?>