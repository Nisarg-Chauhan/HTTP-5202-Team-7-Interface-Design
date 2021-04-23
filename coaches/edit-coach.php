<?php 
    
    include '../Template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Coaches.php';
    
    session_start();
    //The admin can edit a coach information
    if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){
        
        header("location:../login/login.php");
    }
    $dbcon = Database::getDb();
    
    if(isset($_POST['updateCoach'])){
        
        //Getting the data received from the update form
        $testId = $_POST['coach_id'];
        $_SESSION['cId']=$testId;
        $test=new Coach();
        $coach=$test->getCoachById($_SESSION['cId'], $dbcon);
    }
    
    if(isset($_POST['editCoach'])){
        
        //Getting the data received from the edit form
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
		if(!empty($image)){
            $picture = file_get_contents($image);
        } else {
            $picture=null; 
        }
        
        //Field validation
        include '../testimonials/formValidation.php';
        
		$nameRegex="/^[a-zA-Z]{2,}'?-?[a-zA-Z]{2,}$/i";
        $regex="/^[1-9]\d*$/";    //Only positive number for id
		$emailRegex="/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		
		//Outputs of validation used to write to the database
        $resultId=validateInput($tId,"coach Id", $regex);
        $resultFname=validateInput($fname,"first name", $nameRegex);
		$resultLname=validateInput($lname,"last name", $nameRegex);
        $resultExperience=validateInput($experience,"experience", $regex);
		$resultSpeciality=validateInput($speciality,"speciality", $nameRegex);
        $resultAdvice=validateInput($advice,"advice");
        $resultEmail=validateInput($email,"email",$emailRegex);
        
        //Saving the modified coach into the database
        $testUp=new Coach();
        
        //Adding the validated coach to the database
		if($resultId['bool'] && $resultFname['bool'] && $resultLname['bool'] && $resultExperience['bool'] && $resultSpeciality['bool'] && $resultAdvice['bool'] && $resultEmail['bool']){
            $count= $testUp->updateCoach($tId,$fname,$lname,$experience,$speciality,$advice,$email,$picture,$dbcon);
        }
        
        if(isset($count) && $count>0){
            
            header("Location: coach-list.php");
        }
        else {
            echo "Problem updating the coach";
        }
        
    }
?>


<main class="container coach">
    
    <h1>Update a coach!</h1>
    
    <form action="" method="POST" name="coachInfo" enctype="multipart/form-data">
        
        <input type="hidden" name="tid" value="<?= $_SESSION['cId']; ?>" />
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="fname">First name</label>
            <input type="text" name="fname" id="fname" value="<?=isset($coach->first_name)?$coach->first_name:$fname ?>" class="form-control" placeholder="Type coach first name"/>
            <span style="color:red;"><?= (isset($resultFname) && !$resultFname['bool'])?$resultFname['text']:'';?></span>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="lname">Last name</label>
            <input type="text" name="lname" id="lname" value="<?=isset($coach->last_name)?$coach->last_name:$lname ?>" class="form-control" placeholder="Type coach last name"/>
            <span style="color:red;"><?= (isset($resultLname) && !$resultLname['bool'])?$resultLname['text']:'';?></span>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="experience">Experience</label>
            <input type="text" name="experience" id="experience" value="<?=isset($coach->experience)?$coach->experience:$experience ?>" class="form-control" placeholder="Type coach experience"/>
            <span style="color:red;"><?= (isset($resultExperience) && !$resultExperience['bool'])?$resultExperience['text']:'';?></span>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="speciality">Speciality</label>
            <input type="text" name="speciality" id="speciality" value="<?=isset($coach->speciality)?$coach->speciality:$speciality ?>" class="form-control" placeholder="Type coach speciality"/>
            <span style="color:red;"><?= (isset($resultSpeciality) && !$resultSpeciality['bool'])?$resultSpeciality['text']:'';?></span>
        </div>
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="advice">Advice</label>
            <textarea name="advice" id="advice"  class="form-control" placeholder="Type coach advice"> <?=isset($coach->advice)?$coach->advice:$advice ?> </textarea>
            <span style="color:red;"><?= (isset($resultAdvice) && !$resultAdvice['bool'])?$resultAdvice['text']:'';?></span>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=isset($coach->email)?$coach->email:$email ?>" class="form-control" placeholder="Type coach email"/>
            <span style="color:red;"><?= (isset($resultEmail) && !$resultEmail['bool'])?$resultEmail['text']:'';?></span>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control"/>
        </div>
        
        <input type="submit" name="editCoach" id="send" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
        <a href="coach-list.php" class="offset-1">List of coaches</a>
    </form>
    
</main>

<?php include '../Template/footer.php'; ?>