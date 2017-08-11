<?php
include('session.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$status =$_POST['status'];
	
	mysqli_query($con,"update sports set sports_name='$name',sports_status='$status' where sports_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated sports details!');</script>";
	echo "<script>document.location='sports.php'</script>";  

	
?>
