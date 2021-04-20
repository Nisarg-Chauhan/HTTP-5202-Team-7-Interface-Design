<?php 
    include '../header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/Workouts.php';
	
	session_start();
	
	if(isset($_SESSION['login'])){
	
	  $userId=$_SESSION['userId'];
	  
	} else {
	
        header("location:../login/login.php");
    }
	
    $dbcon = Database::getDb();
    $workout = new Workout();
    $workouts =  $workout->getUserWorkout($dbcon,$userId);
    //var_dump($workouts);
    
    if(isset($_POST['deleteWorkout'])){
        
        //Getting the data received from the form
        $ids = $_POST['workout'];
		
       //var_dump($ids);
		for($j=0;$j<count($ids);$j++){
			
			$test = new Workout();
			$count = $test->deleteWorkout((int)$ids[$j], $dbcon);
		}
        
        if($count){
            
            header("Location: workouts-list.php");
	    } else {
			echo " problem removing the workout";
		}
		
		
	}
?> 

<main class="container plan planner">
	
	<div class="row">
	<h1>Customer plans</h1>
	<form action="" method="POST">
		<div class="form-group offset-sm-4 offset-md-5">
			<label  for="workout">Workout to delete</label>
			<select name="workout[]" id="workout" class="form-control" multiple>
				<?php
					foreach ($workouts as $work){
						
						echo '<option selected value="'.$work->workout_id .'">'.$work->exercise_name.'</option>';
					}
				?>
			</select>
		</div>
		<input type="submit" id="submit" name="deleteWorkout" class="offset-sm-4 offset-md-5 btn btn-danger float-right" value="Delete"/>
		<a href="workouts-list.php" class="offset-1">List of workouts</a>
	</form>
	</div>
	
	
</main>		

<?php include '../footer.php'; ?>