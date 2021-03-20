<?php

    include 'header.php';
    require_once 'Models/Database.php';
    require_once 'Models/Coaches.php';
    
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
					//Populating the dropdown list using associative arrays
					//Array containing all the options
					//$selectOptions=$users;
					foreach ($coaches as $coach){
                        //echo '<option value="'.$user->id.'"'.((isset($user->first_name) && $age==$selectValue)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
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

<?php include 'footer.php'; ?>