<?php 
include('session.php');
 
  $query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
    $settings=$row['settings_id'];  
	$coach = $_POST['coach'];
	$sport = $_POST['sport'];
	
	$querye=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
        $rowe=mysqli_fetch_array($querye);
        	$event=$rowe['event_id'];
	mysqli_query($con,"INSERT INTO coach(member_id,sports_id,settings_id,event_id) VALUES('$coach','$sport','$settings','$event')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully assigned new coach!');</script>";
			echo "<script>document.location='coach.php'</script>";  
	
?>