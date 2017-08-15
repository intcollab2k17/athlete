<?php 
include('../dist/includes/dbcon.php');
$qty = $_POST['qty'];
$query = mysqli_query($con,"SELECT * FROM equipment WHERE qty = '$qty' ")or die(mysqli_error($con));
$count=mysqli_num_rows($query);

if($count > $qty) {
	echo $false;
}
else{
echo $count;
}