<?php 
	//session_start();
	ob_start(); 
	
    include '../Template/header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/Workouts.php';
    require_once '../Models/Exercises.php';
	
	if(isset($_SESSION['login'])){
		
	  $userId=$_SESSION['userId'];
	  
	} else {
	
        header("location:../login/login.php");
    }
	
    $dbcon = Database::getDb();
	$exo=new Exercise();
	$exercises=$exo->getAllExercises($dbcon);
    $workout = new Workout();
    $workouts =  $workout->getUserWorkout($dbcon,$userId);
    //var_dump($workouts);
	
	$restDay=9;// Default Off
	
	foreach($exercises as $search){
		if(strtolower($search->exercise_name)=="off"){
			$restDay=$search->id; //Day off
			break;
		}
	}
	
	$workout_ids=[];
	
	foreach($workouts as $works){
		$workout_ids[]=$works->workout_id; 
	}
	
	//var_dump( $workout_ids);
	
	if(isset($_POST['addWorkout'])){
		
		$monday=$_POST['monday'];
		$tuesday=$_POST['tuesday'];
		$wednesday=$_POST['wednesday'];
		$thursday=$_POST['thursday'];
		$friday=$_POST['friday'];
		$saturday=$_POST['saturday'];
		$sunday=$_POST['sunday'];
		
		 //var_dump($monday);
		// echo '---------------------------';
		
		$weeks=array();
		for ($i=1;$i<5;$i++){
			
			if(!isset($monday[$i])){
				$monday[$i]=$restDay; //"Off";
			}
			if(!isset($tuesday[$i])){
				$tuesday[$i]=$restDay;
			}
			if(!isset($wednesday[$i])){
				$wednesday[$i]=$restDay;
			}
			if(!isset($thursday[$i])){
				$thursday[$i]=$restDay;
			}
			if(!isset($friday[$i])){
				$friday[$i]=$restDay;
			}
			if(!isset($saturday[$i])){
				$saturday[$i]=$restDay;
			}
			if(!isset($sunday[$i])){
				$sunday[$i]=$restDay;
			} 
			$weeks[]=array($i,'Monday',1,(int)$monday[$i],$userId);
			$weeks[]=array($i,'Tuesday',2,(int)$tuesday[$i],$userId);
			$weeks[]=array($i,'Wednesday',3,(int)$wednesday[$i],$userId);
			$weeks[]=array($i,'Thursday',4,(int)$thursday[$i],$userId);
			$weeks[]=array($i,'Friday',5,(int)$friday[$i],$userId);
			$weeks[]=array($i,'Saturday',6,(int)$saturday[$i],$userId);
			$weeks[]=array($i,'Sunday',7,(int)$sunday[$i],$userId);
		}
		
		//var_dump($weeks);
		
		
		//echo (count($weeks));
		// 
		
		for($j=0;$j<count($weeks);$j++){
			//var_dump($weeks[$j][0], $weeks[$j][1]);
			$work=new Workout();
			$count=$work->updateWorkout($workout_ids[$j],$weeks[$j][0],$weeks[$j][1],$weeks[$j][2],$weeks[$j][3],$weeks[$j][4],$dbcon);
		}
		if($count){
			
			header("Location: workouts-list.php");
		}
		else {
			echo " problem updating the workout";
		}
	
	
	
}
?> 


<main class="container planner">
	
	<h1>Update a plan</h1>
	<p>All our programs are four weeks long and customers have 1 hour per day. Discover more about our <a href="exercise-list.php"> exercises</a></p>
	<form  action="" method="POST" name="workoutInfo">
		
		<div class="form-group offset-sm-6">
			<input type="hidden" name="monday[]" value="monday" />
			<label  for="monday">Monday</label>
			<select name="monday[]" id="monday" class="form-control" multiple>
				<?php
					foreach ($workouts as $work){
						if($work->day=="Monday"){ 
							echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
						}
						
					}
					
					foreach ($exercises as $exer){
						for($nb=0;$nb<4;$nb++){
							//if($nb==3){
							// echo '<option value="'.$exer->id .'" selected>'.$exer->exercise_name."</option>";
							// } else{
							echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
							//}
						}
						
						}
						
						
					?>
				</select>
			</div>
			
			<div class="form-group offset-sm-6">
				<input type="hidden" name="tuesday[]" value="tuesday"/>
				<label  for="tuesday">Tuesday</label>
				<select name="tuesday[]" id="tuesday" class="form-control" multiple>
					<?php
						foreach ($workouts as $work){
							if($work->day=="Tuesday"){ 
								echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
							}
							
						}
						foreach ($exercises as $exer){
							for($nb=0;$nb<4;$nb++){
								
								echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
								
							}
						}
						//End of options insertion
					?>
				</select>
			</div>
			
			<div class="form-group offset-sm-6">
				<input type="hidden" name="wednesday[]" value="wednesday" />
				<label  for="wednesday">Wednesday</label>
				<select name="wednesday[]" id="wednesday" class="form-control" multiple>
					<?php
						
						foreach ($workouts as $work){
							if($work->day=="Wednesday"){ 
								echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
							}
							
						}
						foreach ($exercises as $exer){
							for($nb=0;$nb<4;$nb++){
								
								echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
								
							}
						}
					?>
				</select>
			</div>
			
			<div class="form-group offset-sm-6">
				<input type="hidden" name="thursday[]" value="thursday" />
				<label  for="thursday">Thursday</label>
				
				<select name="thursday[]" id="thursday" class="form-control" multiple>
					<?php
						foreach ($workouts as $work){
							if($work->day=="Thursday"){ 
								echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
							}
							
						}
						
						foreach ($exercises as $exer){
							for($nb=0;$nb<4;$nb++){
								
								echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
								
							}
						}
					?>
				</select>
			</div>
			<div class="form-group offset-sm-6">
				<input type="hidden" name="friday[]" value="friday" />
				<label  for="friday">Friday</label>
				
				<select name="friday[]" id="friday" class="form-control" multiple>
					<?php
						foreach ($workouts as $work){
							if($work->day=="Friday"){ 
								echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
							}
							
						}
						foreach ($exercises as $exer){
							for($nb=0;$nb<4;$nb++){
								
								echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
								
							}
						}
					?>
				</select>
			</div>
			
			<div class="form-group offset-sm-6">
				<input type="hidden" name="saturday[]" value="saturday" />
				<label  for="saturday">Saturday</label>
				<select name="saturday[]" id="saturday" class="form-control" multiple>
					<?php
						foreach ($workouts as $work){
							if($work->day=="Saturday"){ 
								echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
							}
							
						}
						foreach ($exercises as $exer){
							for($nb=0;$nb<4;$nb++){
								
								echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
								
							}
						}
					?>
				</select>
			</div>
			
			<div class="form-group offset-sm-6">
				<input type="hidden" name="sunday[]" value="sunday" />
				<label  for="sunday">Sunday</label>
				<select name="sunday[]" id="sunday" class="form-control" multiple>
					<?php
						foreach ($workouts as $work){
							if($work->day=="Sunday"){ 
								echo '<option selected value="'.$work->exo_id .'">'.$work->exercise_name.'  '.$work->calorie_burnt.' g calories burnt</option>';
							}
							
						}
						foreach ($exercises as $exer){
							for($nb=0;$nb<4;$nb++){
								
								echo '<option value="'.$exer->id .'">'.$exer->exercise_name.'  '.$exer->calorie_burnt.' g calories burnt</option>';
								
							}
						}
					?>
				</select>
			</div>
			
			<input type="submit" name="addWorkout" id="submit" onclick="validateCoach();" class=" offset-sm-4 offset-md-5 btn btn-success float-right" value="Submit"/>
			<a href="workouts-list.php" class="offset-1">List of workouts</a>
		</form>
		
		
	</main>		
	
	<?php include '../Template/footer.php'; ?>								