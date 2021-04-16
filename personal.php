<?php 
    session_start();
    include 'header.php';

    require_once 'Models/Database.php';
    require_once 'Models/users.php'; 
    require_once 'Models/Coaches.php';
     
     $dbcon=Database::getDb();
            
     $sql = "SELECT * from users where email = '".$_SESSION["login"]."'";
     $statement = $dbcon->prepare($sql);
     $statement->execute();
     $personal = $statement->fetchAll(PDO::FETCH_OBJ);


    // Getting coaches
    $coach = new Coach();
    $coaches =  $coach->getAllCoaches($dbcon);
     
   ?>  
<link rel="stylesheet" type="text/css" href="./css/personal.css">
<main class="container plan planner">
	<div class="row">

 <?php	
		foreach($personal as $personal_data){
            
            echo '
      <div class="workout general table-responsive col-lg-12">
      <h1>Welcome Back ' .$personal_data->first_name.  '</h1>
       
       <table class="table table-striped">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Age</th>
    <th>Coach</th>
    <th></th>
  </tr>
  <tr>
    <td>' .$personal_data->first_name. '</td>
    <td>' .$personal_data->last_name. '</td>
    <td>' .$personal_data->email. '</td>
    <td>' .$personal_data->age. '</td>';
    
    } ?>
    
      <td> <select> <?php foreach ($coaches as $coach){
            
        echo '<option value="'.$coach->id.'">'.$coach->first_name.' '.$coach->last_name."</option>";
        
    } ?>
         </select></td> 
        <td> <button type="button" class="button" name="add_coach" value="Add Coach">Add Coach </button>
         </td>
  </tr>
  
</table>
      <h2 style="float:right;" ><a href = "logout.php">Sign Out</a></h2>
      </div>
            
      <div> 
          <?php if(!isset($_SESSION['your_bmi'])){
    
            echo '<h4 style="float:left;"><a href="bmi.php">Check your BMI</a></h4>';
} else {
    
            echo '<h4 style="float:left;">Your BMI '  .$_SESSION['your_bmi']; }'</h4>'

     ?>     

         
</div>
</main>
    
 <?php include 'footer.php';

?>