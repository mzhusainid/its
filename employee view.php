<?php
	
	Session_start();
	
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	
	if(!isset($_GET['passAdhar']))
	{
		header('location:employee.php');
	}
	
	
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'its');
	
	$rcvAdhar=$_GET['passAdhar'];
	
	$select="select * from employee_details where employeeAdhar='$rcvAdhar'";
	$selectQuery=mysqli_query($con,$select);
	@$fetch=mysqli_fetch_array($selectQuery);
	
	$fetchImg=$fetch['employeeImage'];	
	$fetchHigh=$fetch['employeeHigh'];
	$fetchInter=$fetch['employeeInter'];
	$fetchDegree=$fetch['employeeDegree'];
	$fetchDiploma=$fetch['employeeDiploma'];
	


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
	<!-- Bootstrap CSS -->
	<link href="css/employee view.css" rel="stylesheet" type="text/css">
	
	<title>Employee View</title>
  </head>
  <body>
	<!-- Nav Section -->
		<section id="navBar" class="fixed-top">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid mx-2" >
						<a class="navbar-brand" href="admin order.php"><span id="title">ITS (Idris Tech Service) Admin Panel</span></a>
					<button class="navbar-toggler" id="toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon" id="togglerIcon"></span>
					</button>
					
				</div>
			</nav>
		</section>
		
		<section class="mt-5 text-center">
			<div class="d-flex align-items-center justify-content-center">
				<h1 class="display-1 position-relative" id="employeeDetails">E M P L O Y E E - D E T A I L S</h1>
				<h1 class="position-absolute mt-2" style="color:#000f65">EMPLOYEE DETAILS</h1>
			</div>
		</section>
		
		<section class="">
			<center>
				<div id="view">
				  <div class="modal-body">
					<!-- Employee Details -->
						<table class="table table-bordered border-dark">
							<tr><th>ID <td><?php echo $fetch['employeeId'] ?>  <th rowspan="4" colspan="2" class="text-center"><?php echo "<img src='upload/$fetchImg' height='150px' width='150px'>" ?>
							<tr><th>Name <td><?php echo $fetch['employeeName'] ?> 
							<tr><th>Mobile <td><?php echo $fetch['employeeMobile'] ?> 
							<tr><th>Adhar <td><?php echo $fetch['employeeAdhar'] ?> 
							<tr><th>Salary <td><?php echo $fetch['employeeSalary'] ?> 	<th>Address <td><?php echo $fetch['employeeAddress'] ?> 
							<tr><th>High School <td><a href="upload/<?php echo "$fetchHigh" ?>"> Click For High School..</a>	<th>Intermediate <td><a href="upload/<?php echo "$fetchInter" ?>"> Click For Intermediate..</a>
							<tr><th>Graduation <td><a href="upload/<?php echo "$fetchDegree" ?>"> Click For Degree..</a>		<th>Diploma <td><a href="upload/<?php echo "$fetchDiploma"?>"> Click For Diploma..</a>
						</table>
				  </div>
				</div>
			</center>
		</section>
		
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

