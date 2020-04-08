
<?php
	require_once "../models/major.php";

	header("content_type : application/json");

	$all_majors = get_all_majors();
	if ($all_majors) {
		$all_majors['msg'] = "found";
		echo json_encode($all_majors);
	} else {
		$response['msg'] = "nothing founds";
		echo json_encode($response);
	}
?>