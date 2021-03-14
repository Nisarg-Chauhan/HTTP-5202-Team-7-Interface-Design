<?php include 'header.php' ?>

<main class="container testimonials">
    
    <h1>Leave your message!</h1>
    
    <div class="row justify-content-sm-center">
        
        <div class="col col-lg-6 d-flex justify-content-center">
            <form action="" method="POST" name="clientMessage">
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Type your first name"/>
                </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Type your last name"/>
                </div>
                <div class="form-group">
                    <label for="message">Your message</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Type your message here"></textarea>
                </div>
                <input type="submit" name="submit" id="send" onclick="validateTestimonials();" class="btn btn-success float-right" value="Send"/>
                </form>
                </div>
    </div>
    </main>
    
<?php include 'footer.php'; ?>