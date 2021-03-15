<?php include 'header.php' ?>

<main class="container planner">
	
	<h1>Add a coach</h1>
	
	<form  action="" method="POST" name="coachInfo">
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label  for="fname">First name</label>
			<input type="text" name="first_name" id="fname" class="form-control" placeholder="Type coach first name"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="lname">Last name</label>
			<input type="text" name="last_name" id="lname" class="form-control" placeholder="Type last name"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="experience">Experience</label>
			<input type="text" name="experience" id="experience" class="form-control" placeholder="Type coach experience"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Type coach email"/>
		</div>
		<input type="submit" name="submit" id="submit" onclick="validateCoach();" class=" offset-sm-4 offset-md-5 btn btn-success float-right" value="Submit"/>
	</form>
	
	
</main>		

	<?php include 'footer.php'; ?>	