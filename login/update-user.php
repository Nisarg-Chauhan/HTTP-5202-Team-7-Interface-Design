<?php 
    session_start();
    include '../header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Coaches.php';
    require_once '../Models/users.php';
    

if(isset($_POST['update-user'])){
    
    $id= $_POST['id'];
    $db = Database::getDb();
   
    $s = new User();
    $user = $s->getUserById($id, $db);
     
    $fname = $user->first_name;
    $lname = $user->last_name;
    $email = $user->email;
    $age = $user->age;
   
}
if(isset($_POST['updUser'])){
    
    
    $id= $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $db = Database::getDb();
    $s = new User();
    $count = $s->updateUser($id, $fname, $lname, $email, $age, $db);

    if($count){
       header('Location:  ../login/personal.php');
    } else {
        echo "Ups, some problems";
    }
}


?>

<html lang="en">


<body style="background-color:white;">

<div>
   
    <form style="height:100%; margin:50px 50px;" action="" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" id="fname" name="fname"
                   value="<?= $fname; ?>" placeholder="Enter your first name">
            
        </div>
        <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" id="lname" name="lname"
                   value="<?= $lname; ?>" placeholder="Enter your last name">
            
        </div>
         <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= $email; ?>" placeholder="Enter your email">
            
        </div>
         <div class="form-group">
            <label for="age">Age :</label>
            <input type="text" class="form-control" id="age" name="age"
                   value="<?= $age; ?>" placeholder="Enter your age">
            
        </div>
        <a href="../login/personal.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button style="margin: 20px 0 0 150px;" type="submit" name="updUser"
                class="btn btn-primary float-left" id="btn-submit">
            Update Details
        </button>
    </form>
</div>


</body>

    
   <?php include '../footer.php'; ?>
