<?php 

include('../dist/includes/dbcon.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$designation = $_POST['designation'];
	
			mysqli_query($con,"UPDATE user SET name='$name',username='$username',designation='$designation' where user_id='$id'")or die(mysqli_error($con)); 

			echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
			echo "<script>document.location='user.php'</script>";  
	
?>