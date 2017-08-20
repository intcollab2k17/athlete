<?php 

include('session.php');

	$last = $_POST['last'];
	$first = $_POST['first'];
	$type = "Student";
	$course = $_POST['course'];
	$address = $_POST['address'];
	$ys = $_POST['ys'];
	$gender = $_POST['gender'];
	$campus = $_SESSION['campus'];
	
	$check=mysqli_query($con,"select * from member where member_last='$last' and member_first='$first'")or die(mysqli_error($con));
	    $count=mysqli_num_rows($check);

	    if ($count > 0)
	    {
	    	echo "<script type='text/javascript'>alert('Member already exist!');</script>";
			echo "<script>window.history.back();</script>";  
	    }
	    else{
			mysqli_query($con,"INSERT INTO member(member_last,member_first,member_type,course,ys,address,gender,campus_id) VALUES('$last','$first','$type','$course','$ys','$address','$gender','$campus')")or die(mysqli_error($con));
	    

				$id=mysqli_insert_id($con);
				$sports_id = $_POST['sports_id'];
				$event = $_POST['event'];
				$cid = $_POST['coach'];
				$sports = $_POST['sports'];

				$query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
				    $row=mysqli_fetch_array($query);
				    $settings=$row['settings_id'];  
				
					mysqli_query($con,"INSERT INTO athlete(member_id,sports_id,settings_id,event_id,coach_id) VALUES('$id','$sports_id','$settings','$event','$cid')")or die(mysqli_error($con));
								
						echo "<script type='text/javascript'>alert('Successfully added new member!');</script>";
						echo "<script>document.location='coach.php'</script>";  
			}				
?>