<?php 
    
    include '../header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Testimonials.php';
    
    session_start();
    
    $dbcon = Database::getDb();
    $test = new Testimonial();
    
    if(isset($_SESSION['login'])){
        if(strtolower($_SESSION['role'])=='admin'){
        
            $users =  $test->getAllUsers($dbcon);
        } else {
            $users =  $test->getUserById($_SESSION['userId'],$dbcon);
        }
    } else {
        header("location:../login/login.php");
    }
?>

<?php

    if(isset($_POST['addTestimonial'])){
        
        //Getting the data received from the form
        $title = $_POST['title'];
        $message = $_POST['message'];
        $userId = $_POST['user'];
        
        $testimonial=new Testimonial();
        $count=$testimonial->addTestimonial($title, $message, $userId, $dbcon);
        
        
        if($count){
            
            header("Location: testimonials.php");
            }
            else {
                echo " problem adding the testimonial";
            }
    }
    
?>


<main class="container testimonials">
    
    <h1>Leave your message!</h1>
    
    <form action="" method="POST" name="clientMessage">
        
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Type your first name"/>
        </div>
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="message">Your message</label>
            <textarea name="message" id="message" class="form-control" placeholder="Type your message here"></textarea>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="user">User</label>
            <select name="user" id="user" class="form-select">
                <?php
					//Populating the dropdown list using associative arrays
					//Array containing all the options
					//$selectOptions=$users;
					foreach ($users as $user){
                        //echo '<option value="'.$user->id.'"'.((isset($user->first_name) && $age==$selectValue)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
						echo '<option value="'.$user->id.'">'.$user->first_name.' '.$user->last_name."</option>";
                    }
					//End of options insertion
                ?>
            </select>
        </div>
        
        <input type="submit" name="addTestimonial" id="send" onclick="validateTestimonials();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
        <a href="testimonials.php" class="offset-1">List of testimonials</a>
    </form>
</main>

<?php include '../footer.php'; ?>