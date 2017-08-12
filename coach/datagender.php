<?php
include('session.php');
$campus_id=$_SESSION['campus'];
$result = mysqli_query($con,"SELECT gender,COUNT(*) FROM athlete natural join member natural join settings where status='active' and campus_id='$campus_id' group by gender");
	
$rows = array();
while($r = mysqli_fetch_array($result)) {
		$row[0] = $r[0];	
	    $row[1] = $r[1];
	    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

