<?php 
	include '../header.php';
	require_once '../Models/Database.php';
	require_once '../Models/Coaches.php';
	
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
		
		$picture = file_get_contents($image);
		
		$dbcon=Database::getDb();
		$coach=new Coach();
		$count=$coach->addCoach($fname,$lname,$experience,$speciality,$advice,$email,$picture,$dbcon);
		
		if($count){
            
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
			<input type="text" name="first_name" id="fname" class="form-control" placeholder="Type coach first name"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="lname">Last name</label>
			<input type="text" name="last_name" id="lname" class="form-control" placeholder="Type last name"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="experience">Experience</label>
			<input type="text" name="experience" id="experience" class="form-control" placeholder="Type coach experience"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="speciality">Speciality</label>
			<input type="text" name="speciality" id="speciality" class="form-control" placeholder="Type coach email"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="advice">Advice</label>
			<textarea name="advice" id="advice" class="form-control" placeholder="Type coach advice"></textarea>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Type coach email"/>
		</div>
		
		<div class="form-group offset-sm-4 offset-md-5">
			<label for="picture">Picture</label>
			<input type="file" name="picture" id="picture" class="form-control"/>
		</div>
		<input type="submit" name="addCoach" id="submit" onclick="validateCoach();" class=" offset-sm-4 offset-md-5 btn btn-success float-right" value="Submit"/>
		<a href="coach-list.php" class="offset-1">List of coaches</a>
	</form>
	
	
</main>		

<?php include '../footer.php'; ?>	