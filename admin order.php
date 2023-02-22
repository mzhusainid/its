<?php
	
	Session_start();
	$ssnEmail=$_SESSION['email'];
	$ssnPass=$_SESSION['pass'];
	
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	
	
//These Codes are for Inserting Order Data
	if(isset($_POST['placeOrder']))
	{
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'its');
		
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$workCategory=$_POST['workCategory'];
		$workName=$_POST['workName'];
		$totalPay=$_POST['totalPay'];
		$advPay=$_POST['advPay'];
		$address=$_POST['address'];
		$date=$_POST['date'];
		
		$insert="insert into order_details(clientName,clientMobile,workCategory,workName,totalPayment,advPayment,clientAddress,orderDate)
									values('$name','$mobile','$workCategory','$workName','$totalPay','$advPay','$address','$date')";
		$insertQuery=mysqli_query($con,$insert);
		if($insertQuery)
		{	
			echo "<script> alert('Sign Up Successful')</script>";
			header('location:admin order.php');			
						
		}
			
	}
	
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'its');

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
	
	<title>Admin Order</title>
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
						  <a class="nav-link" href="admin order.php">Dash Board</a>
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
						<li class="nav-ite">
						  <a class="nav-link" href="admin change.php">Change Profile</a>
						</li>
						<li class="nav-item">
								<a class="nav-link" href="log out.php">Log Out</a>
						</li>
						<li class="nav-item ms-1 ms-2">
						  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#callModal">+ New Order</button>
						</li>
					  </ul>
					</div>
				</div>
			</nav>
		</section>
		
	<!-- Order Model -->	
		<div class="modal fade" id="callModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title">Fill Order Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
					
					<!-- Place Order -->
						<form class="row g-3" method="post">
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="mobile" placeholder="Mobile" maxlength="10" required>
							</div>
							<div class="col-md-6">
								<select class="form-select" aria-label="Default select example" name="workCategory">
								  <option selected>Work Category</option>
								  <option value="Web Designing">Web Designing</option>
								  <option value="Web Development">Web Development</option>
								  <option value="App Development">App Development</option>
								  <option value="Graphics Designing">Graphics Designing</option>
								  <option value="Network Connection">Network Connection</option>
								  <option value="Camera & Security">Camera & Security</option>
								</select>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="workName" placeholder="Work Name" required>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="totalPay" placeholder="Total Payment" required>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="advPay" placeholder="Advance Payment" required>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" placeholder="Address" maxlength="100" required>
							</div>
							<div class="col-md-6">
								<input type="date" class="form-control" name="date" required>
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary" name="placeOrder">Place Order</button>
							</div>
						</form>
				  </div>
				</div>
			</div>
		</div>
		
		<section class="mt-5 pt-4">
			<div class="container-fluid">
				<div class="row justify-content-center">	
					<div class="col-12">
						<?php	
							
							$limit=10;
							
							@$pageNo=$_GET['passPageNo'];
							if($pageNo=='')
							{
								$pageNo=1;
							}
			
							$offset=($pageNo-1)*$limit;
							$select="select * from order_details ORDER BY orderNo DESC LIMIT $offset,$limit";
							$selectQuery=mysqli_query($con,$select);
							$rows=mysqli_num_rows($selectQuery);
							if($rows>0)
							{
																
						?>
						<table class="table  table-striped table-hover text-center">
						  <thead>
							<tr class="bg-primary text-white">
							  <th scope="col">Order No.</th>
							  <th scope="col">Client Name</th>
							  <th scope="col">Mobile</th>
							  <th scope="col">Work Category</th>
							  <th scope="col">Work Name</th>
							  <th scope="col">Total Payment</th>
							  <th scope="col">Adv Payment</th>
  							  <th scope="col">Address</th>
							  <th scope="col">Date</th>
							</tr>
						  </thead>
						  <tbody>
 <!-- These Codes are for Fetching and Showing Orders Data -->
						<?php
							for ($i=1;$i<=$limit;$i++)
							{
								@$fetch=mysqli_fetch_array($selectQuery);
						?>
							<tr class="table-primary">
							  <th scope="row"><?php echo $fetch['orderNo']; ?></th>
							  <td><?php echo $fetch['clientName']; ?></td>
							  <td><?php echo $fetch['clientMobile']; ?></td>
							  <td><?php echo $fetch['workCategory']; ?></td>
							  <td><?php echo $fetch['workName']; ?></td>
							  <td><?php echo $fetch['totalPayment']; ?></td>
							  <td><?php echo $fetch['advPayment']; ?></td>
							  <td><?php echo $fetch['clientAddress']; ?></td>
							  <td><?php echo $fetch['orderDate']; ?></td>
							</tr>  
						
						<?php
							
							}
						?>
							</tbody>
						</table>
						
						<nav aria-label="...">
						  <ul class="pagination justify-content-center">
						<?php 
							
							$select="select * from order_details";
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
							<li class="page-item <?php echo $activeLink ?>"><a class="page-link" href="admin order.php?passPageNo=<?php echo "$a";?>"> <?php echo "$a";?> </a></li>
						<?php 
							}
						?>
						  </ul>
						</nav>
						<?php
							}
						?>
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




