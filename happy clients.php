<?php

	Session_start();
	$ssnEmail=$_SESSION['email'];
	
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	
	if(isset($_POST['setClient']))
	{
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'its');
				
		$logoName=$_FILES['clientLogo']['name'];
		$logoTemp=$_FILES['clientLogo']['tmp_name'];
		
		$insert="insert into happy_clients(logoName)
									values('$logoName')";
		$insertQuery=mysqli_query($con,$insert);
		if($insertQuery)
		{	
			move_uploaded_file($logoTemp,"client_logo_upload/$logoName");
			echo "<script> alert('Add Client Successful')</script>";	
			header('location:happy clients.php');
		}
		else
		{
			echo "<script> alert('!...Not Add Client....!')</script>";
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
	<link href="css/style.css" rel="stylesheet" type="text/css">
	
    <title>Happy Clients</title>
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
						  <a class="nav-link" style="background=:white; color:#00f65" href="admin order.php">Dash Board</a>
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
		
		<section class="mt-5">
			<div class="d-flex align-items-center justify-content-center">
				<h1 class="display-1 position-relative" id="portfolio">H A P P Y - C L I E N S</h1>
				<h1 class="position-absolute mt-2" style="color:#000f65">HAPPY CLIENTS</h1>
			</div>
		</section>
		
		<?php
			
			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'its');
			
			$select="select * from happy_clients ORDER BY logoNo DESC";
			$selectQuery=mysqli_query($con,$select);
			$rows=mysqli_num_rows($selectQuery);
		
		?>
		<section>
			<div class="container-fluid ">
				<div class="row" id="happyImg">
					<div class="col-lg-2 col-md-12 col-11 my-lg-5 my-2 text-lg-start">
						<div style="border-left:5px solid white; color:white; padding-left:10px" class="text-center ms-3">
							<h1>Our Happy Clients</h1>
						</div>
					</div>
					
						<div class="col-lg-10 col-md-12 col-12 my-lg-5 my-2 text-center">
						<marquee onmouseover="this.stop();" onmouseout="this.start();">
							<?php
					
								for($i=1;$i<=$rows;$i++)
								{
									$fetch=mysqli_fetch_array($selectQuery);
							?>
								<a href="client_logo_upload/<?php echo $fetch['logoName'] ?>" target="blank">
									<img src="client_logo_upload/<?php echo $fetch['logoName'] ?>" width="150px" height="150px" class="mx-3">
								</a>
							<?php
								}
							?>
						</marquee>
						</div>
				</div>
		</section>
		<section>
			<div class="container mt-5">
				<form method="post" enctype="multipart/form-data">
					<div class="row justify-content-evenly">
						<div class="col-lg-10 col-md-10 col-12 mt-md-0 mt-5 text-start">
							<input type="file" class="form-control" name="clientLogo" accept="image/*" required>
						</div>
						<div class="col-lg-12 col-md-10 col-12 mt-md-0 mt-5 text-center">
							<button class="btn btn-primary mt-5" type="submit" name="setClient">Set Happy Clients</button>
						</div>
					</div>
				</form>
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

<script>
	function fun()
	{
		return confirm('Are you sure to delete This Portfolio...?');
	}
</script>