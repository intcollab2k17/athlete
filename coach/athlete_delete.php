<?php
include("session.php");
$id = $_POST['id'];
$cid = $_POST['cid'];
$sports = $_POST['sports'];

$result=mysqli_query($con,"DELETE FROM athlete WHERE athlete_id ='$id'")
	or die(mysqli_error());
	
echo "<script>document.location='athlete.php?sports=$sports'</script>";  
?>