<?php 

include('session.php');

	$name = $_POST['name'];
	
			mysqli_query($con,"INSERT INTO sports(sports_name,sports_status) VALUES('$name','active')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new sport!');</script>";
			echo "<script>document.location='sports.php'</script>";  
	
?>