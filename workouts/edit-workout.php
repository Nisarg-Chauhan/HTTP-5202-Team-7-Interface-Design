<?php 
	//session_start();
	ob_start(); 
    include '../template/header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/Workouts.php';
    
    $dbcon = Database::getDb();
    $workout = new Workout();
    $workouts =  $workout->getAllWorkouts($dbcon);
    
?>


<main class="container plan planner">
	<div class="row">
		<h1>Customer plans</h1>
		
		<?php 
			$nbWeek=4;
			$weekDays=7;
			$tabNum=ceil(count($workouts)/($weekDays*$nbWeek));
			//var_dump($workouts);
			//echo $tabNum;
			for ($k=0;$k<$tabNum;$k++)
			{
				
				echo '<div class="workout general table-responsive col-lg-12">
				<h3> Plan for '.$workouts[$k]->first_name.' '.$workouts[$k]->last_name.'</h3>';
				$weekNb=array("One","Two","Three","Four");
				
				echo '<table class="table table-striped">
				
				<thead >
				<tr>
				<th scope="col">Week</th>
				<th scope="col">Monday</th>
				<th scope="col">Tuesday</th>
				<th scope="col">Wednesday</th>
				<th scope="col">Thursday</th>
				<th scope="col">Friday</th>
				<th scope="col">Saturday</th>
				<th scope="col">Sunday</th>
				</tr>
				</thead>
				<tbody>';
				
				for($i=0;$i<$nbWeek;$i++){
					
					echo '<tr>
					<th scope="row">'.$weekNb[$i].'</th>';
					
					for($j=0;$j<$weekDays;$j++){
						
						$current=$j+$i*$weekDays;
						
						if(!empty($workouts[$current+$k*$nbWeek*$weekDays]->exercise_name)){
							
							echo '<td>'.$workouts[$current+$k*$nbWeek*$weekDays]->exercise_name.'</td>';
							//echo $current+$k;
						}
					}
					echo '</tr>';
				}
				echo '</tbody>
				</table>
				</div>';
			}
			
			
		?>
	</div>
	<div class="row justify-content-center">
		<div class=" m-2 offset-lg-3 offset-3  col-6 col-sm-3">
			<a href="add-workout.php">Add a new plan</a>
		</div>
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="update-workout.php">Update a plan?</a>
		</div>
		<div class="m-2 offset-3  col-6 col-sm-3">
			<a href="delete-workou.php">Delete a plan?</a>
		</div>
	</div>
	
	
</main>		

<?php include '../template/footer.php'; ?>