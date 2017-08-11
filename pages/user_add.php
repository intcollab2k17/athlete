<?php 

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$designation = $_POST['designation'];
	
			mysqli_query($con,"INSERT INTO user(name,username,password,designation) VALUES('$name','$username','$password','$designation')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
			echo "<script>document.location='user.php'</script>";  
	
?>