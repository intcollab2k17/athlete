<?php 

include('session.php');

	$aid = $_REQUEST['aid'];
	$status = $_REQUEST['status'];
	$sports = $_REQUEST['sports'];
	
	if ($status=="No")
			mysqli_query($con,"UPDATE athlete SET uniform='0' where athlete_id='$aid'")or die(mysqli_error($con));
	else
			mysqli_query($con,"UPDATE athlete SET uniform='1' where athlete_id='$aid'")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Success!');</script>";
			echo "<script>document.location='athlete.php?sports=$sports'</script>";  
	
?>