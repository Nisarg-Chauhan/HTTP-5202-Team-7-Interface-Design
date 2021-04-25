<?php 
    //session_start();
    ob_start(); 
    include '../Template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/Testimonials.php';
    
    
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
            <select name="testimonial" id="testimonial" class="form-control">
                <?php
                    //List of all testimonials
                    foreach ($testimonials as $testimonial){
                        echo '<option value="'.$testimonial->id .'">'.$testimonial->title."</option>";
                    }
                    //End of options insertion
                ?>
            </select>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <a href="testimonials.php">List of testimonials</a>
            </div>
            <div class="col-12 col-sm-6">
                <input type="submit" id="submit" name="updateTestimonial"  class="btn btn-primary" value="Update"/>
            </div>
        </div>
        
    </form>
    </main>
    
        
<?php include '../Template/footer.php'; ?>