
<?php
	require_once "../configs/config.php";

	function student_exists($name) {
		global $db;
		$student = mysqli_query($db, "SELECT * FROM student WHERE name='$name'");
		if (mysqli_num_rows($student) > 0) {
			return true;
		} else {
			return false;
		}
	}

	function add_student($name, $major) {
		global $db;
		if (student_exists($name)) {
			return false;
		} else {
			mysqli_query($db, "INSERT INTO student (name, major) VALUES ('$name' , '$major')");
			return true;
		}
	}

	function get_all_students() {
		global $db;
		$arr      = array();
		$students = mysqli_query($db, "SELECT * FROM student");
		if (mysqli_num_rows($students) == 0) {
			return false;
		} else {
			$i = 1;
			while ($row = $students->fetch_assoc()) {
				$array['id']    = $row['id'];
				$array['name']  = $row['name'];
				$array['major'] = $row['major'];
				$arr[$i]        = $array;
				$i++;
			}
			return $arr;
		}
	}
?>