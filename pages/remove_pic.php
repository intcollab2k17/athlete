<?php
include("session.php");
$id = $_REQUEST['id'];
$aid = $_REQUEST['aid'];

$result=mysqli_query($con,"DELETE FROM album_content WHERE album_content_id ='$id'")
	or die(mysqli_error());
	
echo "<script>document.location='album.php?album_id=$aid'</script>";  
?>