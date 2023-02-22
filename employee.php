<?php
	
	Session_start();
	$ssnEmail=$_SESSION['email'];
	$ssnPass=$_SESSION['pass'];
	
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	
	
//These Codes are for Inserting Order Data
	if(isset($_POST['joinEmployee']))
	{
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'its');
		
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$adhar=$_POST['adhar'];
		$joinDate=$_POST['date'];
		$address=$_POST['address'];
		$salary=$_POST['salary'];
		
		$high=$_FILES['high']['name'];
		$highTemp=$_FILES['high']['tmp_name'];
		
		$inter=$_FILES['inter']['name'];
		$interTemp=$_FILES['inter']['tmp_name'];
		
		$graduate=$_FILES['graduate']['name'];
		$graduateTemp=$_FILES['graduate']['tmp_name'];
		
		$diploma=$_FILES['diploma']['name'];
		$diplomaTemp=$_FILES['diploma']['tmp_name'];
		
		$image=$_FILES['image']['name'];
		$imageTemp=$_FILES['image']['tmp_name'];
		
		$select="select * from employee_details";
		$selectQuery=mysqli_query($con,$select);
		$fetch=mysqli_fetch_array($selectQuery);
		
		if($fetch['employeeAdhar']==$adhar)
		{
			echo "<script> alert('Employee with This Adhar is already Exist...')</script>";
		}
		else
		{
			$insert="insert into employee_details(employeeName,employeeMobile,employeeAdhar,employeeJoining,employeeAddress,employeeSalary,employeeHigh,employeeInter,employeeDegree,employeeDiploma,employeeImage)
									values('$name','$mobile','$adhar','$joinDate','$address','$salary','$high','$inter','$graduate','$diploma','$image')";
			$insertQuery=mysqli_query($con,$insert);
			if($insertQuery)
			{	
				move_uploaded_file($highTemp,"upload/$high");
				move_uploaded_file($interTemp,"upload/$inter");
				move_uploaded_file($graduateTemp,"upload/$graduate");
				move_uploaded_file($diplomaTemp,"upload/$diploma");
				move_uploaded_file($imageTemp,"upload/$image");
				echo "<script> alert('Add Employee Successful')</script>";
				header('location:employee.php');			
						
			}
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
	<link href="css/employee.css" rel="stylesheet" type="text/css">
	
	<title>Employees</title>
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
						  <a class="nav-link" href="#aboutSec">Employee</a>
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
						<li class="nav-item ms-1">
						  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">+ New Employee</button>
						</li>
					  </ul>
					</div>
				</div>
			</nav>
		</section>
		
	<!-- Employee Model -->	
		<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title">Fill Employee Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
					
					<!-- Employee Add -->
						<form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="mobile" placeholder="Mobile" maxlength="10" required>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="adhar" placeholder="Adhar" maxlength="12" required>
							</div>
							<div class="col-md-6">
								<input type="date" class="form-control" name="date" required>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="salary" placeholder="Salary" required>
							</div>
							<div class="input-group col-md-6">
								<input type="file" class="form-control" name="high" accept="image/*" required>
								<label class="input-group-text" for="inputGroupFile01">High School</label>
							</div>
							<div class="input-group col-md-6">
								<input type="file" class="form-control" name="inter" accept="image/*" required>
								<label class="input-group-text" for="inputGroupFile01">Intermediate</label>
							</div>
							<div class="input-group col-md-6">
								<input type="file" class="form-control" name="graduate" accept="image/*" required>
								<label class="input-group-text" for="inputGroupFile01">Graduation</label>
							</div>
							<div class="input-group col-md-6">
								<input type="file" class="form-control" name="diploma" accept="image/*">
								<label class="input-group-text" for="inputGroupFile01">Diploma</label>
							</div>
							<div class="input-group col-md-6">
								<input type="file" class="form-control" name="image" accept="image/*" required>
								<label class="input-group-text" for="inputGroupFile01">Image</label>
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary" name="joinEmployee">Join Employee</button>
							</div>
						</form>
				  </div>
				</div>
			</div>
		</div>
		
		<section class="pt-3 mt-4">
			<div class="container-fluid mt-5">
				<div class="row justify-content-center">	
					<div class="col-12">
							
						<?php
							
							$select="select * from employee_details";
							$selectQuery=mysqli_query($con,$select);
							@$rows=mysqli_num_rows($selectQuery);
							if($rows>0)
							{
								
						?>
						<table class="table  table-striped table-hover text-center">
						  <thead>
							<tr class="bg-primary text-white">
							  <th scope="col">ID</th>
							  <th scope="col">Name</th>
							  <th scope="col">Mobile</th>
							  <th scope="col">Address</th>
							  <th scope="col">Employee Profile</th>
							  <th scope="col">Employee Delete</th>
							</tr>
						  </thead>
						  <tbody>
 <!-- These Codes are for Fetching and Showing Orders Data -->
							
							<?php
								
								for($i=1;$i<=$rows;$i++)
								{
									$fetch=mysqli_fetch_array($selectQuery);
									
							?>
							<tr class="table-primary">
							  <th scope="row"><?php echo $fetch['employeeId']; ?></th>
							  <td><?php echo $fetch['employeeName']; ?></td>
							  <td><?php echo $fetch['employeeMobile']; ?></td>
							  <td><?php echo $fetch['employeeAddress']; ?></td>
							  <td><a type="button" class="btn btn-primary btn-sm" href="employee view.php?passAdhar=<?php echo $fetch['employeeAdhar'];?>" target="blank"> View</a></td>
							  <td><a type="button" class="btn btn-primary btn-sm" href="employee delete.php?passAdhar=<?php echo $fetch['employeeAdhar'];?>" onclick="return fun()"> Delete</a></td>
							</tr> 
							<?php
								
								}
							?>
							</tbody>
						</table>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</section>
		
<!-- View Employee Details Model -->
		<div class="modal fade" id="employeeDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" id="employeeModal">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title">Fill Employee Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
					<?php
						
					?>
					<!-- Employee Details -->
						<table class="table ">
							<tr><th>ID <td colspan="3" class="text-center">1
							<tr><th>Name <td><?php echo $fetchEmployee['employeeName'];?> <th rowspan="3" colspan="2" class="text-center">jhjkhd c djjkh
							<tr><th>Mobile <td>8896638315
							<tr><th>Adhar <td>905508202846
							<tr><th>Salary <td>150000		<th>Address <td>Chaudhrana Jais Distt Amethi
							<tr><th>High School <td>	<th>Intermediate <td>
							<tr><th>Graduation <td>		<th>Diploma <td>
							
						</table>
				  </div>
				</div>
			</div>
		</div>
		
		
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
		return confirm('Are you sure to delete Employee...?');
	}
</script>


