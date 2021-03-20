<?php include 'header.php' ?>

<main class="container plan planner">
	
	<div class="row">
	<h1>Standard workouts </h1>
	
		<div class="workout fat-loss table-responsive col-lg-12">
								
			<h3>Four week weight loss program</h3>
			<table class="table table-striped">
			
				<thead >
					<tr>
						<th scope="col">Week</th>
						<th scope="col">Monday</th>
						<th scope="col">Tuesday</th>
						<th scope="col">Wednesday</th>
						<th scope="col">Thursday</th>
						<th scope="col">Friday</th>
						<th scope="col">Saturday</th>
						<th scope="col">Sunday</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">One</th>
						<td>Cardio</td>
						<td>Strength</td>
						<td>Full body</td>
						<td>Fat loss</td>
						<td>Yoga</td>
						<td>Cardio</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Two</th>
						<td>Biking</td>
						<td>Running</td>
						<td>Off</td>
						<td>Fat loss</td>
						<td>Swimming</td>
						<td>Cardio</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Three</th>
						<td>Cardio</td>
						<td>Running</td>
						<td>Full body</td>
						<td>Cardio</td>
						<td>Full body </td>
						<td>Biking</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Four</th>
						<td>Full body</td>
						<td>Strength</td>
						<td>Full body</td>
						<td>Biking</td>
						<td>Cardio</td>
						<td>Yoga</td>
						<td>Off</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="workout strength table-responsive col-lg-12">
			<h3>Four week strength program</h3>
			<table class="table table-striped">
			
			
				<thead >
					<tr>
						<th scope="col">Week</th>
						<th scope="col">Monday</th>
						<th scope="col">Tuesday</th>
						<th scope="col">Wednesday</th>
						<th scope="col">Thursday</th>
						<th scope="col">Friday</th>
						<th scope="col">Saturday</th>
						<th scope="col">Sunday</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">One</th>
						<td>Cardio</td>
						<td>Strength</td>
						<td>Strength</td>
						<td>Fat loss</td>
						<td>Yoga</td>
						<td>Cardio</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Two</th>
						<td>Biking</td>
						<td>Running</td>
						<td>Off</td>
						<td>Fat loss</td>
						<td>Swimming</td>
						<td>Cardio</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Three</th>
						<td>Cardio</td>
						<td>Running</td>
						<td>Strength</td>
						<td>Cardio</td>
						<td>Full body </td>
						<td>Biking</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Four</th>
						<td>Full body</td>
						<td>Strength</td>
						<td>Off</td>
						<td>Biking</td>
						<td>Cardio</td>
						<td>Yoga</td>
						<td>Off</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="workout general table-responsive col-lg-12">
		<h3>Four week general program</h3>
			
			<table class="table table-striped">
			
				<thead >
					<tr>
						<th scope="col">Week</th>
						<th scope="col">Monday</th>
						<th scope="col">Tuesday</th>
						<th scope="col">Wednesday</th>
						<th scope="col">Thursday</th>
						<th scope="col">Friday</th>
						<th scope="col">Saturday</th>
						<th scope="col">Sunday</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">One</th>
						<td>Cardio</td>
						<td>Strength</td>
						<td>Off</td>
						<td>Fat loss</td>
						<td>Yoga</td>
						<td>Cardio</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Two</th>
						<td>Biking</td>
						<td>Running</td>
						<td>Off</td>
						<td>Fat loss</td>
						<td>Swimming</td>
						<td>Cardio</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Three</th>
						<td>Cardio</td>
						<td>Running</td>
						<td>Off</td>
						<td>Cardio</td>
						<td>Full body </td>
						<td>Biking</td>
						<td>Off</td>
					</tr>
					<tr>
						<th scope="row">Four</th>
						<td>Full body</td>
						<td>Strength</td>
						<td>Off</td>
						<td>Biking</td>
						<td>Cardio</td>
						<td>Yoga</td>
						<td>Off</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<h2>Get your customized plan!</h2>
		
		<form action="" method="POST" name="clientInfo">
			<fieldset>
				<legend >Body information</legend>
				<div >
					<label for="height">Height</label>
					<input type="text" name="height" id="height" class="form-control" placeholder="Type your height in cm"/>
				</div>
				<div >
					<label for="weight">Weight</label>
					<input type="text" name="weight" id="weight" class="form-control" placeholder="Type your weight in kg"/>
				</div>
				<div>
					<label for="waist">Waist</label>
					<input type="text" name="waist" id="waist" class="form-control" placeholder="Type your waist in cm"/>
				</div>
				<div>
					<label for="body-fat">Body fat</label>
					<input type="text" name="bodyFat" id="body-fat" class="form-control" placeholder="Type your body fat"/>
				</div>
				<div >
					<label for="bmi">BMI</label>
					<input type="text" name="bmi" id="bmi"  class="form-control" placeholder="Type your BMI"/>
				</div>
			</fieldset>
			<input type="submit" name="submit" id="submit" onclick="validatePlanner();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Get your plan"/>
			<a href="coach-list.php" class="offset-1">Get advice</a>
		</form>
	</div>	
	
</main>		

<?php include 'footer.php'; ?>