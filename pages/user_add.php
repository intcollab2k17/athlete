<?php 

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$designation = $_POST['designation'];
	$campus = $_POST['campus'];
	
			mysqli_query($con,"INSERT INTO user(name,username,password,designation,campus_id) VALUES('$name','$username','$password','$designation','$campus')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
			echo "<script>document.location='user.php'</script>";  
	
?>