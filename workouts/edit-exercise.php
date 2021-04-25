<?php 
    //session_start();
	ob_start(); 
   include '../Template/header.php';
   require_once '../Models/Database.php';
    require_once '../Models/Exercises.php';
    
	if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){

        header("location:../login/login.php");
    }
    
    $dbcon = Database::getDb();
    
     if(isset($_POST['updateExer'])){
        
        //Getting the data received from the form
        $testId = $_POST['exer_id'];
        
        $test=new Exercise();
        $exer=$test->getExerciseById($testId, $dbcon);
    }
?>

<?php

    if(isset($_POST['editExer'])){
        
        //Getting the data received from the form
        $tId = $_POST['tid'];
        $exerName = $_POST['ex_name'];
        $description = $_POST['ex_desc'];
        $calorie=$_POST['calorie'];
             
        $testUp=new Exercise();
        $count= $testUp->updateExercise($tId,$exerName,$description,$calorie, $dbcon);
        
        
        if($count){
            
            header("Location: exercise-list.php");
        }
        else {
                echo " problem updating the exercise";
        }
            
    }
?>


<main class="container coach">
    
    <h1>Update an exercise!</h1>
    
    <form action="" method="POST" name="coachInfo" enctype="multipart/form-data">
    
        <input type="hidden" name="tid" value="<?= $testId; ?>" />
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="ex_name">Exercise name</label>
        <input type="text" name="ex_name" id="ex_name" value="<?=$exer->exercise_name ?>" class="form-control"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="ex_desc">Description</label>
        <input type="text" name="ex_desc" id="ex_desc" value="<?=$exer->exercise_description ?>" class="form-control"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
			<label for="calorie">Calorie burnt in gramme</label>
			<input type="text" name="calorie" id="calorie" class="form-control" value="<?=$exer->calorie_burnt ?>"/>
		</div>
        
        <input type="submit" name="editExer" onclick="validateTestimonials();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
        <a href="exercise-list.php" class="offset-1">List of exercises</a>
    </form>
    
</main>

<?php include '../Template/footer.php'; ?>