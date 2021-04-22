<?php 
    include '../header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/Coaches.php';
    
    $dbcon = Database::getDb();
    $coach = new Coach();
    $coaches =  $coach->getAllCoaches($dbcon);
    
?> 


<main class="container coach">
	
	<h1>Our coaches and their expertise</h1>
	
	
	<?php
	
		//Display the list of coaches from database
		
		foreach($coaches as $currentCoach){
			
			$img = base64_encode($currentCoach->picture);
			echo '
			<div class="row justify-content-sm-center"> 
			<div class=" pic col-11 col-sm-2">
			
			<img src="data:image/jpg;base64,'.$img. '" alt="coach picture" /> 
			
			</div>
			<div class="text col-12 col-sm-6">
			
			<h2> Hello, I am '.$currentCoach->first_name.' '.$currentCoach->last_name.' </h2>
			<p>'.$currentCoach->advice. '</p>
			
			</div>
			</div>';
		}
	?>
	
	<div class="row justify-content-center">
		<div class=" m-2 offset-lg-3 offset-3  col-6 col-sm-3">
			<a href="add-coach.php">Add a new coach</a>
		</div>
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="update-coach.php">Update a coach?</a>
		</div>
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="delete-coach.php">Delete a coach?</a>
		</div>
	</div>
	
	
</main>		

<?php include '../footer.php'; ?>