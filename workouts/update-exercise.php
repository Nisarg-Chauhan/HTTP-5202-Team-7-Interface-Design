<?php 
    //session_start();
	ob_start(); 
    include '../template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Exercises.php';
	
	if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){

        header("location:../login/login.php");
    }
    
    $dbcon = Database::getDb();
    $test = new Exercise();
    $exers =  $test->getAllExercises($dbcon);
?>

<main class="container coach">
    
        <h1>Update an exercise</h1>
        
        <form action="edit-exercise.php" method="POST" name="coachInfo">
            
            
            <div class="form-group offset-sm-4 offset-md-5">
            <label for="exer_id">Select an exercise</label>
            <select name="exer_id" id="exer_id" class="form-select">
                <?php
					//Populating the dropdown list using associative arrays
					//Array containing all the options
					//$selectOptions=$users;
					foreach ($exers as $exer){
                        //echo '<option value="'.$user->id.'"'.((isset($user->first_name) && $age==$selectValue)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
						echo '<option value="'.$exer->id .'">'.$exer->exercise_name."</option>";
                    }
					//End of options insertion
                ?>
            </select>
        </div>
        
        <input type="submit" id="submit" name="updateExer"  class="offset-sm-4 offset-md-5 btn btn-primary float-right" value="Update"/>
        <a href="exercise-list.php" class="offset-1">List of exercises</a>
    </form>
    
</main>


<?php include '../template/footer.php'; ?>