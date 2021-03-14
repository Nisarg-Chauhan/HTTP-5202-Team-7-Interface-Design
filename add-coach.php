<?php include 'header.php' ?>

<main class="container planner">
	
	<h1>Add a coach</h1>
	
	<div class="row justify-content-sm-center"> 
	
		<div class="col col-md-8 col-lg-6 d-flex justify-content-sm-center">
		
			<form action="" method="POST" name="coachInfo">
				
					<div class="form-group">
						<label for="fname">First name</label>
						<input type="text" name="first_name" id="fname" class="form-control" placeholder="Type coach first name"/>
					</div>
					<div class="form-group">
						<label for="lname">Last name</label>
						<input type="text" name="last_name" id="lname" class="form-control" placeholder="Type last name"/>
					</div>
					<div class="form-group">
						<label for="experience">Experience</label>
						<input type="text" name="experience" id="experience" class="form-control" placeholder="Type coach experience"/>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control" placeholder="Type coach email"/>
					</div>
			
				<input type="submit" name="submit" id="submit" onclick="validateCoach();" class="btn btn-success float-right" value="Submit"/>
			</form>
				
		</div>
			
	</div>
		
</main>		
	
	<?php include 'footer.php'; ?>