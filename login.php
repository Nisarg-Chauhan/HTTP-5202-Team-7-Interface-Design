<?php include 'header.php' ?>

<link rel="stylesheet" type="text/css" href="./css/login.css">

<main class="container planner">
    <h1>Login</h1>
    <div class="row justify-content-sm-center">
        <div class="col col-sm-8 col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <button type="submit" class="button">Submit</button>
                <button type="submit" class="button"><a href="registration.php">Registration</a></button>
            </form>
        </div>
    </div>
</main>

<?php include 'footer.php'  ?>