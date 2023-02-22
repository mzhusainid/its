<?php

	Session_start();
	$ssnEmail=$_SESSION['email'];
	
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'its');
	
	$select="select * from admin_login where logEmail='$ssnEmail'";
	$selectQuery=mysqli_query($con,$select);
	@$fetch=mysqli_fetch_array($selectQuery);
	
	if(isset($_POST['changeAdmin']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirm=$_POST['confirm'];
		
		if($password!=$confirm)
		{
			echo "<script> alert('...Password not Match...')</script>";
		}
		else if($email==$fetch['logEmail'])
		{
			echo "<script> alert('...Email Already Exist...')</script>";
		}
		else 
		{
			$update="update admin_login set logEmail='$email', logPass='$password' where logEmail='$ssnEmail'";
			$updateQuery=mysqli_query($con,$update);
			
			if($updateQuery)
			{
				echo "<script> alert('...Admin Change Successful...')</script>";
			}
			else
			{
				echo "<script> alert('...nhi hua...')</script>";
			}
			
		}
	}
	
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
	<link href="css/admin order.css" rel="stylesheet" type="text/css">
	
    <title>Change Admin Profile</title>
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
					<div class="collapse navbar-collapse" id="navbarNav">
					  <ul class="navbar-nav ms-auto text-center">
						
						<li class="nav-item">
						  <a class="nav-link" style="color:#00f65" href="admin order.php">Dash Board</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="employee.php">Employee</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="portfolio.php">Portfolio</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="happy clients.php">Happy Clients</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="admin change.php">Change Profile</a>
						</li>
						<li class="nav-item">
								<a class="nav-link" href="log out.php">Log Out</a>
						</li>
					  </ul>
					</div>
				</div>
			</nav>
		</section>
  
		<section style="margin-top:">
			<div class="container mt-5 pt-5">
				<div class="row justify-content-center">
					<div class="col-11 col-md-6 pb-1 border" style="background:#f1f1f1">
						<div class="ps-1 align-items-center" style="height:50px; line-height:50px; background:#000f65; color:white">
							<b>Change Admin Profile</b>
						</div>
						<form method="post">
						  <div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" name="email" value="<?php echo $fetch['logEmail']; ?>">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						  </div>
						  <div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="text" class="form-control" name="password" value="<?php echo $fetch['logPass']; ?>">
						  </div>
						  <div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
							<input type="text" class="form-control" name="confirm">
						  </div>
						  <button type="submit" class="btn btn-primary" name="changeAdmin">Change Admin</button>
						</form>
					</div>
				</div>
			</div>
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