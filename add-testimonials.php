<?php include 'header.php' ?>

<main class="container testimonials">
    
    <h1>Leave your message!</h1>
    
    <form action="" method="POST" name="clientMessage">
    
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="fname">First name</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Type your first name"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="lname">Last name</label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Type your last name"/>
        </div>
        
        <div class="form-group offset-sm-4 offset-md-5">
            <label for="message">Your message</label>
            <textarea name="message" id="message" class="form-control" placeholder="Type your message here"></textarea>
        </div>
        
        <input type="submit" name="submit" id="send" onclick="validateTestimonials();" class="offset-sm-4 offset-md-5 btn btn-success float-right" value="Send"/>
    </form>
</main>

<?php include 'footer.php'; ?>