<?php 
    
    include 'header.php';
    require_once 'Models/Database.php';
    require_once 'Models/Testimonials.php';
    
    $dbcon = Database::getDb();
    $test = new Testimonial();
    $users =  $test->getAllUsers($dbcon);
    //foreach ($users as $user){        
    //    echo $user->first_name.' and '.$user->id;
    //}
?>

<?php

    if(isset($_POST['updateTestimonial'])){
        
        //Getting the data received from the form
        $testId = $_POST['testimonial'];
        
        $test=new Testimonial();
        $testimonial=$test->getTestimonialById($testId, $dbcon);
    }
?>

<?php

    if(isset($_POST['editTestimonial'])){
        
        //Getting the data received from the form
        $tId = $_POST['tid'];
        $message = $_POST['message'];
        $title = $_POST['title'];
        $userId = $_POST['user'];
        
        $testimonial=new Testimonial();
        $count= $testimonial->updateTestimonial($tId,$title, $message, $userId, $dbcon);
        
        
        if($count){
            
            header("Location: testimonials.php");
        }
        else {
                echo " problem updating the testimonial";
        }
            
    }
?>


<main class="container testimonials">
    
    <h1>Leave your message!</h1>
    
    <form action="" method="POST" name="clientMessage">
        <input type="hidden" name="tid" value="<?= $testId; ?>" />
        <div class="form-group offset-sm-4 offset-md-5">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?=$testimonial->title ?>" class="form-control" placeholder="Type your first name"/>
        </div>
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="message">Your message</label>
            <textarea name="message" id="message"  class="form-control" placeholder="Type your message here"><?=$testimonial->message ?></textarea>
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
						echo '<option value="'.$user->id.'" '.(($user->id==$testimonial->user_id)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
                    }
					//End of options insertion
                ?>
            </select>
        </div>
        
        <input type="submit" name="editTestimonial" id="send" onclick="validateTestimonials();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
    </form>
</main>

<?php include 'footer.php'; ?>