<?php
// required header
header('Access-Control-Allow-Origin: *');


require_once "connection.php";

class PatientExercise 
{
	public function get_all_patient_exercise($patient_id)
	{
		global $con;
		$query = "SELECT * FROM `latihan_pasien` WHERE id_pasien=$patient_id";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			'status' => 1,
			'message' => 'Get patient exercises successfully.',
			'data' => $data
		);

		// header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_patient_exercise($patient_id, $start_date, $end_date)
	{
		global $con;
		$query = "
			SELECT * 
			FROM `latihan_pasien` 
			WHERE id_pasien=$patient_id 
				AND tanggal >='$start_date' 
				AND tanggal <= '$end_date'";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		$response=array (
			'status' => 1,
			'message' => 'Get patient exercises successfully.',
			'data' => $data
		);

		// header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function response_request()
	{
		
		$response=array('status' => 1, 'message' => 'success');
		echo json_encode($response);
	}

	public function insert_patient_exercise()
		{
			global $con;
			$arrcheckpost = array(
				'id_pasien' => '', 'id_latihan' => '', 'tanggal' => '', 
				'waktu_mulai' => '', 'waktu_selesai'   => '',
				'pra_bs' => '', 'pasca_bs' => '', 'pra_sato2' => '', 
				'pasca_sato2' => '', 'pra_hr' => '', 'pasca_hr' => '' );
			
			if(count($_POST) == count($arrcheckpost)) {
				$query = "INSERT INTO latihan_pasien (id_pasien, id_latihan, tanggal, waktu_mulai, waktu_selesai, pra_bs, pasca_bs, pra_sato2, pasca_sato2, pra_hr, pasca_hr) VALUES ($_POST[id_pasien], $_POST[id_latihan], '$_POST[tanggal]', '$_POST[waktu_mulai]', '$_POST[waktu_selesai]', $_POST[pra_bs], $_POST[pasca_bs], $_POST[pra_sato2], $_POST[pasca_sato2], $_POST[pra_hr], $_POST[pasca_hr])";


				$result = mysqli_query($con, $query);
				
				if($result)
				{
					$response=array(
						'status' => 1,
						'message' =>'Patient Exercise Added Successfully.'
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'query' => $query,
						'message' =>'Patient Exercise Addition Failed.'
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