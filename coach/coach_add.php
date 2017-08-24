<?php 
include('session.php');
 
 
	$coach = $_POST['coach'];
	$sport = $_POST['sport'];

	$query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
	    $row=mysqli_fetch_array($query);  
	    $settings=$row['settings_id'];  
		$countsettings=mysqli_num_rows($query);

	  $querye=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
        $rowe=mysqli_fetch_array($querye);
        	$event=$rowe['event_id'];
	    	$countevent=mysqli_num_rows($querye);

	    if (($countsettings<1) or ($countevent<1))
	    {
	    	echo "<script type='text/javascript'>alert('School Year or Event are not yet set!');</script>";
			echo "<script>document.location='coach.php'</script>";  	    	
	    }
	    else
	    {
			$query2=mysqli_query($con,"select * from coach where member_id='$coach' and sports_id='$sport' and event_id='$event'")or die(mysqli_error($con));
		  	
		  	$row2=mysqli_num_rows($query2);

	    	if ($row2>=1)
	    	{
				echo "<script type='text/javascript'>alert('Coach already assigned to this sport and event!');</script>";
				echo "<script>document.location='coach.php'</script>";  	    		
	    	}
	    	else
	    	{
			mysqli_query($con,"INSERT INTO coach(member_id,sports_id,settings_id,event_id) VALUES('$coach','$sport','$settings','$event')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully assigned new coach!');</script>";
			echo "<script>document.location='coach.php'</script>";  
			}
		}
?>