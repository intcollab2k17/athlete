<?php 

include('session.php');

	$name = $_POST['name'];
	$sport = $_POST['sport'];
	$event = $_POST['event'];
	
	  $query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
    $settings=$row['settings_id'];  
	
			mysqli_query($con,"INSERT INTO athlete(member_id,sports_id,settings_id,event_id) VALUES('$name','$sport','$settings','$event')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new athlete!');</script>";
			echo "<script>document.location='athlete.php'</script>";  
	
?>