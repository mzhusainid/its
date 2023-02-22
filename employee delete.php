<?php 
	
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'its');
	
	$rcvAdhar=$_GET['passAdhar'];
		
	$delete="delete from employee_details where employeeAdhar='$rcvAdhar'";
	$deleteQuery=mysqli_query($con,$delete);
		
	if($deleteQuery)
	{
		header('location:employee view.php');
	}

?>