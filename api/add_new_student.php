
<?php
	require_once "../models/student.php";
	require_once "../models/major.php";
	
	header("content_type : application/json");
	
	if (isset($_GET['name']) and !empty($_GET['name']) and isset($_GET['major']) and !empty($_GET['major'])) {
		$name   = $_GET['name'];
		$major  = $_GET['major'];
		$majors = get_all_majors();
		$key    = array_search($major, array_column($majors, 'major'));
		if ($key != null) {
			if (add_student($name, $major)) {
				$response['msg'] = "student set";
				echo json_encode($response);
			} else {
				$response['msg'] = "student exists";
				echo json_encode($response);
			}
		} else {
			$response['msg'] = "major is not found";
			echo json_encode($response);
		}
	} else {
		$response['msg'] = "request invalid";
		echo json_encode($response);
	}

?>



