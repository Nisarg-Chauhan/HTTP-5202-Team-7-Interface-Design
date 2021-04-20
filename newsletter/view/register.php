<?php include 'header.php'; ?>
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-container">
                    <div class="form-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    
                     <?php if (isset($error)) : ?>
                     <p class='error'><?php echo htmlspecialchars($error); ?></p>
                     <?php endif; ?>

                    <form action="." method="post" class="form-horizontal">
                        <h3 class="title">Register Now for our Newsletter</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" type="text" placeholder="First Name" name="first_name" 
                            value = "<?php echo htmlspecialchars($first_name);?>" >
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" type="text" placeholder="Last Name" name="last_name"
                            value="<?php echo htmlspecialchars($last_name);?>">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" type="text" placeholder="Phone" name="phone"
                            value="<?php echo htmlspecialchars($phone);?>">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" type="email" placeholder="Email Address" name="email" 
                            value="<?php echo htmlspecialchars($email);?>">
                        </div>
                        <label>&nbsp;</label>
                        <input type="submit" class="btn signin" name="action" value="Submit"/>
                        <input type="submit" class="btn signin" name="action" value="Reset"/>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>