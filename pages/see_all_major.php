
<html>
<head>
	<meta charset="utf-8">
	<title>همه رشته ها</title>
</head>
<body>
	<?php
		$url      = "http://127.0.0.1/restful_api/api/all_majors.php"; 
		$client   = curl_init($url); 
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
		$response = curl_exec($client); 
		$result   = json_decode($response);
		if ($result->msg == "nothing founds") {
			echo "<h1>هیچ رشته ای وجود ندارد</h1>";
		} elseif ($result->msg == "found") {
			echo "<table>
			<tr>
				<th>id</th>
				<th>رشته</th>
			</tr>";
			$i = 1;
			while (isset($result->$i->id)) {
				$id    = $result->$i->id;
				$major = $result->$i->major;
				echo "<tr>
					<td>$id</td>
					<td>$major</td>
				</tr>";
				$i++;
			}
			echo "</table>";
		}
	?>
</body>
</html>


