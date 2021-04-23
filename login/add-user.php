<?php 
   
    include '../template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/users.php';
    


if(isset($_POST['addUser'])){
    
    
    $id= $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $age = $_POST['age'];
    $role = $_POST['role'];

    $db = Database::getDb();
    $s = new User();
    $count = $s->addUser($fname, $lname, $email, $password, $age, $role, $db);

    if($count){
       header('Location:  ../login/user-list.php');
    } else {
        echo "Ups, some problems";
    }
}


?>

<html lang="en">


		
		
	
		
<main class="container-planner">
   
    <form style=" width:20%; height:100%; margin:50px 50px;" action="" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" id="fname" name="fname"
                   value="" placeholder="Enter first name">
            
        </div>
        <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" id="lname" name="lname"
                   value="" placeholder="Enter last name">
            
        </div>
         <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="" placeholder="Enter email">
            
        </div>
        <div class="form-group">
            <label for="pass">Temporary password:</label>
            <input type="password" class="form-control" id="pass" name="pass"
                   value="" placeholder="Enter password">
            
        </div>
         <div class="form-group">
            <label for="age">Age :</label>
            <input type="number" class="form-control" id="age" name="age"
                   value="" placeholder="Enter age">
            
        </div>
        <div class="form-group">
            <label for="role">Role :</label>
            <input type="text" class="form-control" id="role" name="role"
                   value="" placeholder="Enter role">
            
        </div>
        <a href="../login/user-list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button style="margin: 20px 0 0 150px;" type="submit" name="addUser"
                class="btn btn-primary float-left" id="btn-submit">
            Add User
        </button>
    </form>
</div>


</body>

    
   <?php include '../template/footer.php'; ?>
