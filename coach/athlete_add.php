<?php 

include('session.php');

	$name = $_POST['name'];
	$sport = $_POST['sport'];
	$event = $_POST['event'];
	$sports = $_POST['sports'];
	$cid = $_POST['coach'];
	
	  $query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
	    $row=mysqli_fetch_array($query);  
	    $settings=$row['settings_id'];  
		$countsettings=mysqli_num_rows($query);

	  $query1=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
	    $countevent=mysqli_num_rows($query1);

	    if (($countsettings<1) or ($countevent<1))
	    {
			echo "<script type='text/javascript'>alert('School Year or Event are not yet set!');</script>";
			echo "<script>document.location='athlete.php?sports=$sports'</script>";  	    	
	    }
	    else
	    {
		  $query2=mysqli_query($con,"select * from athlete where member_id='$name' and sports_id='$sport' and event_id='$event'")or die(mysqli_error($con));
		  	
		  	$row2=mysqli_num_rows($query2);

	    	if ($row2>=1)
	    	{
				echo "<script type='text/javascript'>alert('Athlete already added to this event and sport!');</script>";
				echo "<script>document.location='athlete.php?sports=$sports'</script>";  	    		
	    	}
	    	else
	    	{

			mysqli_query($con,"INSERT INTO athlete(member_id,sports_id,settings_id,event_id,coach_id) VALUES('$name','$sport','$settings','$event','$cid')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new athlete!');</script>";
			echo "<script>document.location='athlete.php?sports=$sports'</script>";  
			}
		}
?>