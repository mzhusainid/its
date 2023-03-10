
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
	
    <title>All Portfolio All</title>
  </head>
  <body>
	<!-- Nav Section -->
		<section id="navBar" class="fixed-top">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid mx-2" >
						<a class="navbar-brand" href="admin order.php"><span id="title">ITS (Idris Tech Service) All Portfolio </span></a>
					<button class="navbar-toggler" id="toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon" id="togglerIcon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					  <ul class="navbar-nav ms-auto text-center">
						<li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="index.php">Back to Home</a>
						</li>
					  </ul>
				</div>
				</div>
			</nav>
		</section>
		<section class="mt-5">
			<div class="d-flex align-items-center justify-content-center">
				<h1 class="display-1 position-relative" id="portfolio">P O R T F O L I O</h1>
				<h1 class="position-absolute mt-2" style="color:#000f65">PORTFOLIO</h1>
			</div>
		</section>
		<?php
			
			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'its');
			
			$select="select * from portfolio ORDER BY sNo DESC";
			$selectQuery=mysqli_query($con,$select);
			$rows=mysqli_num_rows($selectQuery);
																
		?>
		
		<section style="margin-top:">
			<div class="container">
				<div class="row justify-content-center">
					<?php
						for($i=1;$i<=$rows;$i++)
						{
							@$fetch=mysqli_fetch_array($selectQuery);
							?>
							<div class="col-lg-3 col-md-4 col-11 mt-md-0 my-4">
								<div class="card" id="ServiceCard">
								  <img src="portfolio_upload/<?php echo $fetch['portfolioImage']?>" width="100px" height="150px" class="card-img-top" alt="...">
								  <div class="card-body text-center">
									<b class="card-title "><?php echo $fetch['portfolioTitle']?></b>
									<br>
									<a href="<?php echo $fetch['portfolioLink']?>" class="btn btn-primary rounded-pill mt-2" target="blank">Visit Here</a>
								  </div>
								</div>
							</div>
					<?php
						}
					
					?>
					
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