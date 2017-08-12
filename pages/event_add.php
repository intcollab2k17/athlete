<?php 

include('session.php');

	$event = $_POST['event'];
	$date = $_POST['date'];
	
			mysqli_query($con,"INSERT INTO event(event_name,event_date) VALUES('$event','$date')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new event!');</script>";
			echo "<script>document.location='event.php'</script>";  
	
?>