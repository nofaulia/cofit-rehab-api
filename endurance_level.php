<?php 
// required header
header('Access-Control-Allow-Origin: *');

require_once "connection.php";
require_once "patient.php";
require_once "patient_exercise.php";


class EnduranceLevel {

	public function update_endurance_level($data) {
		$patient_exercise = new PatientExercise();
		$patient = new Patient();
		$is_level_up = false;
		$is_level_down = false;

		$patient_id = $data["id_pasien"];

		$current_endurance_level = $this->get_endurance_level($patient_id);

		// retrieve 3 latest patient exercise
		$patient_exercise_data = $patient_exercise -> get_patient_endurance_exercises($patient_id, 3, "desc");

		// do nothing if number of exercises < 3
		if (count($patient_exercise_data) < 3) {
			$response=array (
				'level_up' => $is_level_up,
				'level_down' => $is_level_down,
			);

			header('Content-Type: application/json');
			echo json_encode($response); 
			return;
		}

		// get patient's max heart rate
		$max_hr = $patient -> calculate_max_hr($patient_id);
		$uppper_hr_latihan = 69 / 100 * $max_hr;
		$lower_hr_latihan = 55 / 100 * $max_hr;

		$latest_exercise = $patient_exercise_data[0];

		if ($latest_exercise->pasca_bs > 14 && $current_endurance_level > 1) {
			// level down
			$is_level_down = true;
			$result = $this->level_down($patient_id);
		} elseif ($latest_exercise->pasca_hr > $uppper_hr_latihan && $current_endurance_level > 1){
			// level down
			$is_level_down = true;
			$result = $this->level_down($patient_id);
		} else {
			$level_up_check = 0;
			
			foreach ($patient_exercise_data as $item) {
				// check level down condition
				// borg scale > 14 OR HR > 69% HR max
  				if ($item->pasca_bs > 14 || $item->pasca_hr > $uppper_hr_latihan) {
  					break;
  				}

  				// check level up condition
  				// borg scale < 12 AND HR < 55% HR max, 3 times consecutively
  				if ($item->pasca_bs < 12 && $item->pasca_hr < $lower_hr_latihan) {
  					$level_up_check += 1;
  				} else {
  					break;
  				}
			}

			if ($level_up_check == 3 && $current_endurance_level < 3) {
				// level up
				$is_level_up = true;
				$result = $this->level_up($patient_id);
			}
		}

		$current_endurance_level = $this->get_endurance_level($patient_id);
		$response=array (
			'level_up' => $is_level_up,
			'level_down' => $is_level_down,
			'current_endurance_level' => $current_endurance_level
		);

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function response_request()
	{
		
		$response=array('status' => 1, 'message' => 'success');
		echo json_encode($response);
	}

	public function level_down($patient_id) {
		global $con;

		$query = "UPDATE `pasien` SET endurance_level=endurance_level-1 
				  WHERE id=$patient_id AND endurance_level > 1";

		$data = array();
		$result = $con->query($query);

		return $result;
	}

	public function level_up($patient_id) {
		global $con;

		$query = "UPDATE `pasien` SET endurance_level=endurance_level+1 
				  WHERE id=$patient_id AND endurance_level < 3";

		$data = array();
		$result = $con->query($query);

		return $result;
	}

	public  function get_endurance_level($patient_id) {
		global $con;

		$query = "SELECT endurance_level 
				  FROM `pasien` WHERE id=$patient_id AND `is_active`=1";

		$data = array();
		$result = $con->query($query);

		while ($row=mysqli_fetch_object($result)) {
			$data[] = $row;
		}

		return $data[0]->endurance_level;
	}
}

?>