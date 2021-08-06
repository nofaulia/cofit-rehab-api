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

	public function insert_patient_exercise($data)
		{
			global $con;

			$id_pasien = $data["id_pasien"];
			$id_latihan = $data["id_latihan"];
			$tanggal = $data["tanggal"];
			$waktu_mulai = $data["waktu_mulai"];
			$waktu_selesai = $data["waktu_selesai"];
			$pra_bs = $data["pra_bs"];
			$pasca_bs = $data["pasca_bs"];
			$cd_bs = $data["cd_bs"];
			$pra_sato2 = $data["pra_sato2"];
			$pasca_sato2 = $data["pasca_sato2"];
			$cd_sato2 = $data["cd_sato2"];
			$pra_hr = $data["pra_hr"];
			$pasca_hr = $data["pasca_hr"];
			$cd_hr = $data["cd_hr"];
			
			$query = "INSERT INTO latihan_pasien (id_pasien, id_latihan, tanggal, waktu_mulai, waktu_selesai, pra_bs, pasca_bs, cd_bs, pra_sato2, pasca_sato2, cd_sato2, pra_hr, pasca_hr, cd_hr) VALUES ($id_pasien, $id_latihan, '$tanggal', '$waktu_mulai', '$waktu_selesai', $pra_bs, $pasca_bs, $cd_bs, $pra_sato2, $pasca_sato2, $cd_sato2, $pra_hr, $pasca_hr, $cd_hr)";


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
					'message' =>'Patient Exercise Addition Failed.'
				);
			}
			
			echo json_encode($response);
		}
	
}

?>