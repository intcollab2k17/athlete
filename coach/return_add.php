<?php 

include('session.php');

	$borrow_id = $_POST['borrow_id'];
	$date = date("Y-m-d H:i:s");
	
	$query=mysqli_query($con,"select * from borrow where borrow_id='$borrow_id'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
            $eid=$row['equipment_id'];
            $qty=$row['borrow_qty'];

			mysqli_query($con,"UPDATE equipment SET qty=qty+'$qty' where equipment_id='$eid'") or die(mysqli_error($con)); 
			
			mysqli_query($con,"UPDATE borrow SET status='1',date_returned='$date' where borrow_id='$borrow_id'") or die(mysqli_error($con)); 

			echo "<script type='text/javascript'>alert('Successfully returned equipment!');</script>";
		    echo "<script>document.location='borrow.php'</script>";  
	
?>