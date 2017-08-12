<?php 
include('session.php');
	$id = $_POST['id'];
	$event =$_POST['event'];
	$date =$_POST['date'];
	
	mysqli_query($con,"update event set event_name='$event',event_date='$date' where event_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated event details!');</script>";
	echo "<script>document.location='event.php'</script>";  

	
?>
