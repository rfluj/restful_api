
<?php
	require_once "../models/student.php";

	header("content_type : application/json");

	$all_students = get_all_students();
	if ($all_students) {
		$all_students['msg'] = "found";
		echo json_encode($all_students);
	} else {
		$response['msg'] = "nothing founds";
		echo json_encode($response);
	}
?>
