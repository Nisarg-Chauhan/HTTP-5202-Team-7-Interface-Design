<?php 
    
    include '../header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Testimonials.php';
    //require_once '../Models/users.php';
    
    session_start();
    $dbcon = Database::getDb();
    $test = new Testimonial();
    
    //User must be logged in to edit a testimonial
    if(isset($_SESSION['login'])){
    
        //Admin can see all users and their testimonials
        if(strtolower($_SESSION['role'])=='admin'){
            
            $users =  $test->getAllUsers($dbcon);
        } else {
            //Normal user can only see his own testimonials
            $users =  $test->getUserById($_SESSION['userId'],$dbcon);
        }
    } else {
        header("location:../login/login.php");
    }
    
    //Id of the selected testimonial from the update form
    
    if(isset($_POST['updateTestimonial'])){
        
        //Getting the data received from the form
        $testId = $_POST['testimonial'];
        $_SESSION['testId']=$testId;
        
        $test=new Testimonial();
        $testimonial=$test->getTestimonialById($_SESSION['testId'], $dbcon);
    }
    
    //All information of the selected testimonial before saving to database
    
    if(isset($_POST['editTestimonial'])){
        
        //Getting the data received from the form
        $tId = $_POST['tid'];
        $message = $_POST['message'];
        $title = $_POST['title'];
        $userId = $_POST['user'];
        
        //Field validation
        include 'formValidation.php';
        
        $regexText="/^(?=.*?[a-zA-Z]).{3,}$/i"; //At least 3 characters
        $regex="/^[1-9]\d*$/";    //Only positive number for id
        
        //Outputs of validation used to write to the database
        $resultUserId=validateInput($userId,"user id", $regex);
        $resultTestId=validateInput($tId,"testimonial id", $regex);
        $resultTitle=validateInput($title,"title",$regexText);
        $resultText=validateInput($message,"message",$regexText);
        
        //Creating a test object
        $testimonial=new Testimonial();
        
        //Saving data to database only if validated
        if($resultUserId['bool'] && $resultTestId['bool'] && $resultTitle['bool'] && $resultText['bool'] ){
            $count= $testimonial->updateTestimonial($tId,$title, $message, $userId, $dbcon);
        }
        
        if(isset($count) && $count>0){
            
            //Go back to testimonials list in case of success
            header("Location: testimonials.php");
        }else {
            //Error message in case of failure
            echo " problem updating the testimonial";
        }
        
    }
?>


<main class="container testimonials">
    
    <h1>Leave your message!</h1>
    
    <form action="" method="POST" name="clientMessage">
        <input type="hidden" name="tid" value="<?= $_SESSION['testId']; ?>" />
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= isset($testimonial->title)?$testimonial->title:$title ?>" class="form-control" placeholder="Type your first name"/>
            <span style="color:red;"><?= (isset($resultTitle) && !$resultTitle['bool'])?$resultTitle['text']:'';?></span>
        </div>
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="message">Your message</label>
            <textarea name="message" id="message"  class="form-control" placeholder="Type your message here"><?=isset($testimonial->message)?$testimonial->message:$message ?></textarea>
            <span style="color:red;"><?= (isset($resultText) && !$resultText['bool'])?$resultText['text']:'';?></span>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="user">User</label>
            <select name="user" id="user" class="form-select">
                <?php
                    //$selectOptions=$users;
                    if(strtolower($_SESSION['role'])=='admin'){
                        
                        //For admin
                        foreach ($users as $user){
                            echo '<option value="'.$user->id.'" '.(($user->id==$testimonial->user_id)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
                        }
                    } else {
                        //For normal user
                        echo '<option value="'.$users->id.'" '.(($users->id==$testimonial->user_id)? 'selected':'').">".$users->first_name.' '.$users->last_name."</option>";
                    }
                    
                ?>
            </select><span style="color:red;"><?= (isset($resultId) && !$resultId['bool'])?$resultId['text']:'';?></span>
        </div>
        
        <input type="submit" name="editTestimonial" id="send" onclick="validateTestimonials();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
    </form>
</main>

<?php include '../footer.php'; ?>            