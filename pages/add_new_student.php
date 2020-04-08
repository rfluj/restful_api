
<?php
	if (isset($_POST['add_student'])) {
		if (!empty($_POST['name'] and !empty($_POST['major']))) {
			$name  = $_POST['name'];
			$major = $_POST['major'];
			$url      = "http://127.0.0.1/restful_api/api/add_new_student.php?name=" . $name . "&major=" . $major; 
			$client   = curl_init($url); 
			curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
			$response = curl_exec($client); 
			$result   = json_decode($response);
			echo $result->msg;
		} else {
			echo "tamam field ha ra por konid.";
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>اضافه کردن دانشجو</title>
</head>
<body>
	<form action="./add_new_student.php" method="post">
		<span>نام دانشجو : </span>
		<input type="text" name="name" placeholder="enter name">
		<br>
		<span>رشته : </span>
		<input type="text" name="major" placeholder="enter major">
		<br>
		<input type="submit" name="add_student" value="اضافه کردن دانشجو">
	</form>
	<a href="./index.php">برگشت به صفحه اصلی</a>
</body>
</html>


