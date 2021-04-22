<?php 

include 'header.php';

require_once '../Models/Database.php';
require_once '../Models/users.php';

if(isset($_POST['register'])){
    
    /*session_start();
    
    $_SESSION['first_name'] = $_POST['fname'];
    $_SESSION['last_name'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['role'] = 'client';*/



    $pass_err = $email_err = $fname_err = $lname_err = $age_err = "";
    $fname = $email = $lname = $age = $password = "";
    
    $role = 'client';
      
    if ($_POST['pwd'] == ""){
        $pass_error = "Please choose valid password"; 
    }
    
    if ($_POST['pwd_repeat'] == ""){
        $pass_error_repeat = "Please choose valid password";
    }
    
    
    if ($_POST['pwd'] === $_POST['pwd_repeat']) {
        
        $password = md5($_POST['pwd']);
        
    } else {
        $pass_error_repeat = "Passwords are not matching";
    }
    
    if($_POST['email'] == ""){
        $email_err =  " please enter email";
    } else if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $email_err =  " please enter valid email";
    } else {
        $email = $_POST['email'];
    }

   if($_POST['fname'] == ""){
        $fname_err =  " please enter name";
    } else if (is_numeric($_POST['fname'])){
        $fname_err =  "please enter valid name";
    } else {
        $fname = $_POST['fname'];
    }
    
    if($_POST['lname'] == ""){
        $lname_err =  " please enter last name";
    } else if (is_numeric($_POST['lname'])){
        $lname_err =  " please enter valid last name";
    } else {
        $lname =  $_POST['lname'];
    }
    
    if($_POST['age'] == ""){
        $age_err =  "please enter your age";
    }  else {
        $age =  $_POST['age'];
    }
    

   /*if($fname && $lname && $email && $password && $age){
       header ("Location: welcome.php");
     $dbcon=Database::getDb();
    $user=new User();
	$c=$user->addUser($fname, $lname, $email, $password, $age, $dbcon);
   }*/

 if(!$fname == "" && !$lname == "" && !$email == "" && !$password == "" && !$age == ""){
     header ("Location: ../login/welcome.php");
     $dbcon=Database::getDb();
    $user=new User();
	$c=$user->addUser($fname, $lname, $email, $password, $age, $role, $dbcon);
   }
    
   

}

?>

<link rel="stylesheet" type="text/css" href="./css/login.css">

<main class="container planner" style="background-image: url(); background-color: white;">
    <h1>Registration</h1>
    <div class="row justify-content-sm-center">
        <div class="col col-sm-8 col-lg-6">
            <form action="" method="post">
                <p>Please fill in this form to create an account.</p>                     
                <div class="form-group">
                    <label for="fname"><b>First name</b></label>
                    <input type="text" class="form-control" placeholder="Enter first name" name="fname" id="fname" >
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($fname_err)? $fname_err: ''; ?> </span>
                </div>            
                <div class="form-group">
                    <label for="lname"><b>Last name </b></label>
                    <input type="text" class="form-control" placeholder="Enter last name" name="lname" id="lname" >
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($lname_err)? $lname_err: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="age"><b>Age </b></label>
                    <input type="number" class="form-control" placeholder="Enter age" name="age" id="age" >
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($age_err)? $age_err: ''; ?> </span>
                </div> 
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" >
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($email_err)? $email_err: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="pwd"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="pwd" id="pwd" >
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($pass_error)? $pass_error: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="pwd_repeat"><b>Confirm Password</b></label>
                    <input type="password" name="pwd_repeat" class="form-control" placeholder="Confirm Password" id="pwd_repeat" >
                     <span style="color:red; font-zise: 8px; background:#f2f2f2;"> <?= isset($pass_error_repeat)? $pass_error_repeat: ''; ?></span>
                </div>    
                <button type="submit" class="button" name="register">Register</button>          
                <div class="container signin">
                    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
