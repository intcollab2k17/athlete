<?php 
include('session.php');


	$id=$_POST['id'];
	$name = $_FILES["image"]["name"];
	$type = $_FILES["image"] ["type"];
	$size = $_FILES["image"] ["size"];
	$temp = $_FILES["image"] ["tmp_name"];
	$error = $_FILES["image"] ["error"];

	mysqli_query($con,"UPDATE member SET member_pic='$name' WHERE member_id='$id'") or die(mysqli_error($con));
	
		echo "<script>document.location='profile.php?id=$id'</script>";													
		if ($error > 0){
			die("Error uploading file! Code $error.");
			}
		else{
			if($size > 100000000000) //conditions for the file
		{
			die("Format is not allowed or file size is too big!");
		}
		else
		{
			move_uploaded_file($temp, "../dist/uploads/".$name);
		}
		}
	
?>	