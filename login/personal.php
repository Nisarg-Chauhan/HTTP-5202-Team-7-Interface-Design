<?php 
   
   include 'header.php';

    require_once '../Models/Database.php';
    require_once '../Models/users.php'; 
    require_once '../Models/Coaches.php';
    require_once "../Library/dropdown.php";
     
     $dbcon=Database::getDb();
            
     $sql = "SELECT * from users where email = '".$_SESSION["login"]."'";
     $statement = $dbcon->prepare($sql);
     $statement->execute();
     $personal = $statement->fetchAll(PDO::FETCH_OBJ);




    // Getting coaches
    $coach = "";
    $s2 = new Coach();
    $coaches = $s2->getCoaches(Database::getDb());

    


/*if (isset($_POST['add_coach'])) {
        
        
        
    $check_coach = $_POST['id'];
    $new_coach=new User();
	$c=$new_coach->addCoach($check_coach, $dbcon);
    


    }*
   // will work soon
      
    ?>
       
<html lang="en">

<head>
    
    <link rel="stylesheet" href="../css/personal.css" type="text/css">
</head>
<main class="container-personal">
    <div class="column-left" style="float:left;">
         <ul>
            <li><a href="plan.php">Diet planner</a> </li>
            <li><a href="exercise-list.php">My Exercises</a> </li>
            <li><a href="planner.php">My Planner</a> </li>
        </ul>
    </div>
       
    
	<div class="row">

 <?php	
		foreach($personal as $personal_data){
            
            echo '
      <div class="workout general table-responsive col-lg-12">
      <h1>Welcome Back ' .$personal_data->first_name.  '</h1>
       
       <table class="table table-striped">
  <tr>
   <th>Registration number</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Age</th>
    <th>Coach</th>
    <th></th>
  </tr>
  <tr>
    <td>' .$personal_data->id. '</td>
    <td>' .$personal_data->first_name. '</td>
    <td>' .$personal_data->last_name. '</td>
    <td>' .$personal_data->email. '</td>
    <td>' .$personal_data->age. '</td>';
    
    
    
     echo ' <td> <select>'; 
                 echo populateDropdown($coaches, $coach);
              
     echo  '</select>  </td> 
        <td> <button type="button" class="button" name="add_coach" value="Add Coach">Add Coach </button>
         </td>
   </tr>
  
</table> 
        
 <form action="../login/update-user.php" method="post">';
 
  echo '<input type="hidden" name="id" value="' . $personal_data->id;  
    echo '"/>';
        
 echo '<input type="submit" class="button btn btn-primary"  name="update-user" value="Update Details"/>' ;
echo '</form>
      <h2 style="float:right;" ><a href = "../login/logout.php">Sign Out</a></h2>
      </div>'; 
    
     }?>
       
            
      <div> 
          <?php if(!isset($_SESSION['your_bmi'])){
    
            echo '<h4 style="float:left;"><a href="../bmi/bmi.php">Check your BMI</a></h4>';
} else {
    
            echo '<h4 style="float:left;">Your BMI '  .$_SESSION['your_bmi']; }'</h4>'

     ?>    

         
        
</main>
         
<?php include 'footer.php'; ?>
