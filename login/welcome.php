<?php
session_start();
include '../template/header.php';



?>

<link rel="stylesheet" type="text/css" href="./css/bmi.css">

<main class="container planner">
    <h4>Welcome <?php echo $_SESSION['first_name']; ?> </h4>
    <p style="float:left;">Your account has been activated successfully. You can now login.</p>
    <div></div>
    <button style="left:10px;" class="button"> <a href="login.php">Login</a></button>

</main>





<?php
//session_destroy();
include '../template/footer.php'; ?>