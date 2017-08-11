<?php 

include('session.php');

	$id = $_POST['id'];
	$remarks = $_POST['remarks'];
	$sports = $_POST['sports'];
	
			mysqli_query($con,"UPDATE athlete SET remarks='$remarks' where athlete_id='$id'")or die(mysqli_error($con)); 

			echo "<script type='text/javascript'>alert('Successfully added remarks!');</script>";
			echo "<script>document.location='athlete.php?sports=$sports'</script>";  
	
?>