<?php 
    //session_start();
    ob_start(); 
    include '../template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Coaches.php';
    
    
    //Admin is allowed to update coach informations
    if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){
        header("Location:../login/login.php");
    }
    
    $dbcon = Database::getDb();
    $test = new Coach();
    //Get the coach list to choose the one to be edited
    $coaches =  $test->getAllCoaches($dbcon);
?>

<main class="container coach">
    
    <h1>Update a coach</h1>
    
    <form action="edit-coach.php" method="POST" name="coachInfo">
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="coach">Select a coach</label>
            <select name="coach_id" id="coach" class="form-control">
                <?php
                    //List of the coach
					foreach ($coaches as $coach){
						echo '<option value="'.$coach->id .'">'.$coach->first_name .' '.$coach->last_name."</option>";
                    }
					//End of options insertion
                ?>
            </select>
        </div>
        <div class="row">
        <div class="col-12 col-sm-6">
                <a href="coach-list.php" class="offset-1">List of coaches</a>
            </div>
            <div class="col-12 col-sm-6">
                <input type="submit" id="submit" name="updateCoach"  class="btn btn-primary float-right" value="Update"/>
            </div>
            
        </div>
    </form>
    
</main>


            <?php include '../template/footer.php'; ?>                        