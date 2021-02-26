<?php include 'header.php' ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/home_style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
     <div class="container-login">
      <h2>Registration</h2>
          <form >
            <p>Please fill in this form to create an account.</p>                     
            <div class="form-group">
            <label for="fname"><b>First Name</b></label>
            <input type="text" class="form-control" placeholder="Enter first name" name="fname" id="fname" required>
            </div>            
            <div class="form-group">
            <label for="lname"><b>Last name </b></label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lname" id="lname" required>
            </div>              
            <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
            </div>
            <div class="form-group">
            <label for="pwd"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="pwd" id="pwd" required>
            </div>
            <div class="form-group">
            <label for="pwd_repeat"><b>Confirm Password</b></label>
            <input type="password" class="form-control" placeholder="Confirm Password" id="pwd_repeat" required>
            </div>    
            <button type="submit" class="button">Register</button>          
            <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
            </div>
          </form>
      </div>
<?php include 'footer.php';
?>