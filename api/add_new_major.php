
<?php
	require_once "../models/major.php";
	
	header("content_type : application/json");
	
	if (isset($_GET['major']) and !empty($_GET['major'])) {
		$major = $_GET['major'];
		if (add_major($major)) {
			$response['msg'] = "major set";
			echo json_encode($response);
		} else {
			$response['msg'] = "major exists";
			echo json_encode($response);
		}
	} else {
		$response['msg'] = "request invalid";
		echo json_encode($response);
	}
?>


