<?php

    include '../Template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Exercises.php';
    
    session_start();
	
	if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){

        header("location:../login/login.php");
    }
    
    $dbcon = Database::getDb();
    $test = new Exercise();
    $exercises =  $test->getAllExercises($dbcon);
    
    
?> 

<?php
    
    if(isset($_POST['deleteExer'])){
        
        //Getting the data received from the form
        $testId = $_POST['exer_id'];
        
        $test = new Exercise();
        $count = $test->deleteExercise($testId, $dbcon);
        
        if($count){
            
            header("Location: exercise-list.php");
            }
            else {
                echo " problem removing the exercise";
            }
            
            
        }
    ?> 
    
    <main class="container coach">
        
        <h1>Remove an exercise</h1>
        
        <form action="" method="POST" name="coachInfo">
            
            
            <div class="form-group offset-sm-4 offset-md-5">
            <label for="exer_id">Select an exercise</label>
            <select name="exer_id" id="exer_id" class="form-select">
                <?php
					//Populating the dropdown list using associative arrays
					//Array containing all the options
					//$selectOptions=$users;
					foreach ($exercises as $exer){
                        //echo '<option value="'.$user->id.'"'.((isset($user->first_name) && $age==$selectValue)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
						echo '<option value="'.$exer->id .'">'.$exer->exercise_name ."</option>";
                    }
					//End of options insertion
                ?>
            </select>
        </div>
        
        <input type="submit" id="submit" name="deleteExer" class="offset-sm-4 offset-md-5 btn btn-danger float-right" value="Delete"/>
        <a href="exercise-list.php" class="offset-1">List of exercises</a>
    </form>
    
     
</main>

<?php include '../Template/footer.php'; ?>