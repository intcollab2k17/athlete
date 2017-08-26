<?php 

include('session.php');

	$last = $_POST['last'];
	$first = $_POST['first'];
	$type = $_POST['type'];
	$course = $_POST['course'];
	$address = $_POST['address'];
	$ys = $_POST['ys'];
	$gender = $_POST['gender'];
	$campus = $_POST['campus'];
	
			mysqli_query($con,"INSERT INTO member(member_last,member_first,member_type,course,ys,address,gender,campus_id,member_status,member_pic) VALUES('$last','$first','$type','$course','$ys','$address','$gender','$campus','1','default.jpg')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new member!');</script>";
			echo "<script>document.location='member.php'</script>";  
	
?>