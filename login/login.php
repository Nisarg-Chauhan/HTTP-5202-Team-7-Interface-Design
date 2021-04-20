<?php 

include '../header.php' ;
session_start();

require_once '../Models/Database.php';
require_once '../Models/users.php';
  
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['email'];  
      $password = md5($_POST['pwd']); 
      $dbcon=Database::getDb();
      $message_err = "";
      
      
    
     $sql = "SELECT * FROM users WHERE email = '$username' and password = '$password'";
     $statement = $dbcon->prepare($sql);
     $statement->execute();
     $count = $statement->rowCount();
            
      // If result matched $username and $password, table row must be 1 row
		
      if($count == 1) {
          
         $_SESSION['login'] = $_POST['email'];          
         header("location: personal.php");
      } else {
         $message_err = "Username or Password not valid";
      }
   }
?>
    
<link rel="stylesheet" type="text/css" href="../css/login.css">

<main class="container planner">
    <div class="planner-content">
    <h1>Login</h1>
    <div class="row justify-content-sm-center">
        <div class="col col-sm-8 col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($login_err)? $login_err: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password"  name="pwd" class="form-control" id="pwd" placeholder="Enter password">
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($pass_err)? $pass_err: ''; ?> </span>
                </div>
                <div>
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($message_err)? $message_err: ''; ?> </span>
                </div>
                <button type="submit" name="login" class="button">Submit</button>
                <button type="submit" class="button"><a href="registration.php" style="font-size: 18px;">Registration</a></button>
            </form>
        </div>
    </div>
    </div>
</main>

<?php include '../footer.php'  ?>