
<html>
<head>
	<meta charset="utf-8">
	<title>همه دانشجویان</title>
</head>
<body>
	<?php
		$url      = "http://127.0.0.1/restful_api/api/all_students.php"; 
		$client   = curl_init($url); 
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
		$response = curl_exec($client); 
		$result   = json_decode($response);
		if ($result->msg == "nothing founds") {
			echo "<h1>هیچ دانشجویی وجود ندارد</h1>";
		} elseif ($result->msg == "found") {
			echo "<table>
			<tr>
				<td>نام</td>
				<td>رشته</td>
			</tr>";
			$i = 1;
			while (isset($result->$i->name)) {
				$name  = $result->$i->name;
				$major = $result->$i->major;
				echo "<tr>
					<th>$name</th>
					<th>$major</th>
				</tr>";
				$i++;
			}
			echo "</table>";
		}
	?>
</body>
</html>
