<?php

	Session_start();
	$ssnEmail=$_SESSION['email'];
	
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	
	if(isset($_POST['setPortfolio']))
	{
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'its');
	
		$title=$_POST['portfolioTitle'];
		$link=$_POST['portfolioLink'];
				
		$img=$_FILES['portfolioImg']['name'];
		$imgTemp=$_FILES['portfolioImg']['tmp_name'];
		
		if($link=="")
		{
			$link="portfolio_upload/$img";
		}
		else
		{
			
		}
			$insert="insert into portfolio(portfolioImage,portfolioTitle,portfolioLink)
									values('$img','$title','$link')";
			$insertQuery=mysqli_query($con,$insert);
			if($insertQuery)
			{	
				move_uploaded_file($imgTemp,"portfolio_upload/$img");
				echo "<script> alert('Add Portfolio Successful')</script>";	
				header('location:portfolio.php');
			}
			else
			{
				echo "<script> alert('!...Not Add Portfolio....!')</script>";
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
	
    <title>Portfolio</title>
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
		<?php
			
			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'its');
				
							
							$limit=4;
							
							@$pageNo=$_GET['passPageNo'];
							if($pageNo=='')
							{
								$pageNo=1;
							}
			
							$offset=($pageNo-1)*$limit;
							$select="select * from portfolio ORDER BY sNo DESC LIMIT $offset,$limit";
							$selectQuery=mysqli_query($con,$select);
							$rows=mysqli_num_rows($selectQuery);
							if($rows>0)
							{
																
		?>
		
		<section class="">
			<div class="container mt-5">
				<div class="row">
					<?php
						for($i=1;$i<=$rows;$i++)
						{
							@$fetch=mysqli_fetch_array($selectQuery);
							?>
							<div class="col-lg-3 col-md-4 col-11 mt-md-5 my-3">
								<div class="card" style="width:">
								  <img src="portfolio_upload/<?php echo $fetch['portfolioImage']?>" width="100px" height="150px" class="card-img-top" alt="...">
								  <div class="card-body text-center">
									<b class="card-title "><?php echo $fetch['portfolioTitle']?></b>
									<br>
									<a href="<?php echo $fetch['portfolioLink']?>" class="btn btn-primary rounded-pill mt-2" target="blank">Visit Website</a>
									
									<a type="button" class="btn btn-primary rounded-pill mt-2" href="portfolio delete.php?passSNo=<?php echo $fetch['sNo']?>" onclick="return fun()">Delete</a>
								  </div>
								</div>
							</div>
					<?php
						}
					
					?>
					
				</div>
			</div>
			
			<nav aria-label="...">
						  <ul class="pagination justify-content-center">
						<?php 
							
							$select="select * from portfolio";
							$selectQuery=mysqli_query($con,$select);
							$rows=mysqli_num_rows($selectQuery);
							
							$pages=ceil($rows/$limit);
							
							
							for($a=1;$a<=$pages;$a++)
							{
								if($a==$pageNo)
								{
									$activeLink="active";
								}
								else
								{
									$activeLink=" ";
								}
						?>
							<li class="page-item <?php echo $activeLink ?>"><a class="page-link" href="portfolio.php?passPageNo=<?php echo "$a";?>"> <?php echo "$a";?> </a></li>
						<?php 
							}
						?>
						  </ul>
						</nav>
						<?php
							}
						?>
			
		</section>
		
		<section>
			<div class="container mt-5 pt-5">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-4 col-md-10 col-12 mt-md-0 mt-5 text-start">
							<input type="file" class="form-control" name="portfolioImg" accept="image/*" required>
						</div>
						<div class="col-lg-4 col-md-10 col-12 mt-md-0 mt-5 text-end">
							<input type="text" class="form-control" name="portfolioTitle" placeholder="Fill Portfolio Title" required>
						</div>
						<div class="col-lg-4 col-md-10 col-12 mt-md-0 mt-5 text-end">
							<input type="text" class="form-control" name="portfolioLink" placeholder="Fill Portfolio Link if Not Left Blank">
						</div>
						<div class="col-lg-12 col-md-10 col-12 mt-md-0 mt-5 text-center">
							<button class="btn btn-primary mt-5" type="submit" name="setPortfolio">Set Portfolio</button>
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