<?php
include('session.php');

	$id = $_REQUEST['id'];
	
	mysqli_query($con,"update settings set status='active' where settings_id='$id'")or die(mysqli_error($con));
	mysqli_query($con,"update settings set status='' where settings_id<>'$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully set semester and school year!');</script>";
	echo "<script>document.location='settings.php'</script>";  
	
?>
