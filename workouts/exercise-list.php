<?php 
	//session_start();
	//ob_start(); 
	
    include '../template/header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/Exercises.php';
    
    $dbcon = Database::getDb();
    $exo = new Exercise();
    $exercises =  $exo->getAllExercises($dbcon);
    
?>


<main class="container coach">
	
	<h1>Our exercise list</h1>
	
	
	<?php
		
		foreach($exercises as $currentExer){
			
			echo '
			<div class="row justify-content-sm-center"> 
			<div class="col-11 col-sm-1">
			<p>'.$currentExer->exercise_name. '</p>
			</div>
			<div class="text col-12 col-sm-6">
			<p>'.$currentExer->exercise_description. '</p>
			
			</div>
			<div class="text col-12 col-sm-3">
			<p>'.$currentExer->calorie_burnt. ' g calorie burnt</p>
			
			</div>
			</div>';
		}
	?>
	
	<div class="row justify-content-center">
		<div class=" m-2 offset-lg-3 offset-3  col-6 col-sm-3">
			<a href="add-exercise.php">Add a new exercise</a>
		</div>
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="update-exercise.php">Update an exercise?</a>
		</div>
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="delete-exercise.php">Delete an exercise?</a>
		</div>
	</div>
	
	<div class="row justify-content-center">
		
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="workouts-list.php">Back to workout list</a>
		</div>
	</div>
	
	
</main>		

<?php include '../template/footer.php'; ?>