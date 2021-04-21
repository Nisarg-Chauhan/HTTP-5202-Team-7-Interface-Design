<?php 

include 'header.php'; 

 session_start();

?>

<link rel="stylesheet" type="text/css" href="./css/bmi.css">

<main class="container planner">
    <h4>Welcome <?php echo $_SESSION['first_name']; ?> </h4>
     <p>Your account has been activated successfully. You can now login.</p>
     <button class="button"> <a href="login.php">Login</a></button>
    
</main>


    


<?php include 'footer.php'; ?>