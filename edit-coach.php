<?php 
    
   // include 'header.php';
    require_once 'Models/Database.php';
    require_once 'Models/Coaches.php';
    
    $dbcon = Database::getDb();
    
     if(isset($_POST['updateCoach'])){
        
        //Getting the data received from the form
        $testId = $_POST['coach_id'];
        
        $test=new Coach();
        $coach=$test->getCoachById($testId, $dbcon);
    }
?>

<?php

    if(isset($_POST['editCoach'])){
        
        //Getting the data received from the form
        $tId = $_POST['tid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $experience = $_POST['experience'];
        $speciality = $_POST['speciality'];
        $advice = $_POST['advice'];
        $email = $_POST['email'];
        //$name=$_FILES['picture']['name'];
        $image =$_FILES['picture']['tmp_name'];
		//$picture= basename($name);
		//$name=$_FILES['picture']['name'];
		
		$picture = file_get_contents($image);
        
        //echo $picture;
        
        $testUp=new Coach();
        $count= $testUp->updateCoach($tId,$fname,$lname,$experience,$speciality,$advice,$email,$picture,$dbcon);
        
        
        if($count){
            
            header("Location: coach-list.php");
        }
        else {
                echo " problem updating the coach";
        }
            
    }
?>


<main class="container coach">
    
    <h1>Update a coach!</h1>
    
    <form action="" method="POST" name="coachInfo" enctype="multipart/form-data">
    
        <input type="hidden" name="tid" value="<?= $testId; ?>" />
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="fname">First name</label>
        <input type="text" name="fname" id="fname" value="<?=$coach->first_name ?>" class="form-control" placeholder="Type coach first name"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="lname">Last name</label>
        <input type="text" name="lname" id="lname" value="<?=$coach->last_name ?>" class="form-control" placeholder="Type coach last name"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="experience">Experience</label>
        <input type="text" name="experience" id="experience" value="<?=$coach->experience ?>" class="form-control" placeholder="Type coach experience"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="speciality">Speciality</label>
        <input type="text" name="speciality" id="speciality" value="<?=$coach->speciality ?>" class="form-control" placeholder="Type coach speciality"/>
        </div>
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="advice">Advice</label>
            <textarea name="advice" id="advice"  class="form-control" placeholder="Type coach advice"> <?=$coach->advice ?> </textarea>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=$coach->email ?>" class="form-control" placeholder="Type coach email"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="picture">Picture</label>
        <input type="file" name="picture" id="picture" class="form-control"/>
        </div>
        
        <input type="submit" name="editCoach" id="send" onclick="validateTestimonials();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
        <a href="coach-list.php" class="offset-1">List of coaches</a>
    </form>
    
</main>

<?php include 'footer.php'; ?>