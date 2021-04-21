<?php include 'header.php';
    

if(isset($_POST['register'])){

    $email =  $_POST['email'];
    $first_name = $_POST['name'];
    $last_name = $_POST['lname'];
    $phone_number = $_POST['phone'];
    
    $password = $_POST['pwd'] ?? '';
    
    if ($_POST['pwd'] == null){
    $password = "Please choose valid password";
} else {
        $password = "Valid option";
    }
    
    if($email == ""){
        $emailerr =  " please enter email";
    } else if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $emailerr =  " please enter valid email";
    } else {
        $emailerr =  "valid email";
    }

   if($first_name == ""){
        $name_err =  " please enter name";
    } else if (is_numeric($first_name)){
        $name_err =  " please enter valid name";
    } else {
        $name_err =  "valid name";
    }
    
    if($last_name == ""){
        $lname_err =  " please enter last name";
    } else if (is_numeric($last_name)){
        $lname_err =  " please enter valid last name";
    } else {
        $lname_err =  "valid last name";
    }
    
    
    if($phone_number == ""){
        $phone_err =  " please enter phone number";
    } else if (!is_numeric($phone_number)){
        $phone_err =  " please enter valid phone number";
    } else {
        $phone_err =  "valid phone number";
    }

}


?>

<link rel="stylesheet" type="text/css" href="./css/login.css">

<main class="container planner">
    <h1>Registration</h1>
    <div class="row justify-content-sm-center">
        <div class="col col-sm-8 col-lg-6">
            <form action="welcome.php" method="post">
                <p>Please fill in this form to create an account.</p>                     
                <div class="form-group">
                    <label for="fname"><b>First Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter first name" name="fname" id="fname" value="<?= isset($first_name) ? $first_name : ''; ?>" required>
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($name_err)? $name_err: ''; ?> </span>
                </div>            
                <div class="form-group">
                    <label for="lname"><b>Last name </b></label>
                    <input type="text" class="form-control" placeholder="Enter last name" name="lname" id="lname" required value="<?= isset($last_name) ? last_name : ''; ?>">
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($lname_err)? $lname_err: ''; ?> </span>
                </div>              
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required value="<?= isset($email) ? $email : ''; ?>">
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($emailerr)? $emailerr: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="phone"><b>Phone Number</b></label>
                    <input type="number" class="form-control" placeholder="Enter Phone number" name="phone" id="phone" required value="<?= isset($phone_number) ? $phone_number : ''; ?>">
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($phone_err)? $phone_err: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="pwd"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="pwd" id="pwd" required value="<?= isset($password) ? $password : ''; ?>">
                    <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($password)? $password: ''; ?> </span>
                </div>
                <div class="form-group">
                    <label for="pwd_repeat"><b>Confirm Password</b></label>
                    <input type="password" class="form-control" placeholder="Confirm Password" id="pwd_repeat" required value="<?= isset($password) ? $password : ''; ?>">
                     <span style="color:red; font-zise: 8px; background:#f2f2f2;"><?= isset($password)? $password: ''; ?> </span>
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