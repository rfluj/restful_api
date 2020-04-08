
<?php
	if (isset($_POST['add_major'])) {
		if (!empty($_POST['major'])) {
			$major    = $_POST['major'];
			$url      = "http://127.0.0.1/restful_api/api/add_new_major.php?major=" . $major; 
			$client   = curl_init($url); 
			curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
			$response = curl_exec($client); 
			$result   = json_decode($response);
			echo $result->msg;
		} else {
			echo "field major ra por konid.";
		}
	}
?>


<html>
<head>
	<meta charset="utf-8">
	<title>اضافه کردن رشته</title>
</head>
<body>
	<form action="./add_new_major.php" method="post">
		<span>major : </span>
		<input type="text" name="major" placeholder="نام رشته را وارد کنید">
		<br>
		<input type="submit" name="add_major" value="اضافه کردن">
	</form>
	<a href="./index.php">برگشت به صفحه اصلی</a>
</body>
</html>



