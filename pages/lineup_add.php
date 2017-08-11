<?php 

include('session.php');

	$name = $_POST['name'];
	$cid = $_REQUEST['cid'];

	$query=mysqli_query($con,"select * from coach where coach_id='$cid'")or die(mysqli_error($con));
		$row=mysqli_fetch_array($query);
			$sport = $_POST['sports_id'];
			$settings = $_POST['settings_id'];
	
			mysqli_query($con,"INSERT INTO athlete(member_id,sports_id,settings_id,coach_id) VALUES('$name','$sport','$settings','$cid')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new athlete in lineup!');</script>";
			echo "<script>document.location='lineup.php?id=$cid'</script>";  
	
?>