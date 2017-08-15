<?php
include('session.php');

$result = mysqli_query($con,"SELECT sports_name,COUNT(*) FROM athlete natural join member natural join sports natural join settings where campus_id='4' and status='active' group by sports_id");
	
$rows = array();
while($r = mysqli_fetch_array($result)) {
		$row[0] = $r[0];	
	    $row[1] = $r[1];
	    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

