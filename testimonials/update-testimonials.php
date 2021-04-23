<?php 
    
    include '../Template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Testimonials.php';
    
    session_start();
    
    $dbcon = Database::getDb();
    $test = new Testimonial();
    
    //Logged in user can access testimonials page
    if(isset($_SESSION['login'])){
    
    //Admin can edit all testimonials
        if(strtolower($_SESSION['role'])=='admin'){
            $testimonials =  $test->getAllTestimonials($dbcon);
        } else{
        //User can update only his/her own testimonials
             $testimonials =  $test->getUserTestimonials($_SESSION['userId'], $dbcon);
        }
    } else {
        header("location:../login/login.php");
    }
?>

<main class="container testimonials">
    
    <h1>Update a testimonial</h1>
    
    <form action="edit-testimonials.php" method="POST" name="clientMessage">
        
    
    <div class="form-group offset-sm-4 offset-md-5">
        <label for="testimonial">Select a testimonial</label>
        <select name="testimonial" id="testimonial" class="form-select">
            <?php
                //List of all testimonials
                foreach ($testimonials as $testimonial){
                    echo '<option value="'.$testimonial->id .'">'.$testimonial->title."</option>";
                }
                //End of options insertion
            ?>
        </select>
    </div>
    
    <input type="submit" id="submit" name="updateTestimonial"  class="offset-sm-4 offset-md-5 btn btn-primary float-right" value="Update"/>
    <a href="testimonials.php" class="offset-1">List of testimonials</a>
    </form>
</main>


<?php include '../Template/footer.php'; ?>