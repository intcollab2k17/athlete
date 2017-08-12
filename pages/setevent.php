<?php
include('session.php');

	$id = $_REQUEST['id'];
	
	mysqli_query($con,"update event set event_status='active' where event_id='$id'")or die(mysqli_error($con));
	mysqli_query($con,"update event set event_status='' where event_id<>'$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully set current event!');</script>";
	echo "<script>document.location='settings.php'</script>";  
	
?>
