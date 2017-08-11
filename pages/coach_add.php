<?php 
include('session.php');
 
  $query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
    $settings=$row['settings_id'];  
	$coach = $_POST['coach'];
	$sport = $_POST['sport'];
	
	mysqli_query($con,"INSERT INTO coach(member_id,sports_id,settings_id) VALUES('$coach','$sport','$settings')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully assigned new coach!');</script>";
			echo "<script>document.location='coach.php'</script>";  
	
?>