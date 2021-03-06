<?php
// required header
header('Access-Control-Allow-Origin: *');


require_once "connection.php";

class PatientExercise 
{
	public function get_patient_exercise_by_type($patient_id, $type)
	{
		/**
		Types: 1. Breathing 2. Endurance 3. Strength
		*/

		global $con;

		$query = "SELECT id, id_pasien, id_latihan, tanggal, pra_bs, pasca_bs, 
		            pra_hr, pasca_hr, pra_sato2, pasca_sato2 
				  FROM `latihan_pasien` 
				  JOIN (
				  	SELECT id as exercise_id FROM latihan WHERE tipe=$type) as A
				  ON A.exercise_id = id_latihan
				  WHERE id_pasien = $patient_id ORDER BY `id`";
		
		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		return $data;
	}

	public function get_all_patient_exercise($patient_id)
	{
		// global $con;
		// $query = "SELECT * FROM `latihan_pasien` WHERE id_pasien=$patient_id";
		
		// $data = array();
		// $result = $con->query($query);

		// while ($row=mysqli_fetch_object($result)) {
		// 	$data[] = $row;
		// }

		$data = array();

		$breathing_exercise_data = $this->get_patient_exercise_by_type($patient_id, 1);
		$endurance_exercise_data = $this->get_patient_exercise_by_type($patient_id, 2);
		$strength_exercise_data = $this->get_patient_exercise_by_type($patient_id, 3);

		$data["breathing"] = $breathing_exercise_data;
		$data["endurance"] = $endurance_exercise_data;
		$data["strength"] = $strength_exercise_data;

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

	public function get_patient_endurance_exercises($patient_id, $limit, $order)
	{
		global $con;

		$query = "SELECT id, id_pasien, id_latihan, pasca_bs, pasca_hr 
				  FROM `latihan_pasien` 
				  JOIN (
				  	SELECT id as exercise_id FROM latihan WHERE tipe=2) as A
				  ON A.exercise_id = id_latihan
				  WHERE id_pasien = $patient_id ORDER BY `id` $order LIMIT $limit";
		
		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		return $data;
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
		$durasi_latihan = $data["durasi_latihan"];
		$pra_bs = $data["pra_bs"];
		$pasca_bs = $data["pasca_bs"];
		$pra_sato2 = $data["pra_sato2"];
		$pasca_sato2 = $data["pasca_sato2"];
		$pra_hr = $data["pra_hr"];
		$pasca_hr = $data["pasca_hr"];
		
		$query = "INSERT INTO latihan_pasien (
					id_pasien, id_latihan, tanggal, waktu_mulai, waktu_selesai, durasi_latihan,
					pra_bs, pasca_bs, pra_sato2, pasca_sato2, pra_hr, pasca_hr)
				  VALUES (
				  	$id_pasien, $id_latihan, '$tanggal', '$waktu_mulai', 
				  	'$waktu_selesai', $durasi_latihan, $pra_bs, $pasca_bs, $pra_sato2, 
				  	$pasca_sato2, $pra_hr, $pasca_hr)";

		$result = mysqli_query($con, $query);
		
		if($result)
		{
			$last_id = $con->insert_id;
			$response=array(
				'status' => 1,
				'message' =>'Patient Exercise Added Successfully.',
				'last_id' => $last_id
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

	public function update_patient_exercise($data)
		{
			global $con;

			$id_latihan_pasien = $data["id"];
			$cd_bs = $data["cd_bs"];
			$cd_sato2 = $data["cd_sato2"];
			$cd_hr = $data["cd_hr"];
			$waktu_mulai_cd = $data["waktu_mulai_cd"];
			$waktu_selesai_cd = $data["waktu_selesai_cd"];
			$durasi_cd = $data["durasi_cd"];
			
			$query = "UPDATE latihan_pasien 
					  SET cd_bs = $cd_bs, cd_sato2 = $cd_sato2, cd_hr = $cd_hr, 
					  	waktu_mulai_cd = '$waktu_mulai_cd', waktu_selesai_cd = '$waktu_selesai_cd',
					  	durasi_cd = $durasi_cd 
					  WHERE id=$id_latihan_pasien";


			$result = mysqli_query($con, $query);
			
			if($result)
			{
				$response=array(
					'status' => 1,
					'message' =>'Patient Exercise Updated Successfully.'
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