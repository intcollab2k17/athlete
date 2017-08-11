<?php 
include('session.php');
	$id = $_POST['id'];
	$course =$_POST['course'];
	$title =$_POST['title'];
	
	mysqli_query($con,"update course set course='$course',course_title='$title' where course_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated course details!');</script>";
	echo "<script>document.location='course.php'</script>";  

	
?>
