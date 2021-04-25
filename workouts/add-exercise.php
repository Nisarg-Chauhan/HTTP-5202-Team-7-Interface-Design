<?php 
	//session_start();
	ob_start(); 
	
	include '../Template/header.php';
	require_once '../Models/Database.php';
	require_once '../Models/Exercises.php';
	
	
	if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){

        header("location:../login/login.php");
    }
	
	if(isset($_POST['addExercise'])){
	 
	 $exName=$_POST['ex_name'];
		$exDescription=$_POST['ex_description'];
		$calorie=$_POST['calorie'];
		
		$dbcon=Database::getDb();
		$exercise=new Exercise();
		$count=$exercise->addExercise($exName,$exDescription,$calorie,$dbcon);
		
		if($count){
            
            header("Location:exercise-list.php");
        }
        else {
                echo " problem adding the exercise";
        }
		
		
		
	}
?>

<main class="container planner">
	
	<h1>Add an exercise</h1>
	
	<form  action="" method="POST" name="coachInfo" enctype="multipart/form-data">
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label  for="ex_name">Exercise name</label>
			<input type="text" name="ex_name" id="ex_name" class="form-control" placeholder="Type exercise name"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="ex_description">Description</label>
			<input type="text" name="ex_description" id="ex_description" class="form-control" placeholder="Type the description"/>
		</div>
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="calorie">Calorie burnt in gramme</label>
			<input type="text" name="calorie" id="calorie" class="form-control" placeholder="Type the amont of calories in g"/>
		</div>
		
		<input type="submit" name="addExercise" id="submit" onclick="validateCoach();" class=" offset-sm-4 offset-md-5 btn btn-success float-right" value="Submit"/>
		<a href="exercise-list.php" class="offset-1">List of exercises</a>
	</form>
	
	
</main>		

<?php include '../Template/footer.php'; ?>	