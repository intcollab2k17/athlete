<?php session_start();

include('dist/includes/dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];
$designation=$_POST['designation'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);

$query=mysqli_query($con,"select * from user where username='$user' and password='$pass' and designation='$designation'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
           $id=$row['user_id'];
           $name=$row['name'];
           $counter=mysqli_num_rows($query);
           
           $id=$row['user_id'];

  	if ($counter == 0) 
	  {	
	  echo "<script type='text/javascript'>alert('Invalid Username or Password!');
	  document.location='index.php'</script>";
	  } 
	  elseif ($counter > 0)
	  {
	  $_SESSION['id']=$id;	
	  $_SESSION['name']=$name;	
	 	if ($designation=='Sports Director')
	    	echo "<script type='text/javascript'>document.location='pages/home.php'</script>";
		else
		{
			$_SESSION['campus']	=$row['campus_id'];
			echo "<script type='text/javascript'>document.location='coach/home.php'</script>";
		}
	  }
}	 
?>
	
