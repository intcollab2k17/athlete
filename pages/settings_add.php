<?php 

include('session.php');

	$sem = $_POST['sem'];
	$sy = $_POST['sy'];
	
			mysqli_query($con,"INSERT INTO settings(sem,sy) VALUES('$sem','$sy')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new settings!');</script>";
			echo "<script>document.location='settings.php'</script>";  
	
?>