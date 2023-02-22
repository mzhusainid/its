<?php

	if(isset($_POST['login']))
	{
		session_start();
		
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'its');
		
		$email=$_POST['email'];
		@$password=$_POST['pass'];
		
		$select="select * from admin_login where logEmail='$email'";
		$selectQuery=mysqli_query($con,$select);
		@$fetch=mysqli_fetch_array($selectQuery);
		
		if($fetch['logEmail']!=$email)
		{
			echo "<script> alert('...Wrong Email...')</script>";
		}
		else if($fetch['logPass']!=$password)
		{
			echo "<script> alert('...Wrong Password...')</script>";
		}
		else 
		{
			$_SESSION['email']=$email;
			$_SESSION['pass']=$password;
			header('location:admin order.php');
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
	
	<!-- Bootstrap Icon CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
	<!-- My CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	
	<title>Welcome to ITS</title>
  </head>
  
  <body>

    <!-- Nav Section -->
	<section id="navBar" class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light px-lg-5">
		  <div class="container-fluid mx-md-5">
			<a class="navbar-brand" href="index.php"><span id="title">ITS (Idris Tech Service)</span></a>
			<button class="navbar-toggler" id="toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon" id="togglerIcon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			  <ul class="navbar-nav ms-auto text-center">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item ms-2">
				  <a class="nav-link" href="#aboutSec">About</a>
				</li>
				<li class="nav-item ms-2">
				  <a class="nav-link" href="#serviceSec">Services</a>
				</li>
				<li class="nav-item ms-2">
				  <a class="nav-link" href="#portfolioSec">Portfolio</a>
				</li>
				<li class="nav-item ms-2">
				  <a class="nav-link" href="#contactSec">Contact</a>
				</li>
				<li class="nav-item ms-2">
				  <a class="nav-link" href="#">Plan & Prices</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
	</section>
	<!-- Header Section -->
		<div class="container-fluid py-5">
			<div class="row justify-content-center align-items-center" id="banner">
				<div class="col-lg-6 col-md-11 col-11 order-lg-1 order-md-2 order-2 text-lg-start text-md-center text-center">
					<div style="border-left:5px solid white; padding-left:10px">
						<h1>Welcome To...</h1>
						<p>
							ITS (Idris Tech Service) Run by M. Husain & Team.<br>
							I am Full Stack Web Developer<br>
							We Provide All types of Tech Service
						</p>
					</div>
					<a type="button" class="btn" id="DwnBtn" href="images/M Husain ITS Resume.pdf">Download CV</button>
					<a type="button" class="btn ms-4" href="#aboutSec"id="HireBtn">Quick Hire Me</a>
				</div>
				<div class="col-lg-4 col-md-11 col-11 order-lg-2 order-md-1 order-1 text-center">
					<img src="images/about.jpg" class="img-fluid rounded-circle mt-md-0 mt-2" id="bannerImg">
				</div>
			</div>
		</div>
	<!-- Service Section -->
	<section class="my-5 text-center" id="serviceSec">
		<div class="d-flex position-relative align-items-center justify-content-center">
			<h1 class="display-1"id="ourServices">S E R V I C E S</h1>
			<h1 class="position-absolute mt-2" style="color:#000f65">SERVICES</h1>
		</div>
		<div class="container-fluid  py-5" id="serviceImg">
			<div class="row justify-content-evenly text-center">
				<div class="col-lg-3 col-md-4 col-11">
					<div class="card" id="ServiceCard">
					<h1 id="icon"><i class="bi bi-laptop"></i></h1>
					  <div class="card-body">
						<h5 class="card-title">Web Designing</h5>
						<p class="card-text">Make a Personal Website for growing You & Your Business world-wide so for this our <b>'iTS'</b> team help you to Design Websites.</p>
					  </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-11 mt-md-0 mt-5">
					<div class="card" id="ServiceCard">
					<h1 id="icon"><i class="bi bi-globe"></i></h1>
					  <div class="card-body">
						<h5 class="card-title">Web Development</h5>
						<p class="card-text">To grow your Business Globally, our <b>'iTS'</b> team help You to Develop Powerful e-Commerce or Institutional Websites.</p>
					  </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-11 mt-md-0 mt-5">
					<div class="card" id="ServiceCard">
					<h1 id="icon"><i class="bi bi-phone"></i></h1>
					  <div class="card-body">
						<h5 class="card-title">App Development</h5>
						<p class="card-text">You must have an Android or iSO Mobile Application to Boost your Business Globally, our <b>'iTS'</b> team are Expert to Develop Applications.</p>
					  </div>
					</div>
				</div>
			</div>	
			<div class="row justify-content-evenly text-center">
				<div class="col-lg-3 col-md-4 col-11 mt-5">
					<div class="card" id="ServiceCard">
					<h1 id="icon"><i class="bi bi-palette"></i></h1>
					  <div class="card-body">
						<h5 class="card-title">Graphics Designing</h5>
						<p class="card-text">For Business Advertising it is Necessary to Print an Advertising Banner, Visiting Card or Logo <b>'iTS'</b> Graphic Designers are Expert in this Field.</p>
					  </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-11 mt-5">
					<div class="card" id="ServiceCard">
					<h1 id="icon"><i class="bi bi-router"></i></h1>
					  <div class="card-body">
						<h5 class="card-title">Network Connection</h5>
						<p class="card-text">If you want to Connect Yourself & Your Business to the Online World, so <b>'iTS'</b> team can create an Internet Connections in your Home, Office & Company.</p>
					  </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-11 mt-5">
					<div class="card" id="ServiceCard">
					<h1 id="icon"><i class="bi bi-camera-video"></i></h1>
					  <div class="card-body">
						<h5 class="card-title">Camera & Security</h5>
						<p class="card-text">For Security Purpose You must have to Set-Up CCTV Cameras so that you can Chill from Theft, our <b>'iTS'</b> team provide this Facilities for you.</p>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<!-- Portfolio Section -->	
		<?php
			
			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'its');
			
			$select="select * from portfolio ORDER BY sNo DESC";
			$selectQuery=mysqli_query($con,$select);
		
		?>
	
		<section class="my-5 pt-5"id="portfolioSec">
			<div class="d-flex align-items-center justify-content-center">
				<h1 class="display-1 position-relative" id="portfolio">P O R T F O L I O</h1>
				<h1 class="position-absolute mt-2" style="color:#000f65">PORTFOLIO</h1>
			</div>
			<div class="container mt-3">
				<div class="row justify-content-evenly">
				
					<?php
						for($i=1;$i<=4;$i++)
						{
							@$fetch=mysqli_fetch_array($selectQuery);
							?>
							<div class="col-lg-3 col-md-3 col-11 mt-md-0 my-4">
								<div class="card" id="ServiceCard" style="width:">
								  <img src="portfolio_upload/<?php echo $fetch['portfolioImage']?>" width="100px" height="150px" class="card-img-top" alt="...">
								  <div class="card-body text-center">
									<b class="card-title"><?php echo $fetch['portfolioTitle']?></b>
									</br>
									<a href="<?php echo $fetch['portfolioLink']?>" class="btn btn-primary rounded-pill" target="blank">Visit Here</a>
								  </div>
								</div>
							</div>
					<?php
						}
					
					?>
				</div>
				<div class="row mt-2">
					<div class="col-12 text-center">
						<a class="btn btn-primary" href="portfolio all.php" id="viewPortfolio">View All Portfolio</a>
					</div>
				</div>
				
			</div>
			
		<?php
			
			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'its');
			
			$select="select * from happy_clients ORDER BY logoNo DESC";
			$selectQuery=mysqli_query($con,$select);
			$rows=mysqli_num_rows($selectQuery);
		
		?>
			
			<div class="container-fluid mt-5">
				<div class="row" id="happyImg">
					<div class="col-lg-2 col-md-12 col-12 my-lg-5 my-2">
						<div style="border-left:5px solid white; color:white; padding-left:10%" class="text-lg-start text-center ms-3">
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
			</div>
			
		</section>
	
	<!-- About Section -->
		<section class="my-5 pt-5" id="aboutSec">
			<div class="d-flex position-relative align-items-center justify-content-center">
				<h1 class="display-1" id="about">A  B O U T</h1>
				<h1 class="position-absolute mt-2" style="color:#000f65">ABOUT US</h1>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12 mb-lg-0 mb-md-3">
						<img src="images/about.jpg" class="img-fluid" >
					</div>
					<div class="col-lg-8 col-md-12 mt-md-0 mt-3 pb-5 pb-md-0" align="justify" style="background:#f1f1f1">
						This is ITS run by me known as M. Husain Jayasi who is Full Stack Developer and my Team give all types
						of Tech Solutions like Website, Android Apps, Graphics Designing - Visiting Card, Advertising Banners,
						Internet Connections, CCTV Cameras and so many Services in Amethi, Raebareli, Sultanpur, Pratapgarh, Lucknow &
						ITS continuously keep growing in other cities.
						
												
						<div class="row mt-md-3 mt-4 ">
							<div class="col-md-6">
								<h5 class="text-center mb-3" id="touch" >Get in Touch</h5>
									<div class="text-start">
										<p><b><i class="bi bi-person-circle" id="touchIcon"></i> M. Husain (Founder & CEO)</b></p>
										<p><b><i class="bi bi-tag-fill" id="touchIcon"></i> ITS (Idris Tech Service)</b></p>
										<p><b><i class="bi bi-display-fill" id="touchIcon"></i> All Types Tech Solution</b></p>
										<p><b><i class="bi bi-envelope-fill" id="touchIcon"></i> M.husainjayasi@gmail.com</b></p>
										<p><b><i class="bi bi-telephone-fill" id="touchIcon"></i> 8896638315 / 8115067010</b></p>
										<b><i class="bi bi-house-fill" id="touchIcon"></i> Jais, Distt - Amethi, U.P (INDIA)</b>
									</div>
									<p>
									<div>
										<a class="btn" href="#" id="social"><i class="bi bi-twitter"></i></a>
										<a class="btn" href="#" id="social"><i class="bi bi-facebook"></i></a>
										<a class="btn" href="#" id="social"><i class="bi bi-linkedin"></i></a>
										<a class="btn" href="#" id="social"><i class="bi bi-instagram"></i></a>
										<a class="btn" href="#" id="social"><i class="bi bi-youtube"></i></a>
									</div>
							</div>
							<div class="col-md-6 mt-md-0 mt-3">
								<h5 class="text-center mb-3" id="touch" >Qualification</h5>
									<div class="d-flex position-relative">
										<i class="bi bi-circle-fill" style="color:#000f65"></i>
										<div class="ms-2 ps-3 position-absolute text-start"id="quali">
											<b>BCA (Bachelor of Computer Application)</b></br>
											Integral University Lucknow
											
										</div>
									</div>
									<br><br>
									<div class="d-flex position-relative">
										<i class="bi bi-circle-fill" style="color:#000f65"></i>
										<div class="ms-2 ps-3 position-absolute text-start"id="quali">
											<b>Advance Diploma Computer Application</b></br>
											From NIELIT
											
										</div>
									</div>
									<br><br>
									<div class="d-flex position-relative">
										<i class="bi bi-circle-fill" style="color:#000f65"></i>
										<div class="ms-2 ps-3 position-absolute text-start"id="quali">
											<b>Computer Application & Accounting</b></br>
											From NIELIT 
											
										</div>
									</div>
									<br><br>
									<div class="d-flex position-relative">
										<i class="bi bi-circle-fill" style="color:#000f65"></i>
										<div class="ms-2 ps-3 position-absolute text-start"id="quali">
											<b>CCC (Course on Computer Concept)</b></br>
											From NIELIT 
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-3 pb-3" style="background:#f1f1f1; border-radius:20px">
					<div>
						<h5 class="text-center" id="touch">Skills</h5>
					</div>
					<div class="col-md-6 col-12">
						<h5 class="mt-3">Web Designing</h5>
						<div class="progress bg-dark">
						  <div class="progress-bar bg-success text-dark" style="width: 85%" aria-valuemax="100">85%</div>
						</div>
						
						<h5 class="mt-3">Web Development</h5>
						<div class="progress bg-dark">
						  <div class="progress-bar bg-info text-dark" style="width: 95%" aria-valuemax="100">95%</div>
						</div>
					</div>
					<div class="col-md-6 col-12">
						<h5 class="mt-3">App Development</h5>
						<div class="progress bg-dark">
						  <div class="progress-bar bg-warning text-dark" style="width: 97%" aria-valuemax="100">97%</div>
						</div>
						
						<h5 class="mt-3">Network Connection</h5>
						<div class="progress bg-dark">
						  <div class="progress-bar bg-danger text-dark" style="width: 92%" aria-valuemax="100">92%</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	<!-- Contact Section -->
		<section class="py-5" id="contactSec">
			<div class="d-flex align-items-center justify-content-center">
				<h1 class="display-1 position-relative"id="contact">C O N T A C T</h1>
				<h1 class="position-absolute mt-2" style="color:#000f65">CONTACT US</h1>
			</div>
			<div id="contactImg">
				<div class="container pt-5 text-center">
					<div class="row justify-content-center">
						<div class="col-md-5 col-11">
							<form class="row g-3">
							  <div class="col-md-6">
								<input type="text" class="form-control" name="contactName" placeholder="Name" required>
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control" id="contactMobile" placeholder="Mobile" required>
							  </div>
							  <div class="col-12">
								<input type="text" class="form-control" id="contactEmail" placeholder="Email" required>
							  </div>
							  <div class="mb-3 col-12">
								<textarea class="form-control" name="contactMassage" rows="5" placeholder="Massage" required></textarea>
							  </div>
							  <div class="col-12">
								<button type="submit" class="btn">Submit Massage</button>
							  </div>
							</form>
						</div>
						<div class="col-md-4 col-11  mt-md-0 mt-5">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8267.
							366785680084!2d81.54554571200183!3d26.266398762180362!2m3!1f0!2f0!3f0!3m2
							!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a5362a08845ff%3A0x129b3def7472ccae!
							2sJais%2C%20Uttar%20Pradesh%20229305!5e0!3m2!1sen!2sin!4v1647572711852!5m2!1sen!2sin" 
							width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
					<div class="row mt-5 pt-5" style="background:">
						<div class="col-12 mt-3 d-flex justify-content-center" id="contactIcon">
							<ul>
								<li><a href="#"><i class="bi bi-twitter"></i></a></li>
								<li><a href="#"><i class="bi bi-facebook"></i></a></li>
								<li><a href="#"><i class="bi bi-whatsapp"></i></a></li>
								<li><a href="#"><i class="bi bi-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
					
			</div>
		</section>
		
	<!-- Footer Section -->
		<section id="footerSec">
			<div class="container-fluid text-center mt-5 pt-5">
				<div class="row" id="footer">
					<div class="col-lg-6 col-md-12 col-12 mt-3 d-flex justify-content-center align-items-center">
						<ul>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Term & Condition</a></li>
							<li><a href="#">Sitemap</a></li>
							<li><a href="#callModal" data-bs-toggle="modal">Admin Panel</a></li>
						</ul>
					</div>
					<div class="col-lg-6 col-md-12 col-12 my-4 justify-content-center">
						Powered by ITS (Idris Tech Service) | &copy 2022 M. Husain Jayasi All Reserved
					</div>
				</div>
			</div>
		</section>

		<!-- Login Modal -->
			<div class="modal fade" id="callModal" tabindex="5">
			  <div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				  </div>
				  <div class="modal-body">
					
					<!-- Login Form -->
						<form method="post">
						  <div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" name="email" required>
						  </div>
						  <div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="pass" required>
						  </div>
						  <button type="submit" class="btn btn-primary" name="login">login</button>
						</form>
				  </div>
				  <div class="modal-footer">
					<a href="#">Forgot Email Password</a>
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

