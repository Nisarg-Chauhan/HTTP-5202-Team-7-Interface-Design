<?php 

include '../template/header.php';


require_once '../Models/Database.php';
require_once '../Models/users.php';
//require_once '../Models/Testimonials.php';
  
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['email'];  
      $password = md5($_POST['pwd']); 
      $dbcon=Database::getDb();
      $message_err = "";
      
       $_SESSION['login'] = $_POST['email']; 
    
      $newUser=new User();     
     $user=$newUser->getCurrentUser($username,$password, $dbcon);
            
      
      if(isset($user) && $user!="") {
          
        session_start();  
         $_SESSION['login'] = $_POST['email']; 
         $_SESSION['userId']=$user->id;
          $_SESSION['role'] = $user->role; 
         
         
         header("location:../home.php");
      }else {
         $message_err = "Username or Password not valid";
      }
   }
?>
    


<div style="height:650px;" class="container planner">
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
                <button type="submit" class="button"><a href="registration.php" >Registration</a></button>
            </form>
        </div>
    </div>
</div>
<?php include '../template/footer.php'; ?>
