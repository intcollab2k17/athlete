<?php
include("session.php");
$id = $_POST['id'];
$cid = $_POST['cid'];

$result=mysqli_query($con,"DELETE FROM athlete WHERE athlete_id ='$id'")
	or die(mysqli_error());
	
echo "<script>document.location='lineup.php?id=$cid'</script>";  
?>