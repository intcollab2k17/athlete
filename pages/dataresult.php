<?php
include('session.php');

$result = mysqli_query($con,"SELECT course,COUNT(*) FROM athlete natural join member natural join settings where status='active' group by course");
	
$rows = array();
while($r = mysqli_fetch_array($result)) {
		$row[0] = $r[0];	
	    $row[1] = $r[1];
	    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

