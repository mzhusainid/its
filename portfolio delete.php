<?php

		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'its');
		
		$rcvSNo=$_GET['passSNo'];
			
		$delete="delete from portfolio where sNo='$rcvSNo'";
		$deleteQuery=mysqli_query($con,$delete);
			
		if($deleteQuery)
		{
			header('location:portfolio.php');
		}


?>