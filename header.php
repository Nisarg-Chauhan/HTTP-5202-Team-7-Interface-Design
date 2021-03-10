<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome to Your Wellbeing</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<!-- Bootstrap css -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./css/home_style.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="./css/planner.css">
		<link rel="stylesheet" type="text/css" href="./css/login.css">
		<!-- Jquery Bootstrap -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		
	</head>
    <body>
		
		<nav>
			<div class="logo">
				<a href="#">Your <span class="red">Well</span>being<span><i class="fa fa-heartbeat"></i></span></a>
			</div>
			<label for="btn" class="icon">
				<span class="fa fa-bars"></span> 
			</label>
			<input type="checkbox" id="btn">
			<ul>
				<li><a href="homepage.php">Home</a></li>
				<li><a href="#">About</a></li>
				<li>
					<label for="btn-1" class="show">Planner +</label>
					<a href="planner.php">Planner</a>
					<input type="checkbox" id="btn-1" />  
					<ul>
						<li><a href="#">Diet Planner</a></li>
						<li><a href="#">BMI Calculator</a></li>
						<li><a href="#">Performance</a></li>
					</ul>
				</li>
				<li>
					<label for="btn-2" class="show">Products +</label>
					<a href="#">Products</a>
					<input type="checkbox" id="btn-2" />
					<ul>
						<li><a href="#">Sponsored Products</a></li>
						<li><a href="#">Payment</a></li>
					</ul>
				</li>
				<li>
					<label for="btn-3" class="show">Contact +</label>
					<a href="#">Contact</a>
					<input type="checkbox" id="btn-3" />
					<ul>
						<li><a href="#">FAQ</a></li>
						<li><a href="testimonials.php">Testimonials</a></li>
						<li><a href="#">Newsletters</a></li>
					</ul>
				</li>
			</ul>
		</nav>