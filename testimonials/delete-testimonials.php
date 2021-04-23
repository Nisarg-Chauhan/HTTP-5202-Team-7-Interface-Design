<?php
    
    include '../Template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Testimonials.php';
    
    session_start();
    
    $dbcon = Database::getDb();
    $test = new Testimonial();
    
    if(isset($_SESSION['login']) && strtolower($_SESSION['role'])=='admin'){
        
        $testimonials =  $test->getAllTestimonials($dbcon);
    } else {
        header("location:../login/login.php");
    }
    
?> 

<?php
    
    if(isset($_POST['deleteTestimonial'])){
        
        //Getting the data received from the form
        $testId = $_POST['testimonial'];
        
        $test = new Testimonial();
        $count = $test->deleteTestimonial($testId, $dbcon);
        
        if($count){
            
            header("Location: testimonials.php");
        }
        else {
            echo " problem removing the testimonial";
        }
        
        
    }
?> 

<main class="container testimonials">
    
    <h1>Remove a testimonial</h1>
    
    <form action="" method="POST" name="delete">
        
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="testimonial">Testimonials</label>
            <select name="testimonial" id="testimonial" class="form-select">
                <?php
                    //Populating the dropdown list using associative arrays
                    //Array containing all the options
                    //$selectOptions=$users;
                    foreach ($testimonials as $testimonial){
                        //echo '<option value="'.$user->id.'"'.((isset($user->first_name) && $age==$selectValue)? 'selected':'').">".$user->first_name.' '.$user->last_name."</option>";
                        echo '<option value="'.$testimonial->id .'">'.$testimonial->title."</option>";
                    }
                    //End of options insertion
                ?>
            </select>
        </div>
        
        <input type="submit" id="submit" name="deleteTestimonial" onclick="confirmation();" class="offset-sm-4 offset-md-5 btn btn-danger float-right" value="Delete"/>
        <a href="testimonials.php" class="offset-1">List of testimonials</a>
    </form>
    
</main>

<?php include '../Template/footer.php'; ?>        