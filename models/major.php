
<?php
	require_once "../configs/config.php";

	function major_exists($major) {
		global $db;
		$major = mysqli_query($db, "SELECT * FROM major WHERE major='$major'");
		if (mysqli_num_rows($major) > 0) {
			return true;
		} else {
			return false;
		}
	}

	function add_major($major) {
		global $db;
		if (major_exists($major)) {
			return false;
		} else {
			mysqli_query($db, "INSERT INTO major (major) VALUES ('$major')");
			return true;
		}
	}

	function get_all_majors() {
		global $db;
		$arr      = array();
		$major = mysqli_query($db, "SELECT * FROM major");
		if (mysqli_num_rows($major) == 0) {
			return false;
		} else {
			$i = 1;
			while ($row = $major->fetch_assoc()) {
				$array['id']    = $row['id'];
				$array['major'] = $row['major'];
				$arr[$i]        = $array;
				$i++;
			}
			return $arr;
		}
	}
?>