<?php 
    
    include 'header.php';
    require_once 'Models/Database.php';
    require_once 'Models/Testimonials.php';
    
    $dbcon = Database::getDb();
    $test = new Testimonial();
    $testimonials =  $test->getAllTestimonials($dbcon);
?>

<main class="container testimonials">
        
        <h1>Update a testimonial</h1>
        
        <form action="edit-testimonials.php" method="POST" name="clientMessage">
            
            
            <div class="form-group offset-sm-4 offset-md-5">
            <label for="testimonial">Select a testimonial</label>
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
        
        <input type="submit" id="submit" name="updateTestimonial"  class="offset-sm-4 offset-md-5 btn btn-primary float-right" value="Update"/>
    </form>
</main>


<?php include 'footer.php'; ?>