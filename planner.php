<?php include 'header.php' ?>

<main class="container planner">
	
	<h1>Provide your information and we do the rest!</h1>
	
	<div class="row justify-content-sm-center"> 
	
		<div class="col col-sm-8 col-lg-6">
		
			<form action="" method="POST" name="clientInfo">
				<fieldset>
					<legend>Body information</legend>
					<div class="form-group">
						<label for="height">Height</label>
						<input type="text" name="height" id="height" class="form-control" placeholder="Type your height in cm"/>
					</div>
					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" name="weight" id="weight" class="form-control" placeholder="Type your weight in kg"/>
					</div>
					<div class="form-group">
						<label for="waist">Waist</label>
						<input type="text" name="waist" id="waist" class="form-control" placeholder="Type your waist in cm"/>
					</div>
					<div class="form-group">
						<label for="body-fat">Body fat</label>
						<input type="text" name="bodyFat" id="body-fat" class="form-control" placeholder="Type your body fat"/>
					</div>
					<div class="form-group">
						<label for="bmi">BMI</label>
						<input type="text" name="bmi" id="bmi"  class="form-control" placeholder="Type your BMI"/>
					</div>
				</fieldset>
				<input type="submit" name="submit" id="submit" onclick="validatePlanner();" class="btn btn-success float-right" value="Submit"/>
			</form>
				
		</div>
			
	</div>
		
</main>		
	
	<?php include 'footer.php'; ?>