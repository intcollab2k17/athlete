<?php 

include('session.php');

	$id = $_SESSION['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$designation = $_POST['designation'];
	$password = $_POST['password'];
	
			mysqli_query($con,"UPDATE user SET name='$name',username='$username',password='$password',designation='$designation' where user_id='$id'")or die(mysqli_error($con)); 

			echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
			echo "<script>document.location='account_settings.php'</script>";  
	
?>