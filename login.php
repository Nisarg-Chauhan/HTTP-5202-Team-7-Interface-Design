<?php include 'header.php' ?>
    

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/login.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/homepage.css"/>
<link rel="stylesheet"  href="css/bootstrap.min.css"/>

<div class="container-login">
  <h2>Login</h2>
  <form>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <button type="submit" class="button">Submit</button>
      <button type="submit" class="button"><a href="registration.php">Registration</a></button>
  </form>
</div>

<?php include 'footer.php'  ?>