<?php 
    //session_start();  
    //ob_start(); 
    include '../Template/header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/Testimonials.php';
    
    $dbcon = Database::getDb();
    $test = new Testimonial();
    $testimonials =  $test->getAllTestimonials($dbcon);
    
?>

<main class="container testimonials">
    
    <h1>Our customers talk about us!</h1>
    
    <div class="row justify-content-sm-center">
        <?php
            foreach($testimonials as $currentTest)
            {
                $img = base64_encode($currentTest->profile_picture);
                //echo "<img src='data:image/jpg;base64,".$img."'/>";
                echo ' <article class="m-2 col-sm-8">
                <div class="testimonial rounded">
                <h4>'.$currentTest->title. '</h4>
                <p> '. $currentTest->message .'</p>
                <img class="rounded-circle" src="data:image/jpg;base64,'.$img. '" width="70" alt="client picture" /> 
                <h5>'.$currentTest->first_name. ' ' .$currentTest->last_name .'</h5>
                </div>
                </article>';
            }
        ?>
    </div>
    <div class="row justify-content-center">
        <div class=" m-2 offset-lg-3 col-7 col-sm-3">
            <a href="add-testimonials.php">Add testimonials?</a>
        </div>
        <div class="m-2 col-7 col-sm-3">
            <a href="update-testimonials.php">Update testimonials?</a>
        </div>
        <div class="m-2 col-7 col-sm-3">
            <a href="delete-testimonials.php">Delete testimonials?</a>
        </div>
    </div>
    
</main>

<?php include '../Template/footer.php'; ?>