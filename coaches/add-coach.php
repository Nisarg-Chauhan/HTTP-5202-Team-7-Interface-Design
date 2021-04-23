<?php 
	include '../Template/header.php';
	require_once '../Models/Database.php';
	require_once '../Models/Coaches.php';
	
	session_start();
	
	//Only the admin can add coaches to the database
	if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){
		
        //Login page
        header("location:../login/login.php");
	}
	
	//Information received from the form
	if(isset($_POST['addCoach'])){
		
		$fname=$_POST['first_name'];
		$lname=$_POST['last_name'];
		$experience=$_POST['experience'];
		$speciality=$_POST['speciality'];
		$advice=$_POST['advice'];
		$email=$_POST['email'];
		
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
		$regexText="/^(?=.*?[a-zA-Z]).{3,}$/i"; //At least 3 characters
        $regex="/^[1-9]\d*$/";    //Only positive number for id
		$emailRegex="/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		
		//Outputs of validation used to write to the database
        $resultFname=validateInput($fname,"first name", $nameRegex);
		$resultLname=validateInput($lname,"last name", $nameRegex);
        $resultExperience=validateInput($experience,"experience", $regex);
		$resultSpeciality=validateInput($speciality,"speciality", $regexText);
        $resultAdvice=validateInput($advice,"advice");
        $resultEmail=validateInput($email,"email",$emailRegex);
		
		$dbcon=Database::getDb();
		$coach=new Coach();
		
		//Adding the validated coach to the database
		if($resultFname['bool'] && $resultLname['bool'] && $resultExperience['bool'] && $resultSpeciality['bool'] && $resultAdvice['bool'] && $resultEmail['bool']){
			$count=$coach->addCoach($fname,$lname,$experience,$speciality,$advice,$email,$picture,$dbcon);
		}
		if(isset($count) && $count>0){
            
            header("Location: coach-list.php");
		}
        else {
			echo " problem adding the coach";
		}
		
		
	}
?>

<main class="container planner">
	
	<h1>Add a coach</h1>
	
	<form  action="" method="POST" name="coachInfo" enctype="multipart/form-data">
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label  for="fname">First name</label>
			<input type="text" name="first_name" value="<?=isset($resultFname)?$fname:'';?>"  id="fname" class="form-control" placeholder="Type coach first name"/>
		    <span style="color:red;"><?= (isset($resultFname) && !$resultFname['bool'])?$resultFname['text']:'';?></span>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="lname">Last name</label>
			<input type="text" name="last_name" value="<?=isset($resultLname)?$lname:'';?>" id="lname" class="form-control" placeholder="Type last name"/>
		    <span style="color:red;"><?= (isset($resultLname) && !$resultLname['bool'])?$resultLname['text']:'';?></span>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="experience">Experience</label>
			<input type="text" name="experience" value="<?=isset($resultExperience)?$experience:'';?>" id="experience" class="form-control" placeholder="Type coach experience"/>
		    <span style="color:red;"><?= (isset($resultExperience) && !$resultExperience['bool'])?$resultExperience['text']:'';?></span>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="speciality">Speciality</label>
			<input type="text" name="speciality" value="<?=isset($resultSpeciality)?$speciality:'';?>"  id="speciality" class="form-control" placeholder="Type coach email"/>
		    <span style="color:red;"><?= (isset($resultSpeciality) && !$resultSpeciality['bool'])?$resultSpeciality['text']:'';?></span>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="advice">Advice</label>
			<textarea name="advice" id="advice" value="<?=isset($resultAdvice)?$advice:'';?>"  class="form-control" placeholder="Type coach advice"></textarea>
		    <span style="color:red;"><?= (isset($resultAdvice) && !$resultAdvice['bool'])?$resultAdvice['text']:'';?></span>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="email">Email</label>
			<input type="email" name="email" value="<?=isset($resultEmail)?$email:'';?>" id="email" class="form-control" placeholder="Type coach email"/>
		    <span style="color:red;"><?= (isset($resultEmail) && !$resultEmail['bool'])?$resultEmail['text']:'';?></span>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="picture">Picture</label>
			<input type="file" name="picture" id="picture" class="form-control"/>
		</div>
		<input type="submit" name="addCoach" id="submit" onclick="validateCoach();" class=" offset-sm-4 offset-md-5 btn btn-success float-right" value="Submit"/>
		<a href="coach-list.php" class="offset-1">List of coaches</a>
	</form>
	
	
</main>		

<?php include '../Template/footer.php'; ?>	