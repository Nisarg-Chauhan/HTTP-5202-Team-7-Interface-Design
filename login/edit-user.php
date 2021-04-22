<?php 

include '../header.php';
require_once '../Models/Database.php';
require_once '../Models/users.php';

 session_start();
    
   

$fname = $lname = $email = $age = $role = "";

if(isset($_POST['updateUser'])){
    $id= $_POST['id'];
    $db = Database::getDb();

    $s = new User();
    $user = $s->getUserById($id, $db);

    $fname =  $user->first_name;
    $lname =  $user->last_name;
    $email =  $user->email;
     $age =  $user->age;
     $role =  $user->role;

   

}
if(isset($_POST['updUser'])){
    $id= $_POST['sid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $role = $_POST['role'];

    $db = Database::getDb();
    $s = new User();
    $count = $s->updateUserAdmin($id, $fname, $lname, $email, $age, $role, $db);

    if($count){
       header('Location:  ../login/success.php');
    } else {
        echo "ups, please try again";
    }
}


?>

<html lang="en">



<body>

<div>
    
    <form action="" method="post">
        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?= $fname; ?>"
                   placeholder="Enter first name">
            
        </div>
        <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?= $lname; ?>" 
                   placeholder="Enter last name">
            
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= $email; ?>" placeholder="Enter email">
            
        </div>
        <div class="form-group">
            <label for="age">Age :</label>
            <input type="text" name="age" value="<?= $age; ?>" class="form-control"
                   id="age" placeholder="Enter age">
            
        </div>
       
        <div class="form-group">
            <label for="role">Role :</label>
            <input type="text" name="role" value="<?= $role; ?>" class="form-control"
                   id="role" placeholder="Enter role">
            
        </div>
        <a href="../login/user-list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updUser"
                class="btn btn-primary float-right" id="btn-submit">
            Update User
        </button>
    </form>
</div>


</body>

 <?php 

include '../footer.php';
    
