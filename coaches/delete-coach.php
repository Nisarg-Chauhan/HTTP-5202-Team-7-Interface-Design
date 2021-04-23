<?php

    include '../Template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Coaches.php';
    
    session_start();
     //The user must be an admin to be able to delete a coach
    if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){

        header("location:../login/login.php");
    }
    
    $dbcon = Database::getDb();
    $test = new Coach();
    $coaches =  $test->getAllCoaches($dbcon);
    
    
?> 

<?php
    
    if(isset($_POST['deleteCoach'])){
        
        //Getting the data received from the form
        $testId = $_POST['coach_id'];
        
        $test = new Coach();
        $count = $test->deleteCoach($testId, $dbcon);
        
        if($count){
            
            header("Location: coach-list.php");
            }
            else {
                echo " problem removing the coach";
            }
            
            
        }
    ?> 
    
    <main class="container coach">
        
        <h1>Remove a testimonial</h1>
        
        <form action="" method="POST" name="coachInfo">
            
            
            <div class="form-group offset-sm-4 offset-md-5">
            <label for="coach">Select a coach</label>
            <select name="coach_id" id="coach" class="form-select">
                <?php
                //List all the coaches
					foreach ($coaches as $coach){
                        
						echo '<option value="'.$coach->id .'">'.$coach->first_name .' '.$coach->last_name. "</option>";
                    }
					//End of options insertion
                ?>
            </select>
        </div>
        
        <input type="submit" id="submit" name="deleteCoach" class="offset-sm-4 offset-md-5 btn btn-danger float-right" value="Delete"/>
        <a href="coach-list.php" class="offset-1">List of coaches</a>
    </form>
    
     
</main>

<?php include '../Template/footer.php'; ?>